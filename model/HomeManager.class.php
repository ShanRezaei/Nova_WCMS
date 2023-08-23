<?php

/**
 * Class DbManager
 * Handles all Content queries CRUD (Create ReadOne ReadAll Update Delete)
 */
class HomeManager extends DbConnector{


    /////////////////////// table one///////////////////
    //get all content
    public function getAllHomeOne()
    {
        $homeone_obj = array();
        // query to get all clerks db
        $query = $this->db->query("SELECT * FROM homeone ;");
        $homeone = $query->fetchAll(PDO::FETCH_ASSOC);


        foreach ($homeone as $obj) {
            $homeone_obj[] = new HomeOne($obj["id"], $obj["text"]);
        }

        return $homeone_obj;
    }


    // update





    // ///////////////////table two////////////////////
    //get all content
    public function getAllHomeTwo()
    {
        $hometwo_obj = array();
        // query to get all clerks db
        $query = $this->db->query("SELECT * FROM hometwo ;");
        $hometwo = $query->fetchAll(PDO::FETCH_ASSOC);


        foreach ($hometwo as $obj) {
            $hometwo_obj[] = new HomeTwo($obj["id"], $obj["title"], $obj["text"], $obj["buttontitle"], $obj["buttonlink"], $obj["videolink"]);
        }

        return $hometwo_obj;
    }


    // update






    // ///////////////////table three//////////////////

    //get all content
    public function getAllHomeThree()
    {
        $homethree_obj = array();
        // query to get all clerks db
        $query = $this->db->query("SELECT * FROM homethree ;");
        $homethree = $query->fetchAll(PDO::FETCH_ASSOC);


        foreach ($homethree as $obj) {
            $homethree_obj[] = new HomeThree($obj["id"],$obj["firstname"], $obj["lastname"], $obj["title"], $obj["text"],  $obj["img"]);
        }

        return $homethree_obj;
    }



    //add new post
    public function addNewPost(HomeThree $post){
    
        // query to add new product db
        $query=$this->db->prepare("INSERT INTO `homethree`( `firstname`, `lastname`, `title`, `text`, `img`) VALUES (?,?,?,?,?)");
        $query->execute(array(
            $post->getFirstName(),
            $post->getLastName(),
            $post->getTitle(),
            $post->getText(),
            $post->getImg(),
        
        ));
        
        $result = $query->fetchAll();
        return $result;
    
    }


    //delete
    public function deletePost(int $id){
    
        // query to delete new product db
        $query=$this->db->prepare("DELETE FROM `homethree` WHERE `id`=?");
        $query->execute(array( $id));
        
        $result = $query->fetchAll();
        return $result;
    
    }




    //row count
    public function countPost(){
    
        // query to count product db
        $query=$this->db->prepare("SELECT * FROM `homethree`");
        $query->execute();
        
       
        return $query;
    
    }


    //update





}