<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Sorting_model extends CI_Model
{

    public function get_sorted_species_id_array($table, $field, $value){
      switch ($value) {
        case 'red':
          $value_he = 'אדום';
          break;
        case 'yellow':
          $value_he = 'צהוב';
          break;
        case 'pink':
          $value_he = 'ורוד';
          break;
        case 'blue':
          $value_he = 'כחול';
          break;
        case 'purple':
          $value_he = 'סגול';
          break;
        case 'white':
          $value_he = 'לבן';
          break;
        default:
        case 'orange':
          $value_he = 'כתום';
          break;
        default:
        case 'little':
          $value_he = 'מועטה';
          break;
        default:
        case 'some':
          $value_he = 'בינונית';
          break;
        default:
        case 'lot':
          $value_he = 'מרובה';
          break;
        default:
        case 'no-dry':
          $value_he = 'רגיש ליובש';
          break;
        default:
        case 'no-wet':
          $value_he = 'רגיש לעודף השקיה';
          break;
        default:
        case 'full-shade':
          $value_he = 'צל מלא';
          break;
        default:
        case 'partly-shade':
          $value_he = 'צל חלקי';
          break;
        default:
        case 'partly-sun':
          $value_he = 'שמש חלקית';
          break;
        default:
        case 'full-sun':
          $value_he = 'שמש מלאה';
          break;
        default:
          # code...
          break;
      }
     try{
         $sql = "SELECT species_id FROM $table WHERE $field LIKE ?";
         $result = $this->db->query($sql,'%'.$value_he.'%');
       }catch(Exception $e){
           echo "Unable to retrieve results";
           exit;
       }
       $species_id_array = $result->result();
       return $species_id_array;
    }

}
