<?php
Class Media_model extends CI_Model
{

    public function get_catalog_count($category = null, $search = null){
        try {
            $sql = " SELECT * FROM items";
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
      FROM items
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

    public function random_catalog_array($limit = 3){
        try{ //pulling only 4 random items from the DB
            $results = $this->db->query(
                "SELECT id,title, category_id, description, picture
       FROM items
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
      FROM items
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
                FROM items
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

    public function single_item_array($id){
       // include("connection.php");
        try{
            //Execute a prepared statement with question mark placeholders
            $results = $this->db->prepare(
                "SELECT title, category, img, format, year, genre, publisher, isbn
      FROM Media
      JOIN Genres ON Media.genre_id = Genres.genre_id
      LEFT OUTER JOIN Books ON Media.media_id = Books.media_id
      WHERE Media.media_id = ?"
            ); //
            $results->bindParam(1,$id,PDO::PARAM_INT); //binds an intiger parameter to the placeholder
            $results->execute();

        }catch(Exception $e){
            echo "Unable to retrieve results";
        }
        //returning results as array with keys as number (FETCH_NUM) or assoc names (FETCH_ASSOC)
        $item = $results->fetch();
        if(empty($item)) return $item;

        try{ //retrieving data about peoples (multidimensional array, see data.php)
            $results = $this->db->prepare(
                "SELECT fullname, role
      FROM Media_People
      JOIN People ON Media_People.people_id = People.people_id
      WHERE Media_People.media_id = ?"
            ); //
            $results->bindParam(1,$id,PDO::PARAM_INT);
            $results->execute();

        }catch(Exception $e){
            echo "Unable to retrieve results";
        }
        while($row = $results->fetch(PDO::FETCH_ASSOC)){
            //assigning people to different roles depending on media genre
            $item[$row["role"]][] = $row["fullname"];//need to fully understand !!!!!!!!!!!!!!!!
        }
        return $item;
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
