<?php
Class Catalog_model extends CI_Model
{

    public function get_catalog_count($category = null, $search = null){
        try {
            $sql = " SELECT * FROM species";
            if(!empty($search)){
                $sql .=  " WHERE title LIKE ?";
                $result = $this->db->query($sql, '%'.$search.'%' ); //binding values to query
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
            $sql = "SELECT id,title, category_id, picture
      FROM species
      ORDER BY REPLACE(REPLACE(REPLACE(title,'The ',''), 'An ' , ''), 'A ', '')";
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
                "SELECT id, title, title_lat, title_hun, category_id, description, picture
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
            $sql = "SELECT id,title, category_id, picture
      FROM species
      WHERE category_id = ?
      ORDER BY REPLACE(REPLACE(REPLACE(title,'The ',''), 'An ' , ''), 'A ', '')";
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
            $sql = " SELECT id,title,category_id, picture
                FROM species
                WHERE title LIKE ?
                ORDER BY REPLACE(REPLACE(REPLACE(title,'The ',''), 'An ' , ''), 'A ', '')";
            if(is_integer($limit)){
                $sql .= " LIMIT ? OFFSET ? ";
                $results = $this->db->query($sql, array('%'.$search.'%',$limit,$offset));
            }else{
                $results = $this->db->query($sql, array('%'.$search.'%'));
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
