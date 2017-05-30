<?php
Class Catalog_model extends CI_Model
{

    public function get_catalog_count($category = null, $search = null){
        try {
            $sql = " SELECT * FROM species";
            if(!empty($search)){
                $sql .=  " WHERE name_he LIKE ? OR name_lat LIKE ? OR name_hu LIKE ?";
                $result = $this->db->query($sql, array('%'.$search.'%','%'.$search.'%','%'.$search.'%') ); //binding values to query
            }elseif(!empty($category)){
                $sql .= " WHERE category_id = ? ";
                $result = $this->db->query($sql, $category);
            }else{
                $result = $this->db->query($sql);
            }
        } catch(Exception $e){
            echo "Error in sql query";
            exit;
        }
        $count = sizeof($result->result());
        return $count;
    }

    public function full_catalog_array($limit = null, $offset = 0){
        try{
            $sql = "SELECT id,name_he,name_lat,name_hu, category_id, picture
      FROM species
      ORDER BY REPLACE(REPLACE(REPLACE(name_he,'The ',''), 'An ' , ''), 'A ', '')";
            if(is_integer($limit)){
                $sql .= " LIMIT ? OFFSET ? ";
                $results = $this->db->query($sql,array($limit,$offset));
            }else{
                $results = $this->db->query($sql);
            }
        }catch(Exception $e){
            echo "Unable to retrieve results";
            exit;
        }
        $catalog = $results->result();
        return $catalog;
    }

    public function random_catalog_array($limit = 0, $type= null){
        try{ //pulling only 4 random species from the DB
            // switch ($type) {
            //   case 'featuring':
            //     # code...
            //     break;
            //   case 'frontpage':
            //       # code...
            //       break;
            //   default:
            //     # code...
            //     break;
            // }
            $results = $this->db->query(
                "SELECT id, name_he, name_lat, name_hu, category_id, description, picture
             FROM species
             WHERE $type = 'on'
             ORDER BY RAND()
             LIMIT $limit"
                  );
        }catch(Exception $e){
            echo "Unable to retrieve results";
        }
        //returning results as array with keys as number (FETCH_NUM) or assoc names (FETCH_ASSOC)
        $catalog = $results->result();
        return $catalog;
    }

    public function category_catalog_array($category, $limit = null, $offset = 0){

        try{
            $sql = "SELECT id,name_he,name_lat,name_hu, category_id, picture
      FROM species
      WHERE category_id = ?
      ORDER BY REPLACE(REPLACE(REPLACE(name_he,'The ',''), 'An ' , ''), 'A ', '')";
            if(is_integer($limit)){
                $sql .= " LIMIT ? OFFSET ? ";
                $results = $this->db->query($sql,array($category,$limit,$offset));
            }else{
                $results = $this->db->query($sql,$offset);
            }
        }catch(Exception $e){
            echo "Unable to retrieve results";
            exit;
        }
        $catalog = $results->result();
        return $catalog;
    }


    public function search_catalog_array($search, $limit = null, $offset = 0){

        try{
            $sql = " SELECT id,name_he,name_lat,name_hu,category_id, picture
                FROM species
                WHERE name_he LIKE ?
                OR name_lat LIKE ?
                OR name_hu LIKE ?
                ORDER BY REPLACE(REPLACE(REPLACE(name_he,'The ',''), 'An ' , ''), 'A ', '')";
            if(is_integer($limit)){
                $sql .= " LIMIT ? OFFSET ? ";
                $results = $this->db->query($sql, array('%'.$search.'%','%'.$search.'%','%'.$search.'%',$limit,$offset));
            }else{
                $results = $this->db->query($sql, array('%'.$search.'%','%'.$search.'%','%'.$search.'%'));
            }
        }catch(Exception $e){
            echo "Unable to retrieve results";
            exit;
        }
        $catalog = $results->result();
        // echo '<pre>';
        // var_dump($catalog);
        // echo '</pre>';
        // exit;
        return $catalog;
    }

    public function single_species_array($id){

       try{
           $sql = "SELECT * FROM species WHERE id = ?";
           $result = $this->db->query($sql,$id);
         }catch(Exception $e){
             echo "Unable to retrieve results";
             exit;
         }
         $species = $result->result();
         return $species;
    }

    public function get_pictures($id) {
      try{
          $sql = "SELECT * FROM pictures WHERE species_id = ?";
          $result = $this->db->query($sql,$id);
        }catch(Exception $e){
            echo "Unable to retrieve results";
            exit;
        }
        $pictures = $result->result();
        return $pictures;
    }

    public function get_genus($id){
      try{
          $sql = "SELECT genus.id, genus.family_id, genus.name_he, genus.name_lat, genus.name_hu FROM genus
          Join species ON genus.id = species.genus_id
          WHERE species.id = ?";
          $result = $this->db->query($sql,$id);
        }catch(Exception $e){
            echo "Unable to retrieve results";
            exit;
        }
        $genus = $result->result();
        return $genus[0];
    }

    public function get_family($id){
      try{
          $sql = "SELECT * FROM family
          WHERE id = ?";
          $result = $this->db->query($sql,$id);
        }catch(Exception $e){
            echo "Unable to retrieve results";
            exit;
        }
        $family = $result->result();
        return $family[0];
    }

    public function get_order($id){
      try{
          $sql = "SELECT * FROM orders
          WHERE id = ?";
          $result = $this->db->query($sql,$id);
        }catch(Exception $e){
            echo "Unable to retrieve results";
            exit;
        }
        $order = $result->result();
        return $order[0];
    }

    public function get_category_name($id){
      try{
          $sql = "SELECT name FROM categories WHERE id = ?";
          $result = $this->db->query($sql,$id);
        }catch(Exception $e){
            echo "Unable to retrieve results";
            exit;
        }
        $category_name = $result->result();
        return $category_name[0];
    }

    public function getFamilyListInOrder($id) {
      try{
          $sql = "SELECT * FROM family WHERE order_id = ?";
          $result = $this->db->query($sql,$id);
        }catch(Exception $e){
            echo "Unable to retrieve results";
            exit;
        }
        $families = $result->result();
        return $families;
    }

    public function getGenusListInFamily($id) {
      try{
          $sql = "SELECT * FROM genus WHERE family_id = ?";
          $result = $this->db->query($sql,$id);
        }catch(Exception $e){
            echo "Unable to retrieve results";
            exit;
        }
        $genus = $result->result();
        return $genus;
    }

    public function getSpeciesListInGenus($id) {
      try{
          $sql = "SELECT * FROM species WHERE genus_id = ?";
          $result = $this->db->query($sql,$id);
        }catch(Exception $e){
            echo "Unable to retrieve results";
            exit;
        }
        $species = $result->result();
        // echo '<pre>';
        // var_dump($species);
        // exit;
        // echo '</pre>';
        return $species;
    }

/*
    public function full_genre_array($category = null){
        $category = strtolower($category);
      //  include("connection.php");
        try{
            $sql = "SELECT genre, category"
                . " FROM Genres "
                . " JOIN Genre_Categories "
                . " ON Genres.genre_id = Genre_Categories.genre_id ";
            if(!empty($category)){
                $results = $this->db->prepare($sql
                    ." WHERE LOWER(category) = ?"
                    ." ORDER BY genre");
                $results->bindParam(1,$category,PDO::PARAM_STR);
            }else{
                $results = $this->db->prepare($sql ." ORDER BY genre");
            }
            $results->execute();
        }catch(Exception $e){
            echo "Unable to retrieve results";
            exit;
        }
        $genres = array();
        while($row = $results->fetch(PDO::FETCH_ASSOC)){
            //check explanation video - 05:46 min
            //https://teamtreehouse.com/library/integrating-php-with-databases/limiting-records-in-sql/simplifying-with-a-function
            $genres[$row["category"]][] = $row["genre"];
        }
        return $genres;
    }
*/
}
