<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_premium_pictures()
	{
		try{
				$sql = "SELECT species_id, filename FROM pictures WHERE img_type_id = ?";
				$result = $this->db->query($sql,1);
			}catch(Exception $e){
					echo "Unable to retrieve results";
					exit;
			}
			$premium_pictures = $result->result();
			// echo "<pre>";
			// var_dump($premium_pictures);
			// exit;
			// echo "</pre>";
			return $premium_pictures;
	}

	public function insert_premium_pictures($id, $value)
	{
		$data = array(
        'picture' => $value
				);
		try{
				$this->db->where('id', $id);
				$this->db->update('species', $data);
			}catch(Exception $e){
					echo "Unable to retrieve results";
					exit;
			}
			// $updated_rows = $this->db->affected_rows();
			// var_dump($updated_rows);
			// exit;
	}

}
