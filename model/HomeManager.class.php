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
    public function updateHomeOne(HomeOne $homeone){
        $query1 = $this->db->prepare("UPDATE `homeone` SET `text`=? WHERE `id`=?;") ;
        $query1->execute(array(
            
            $homeone->getLogo(),
            $homeone->getId(),
             
    
        ));
    
        $result1 = $query1->fetchAll();
        return $result1;
    
    }





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
    public function updateHomeTwo(HomeTwo $hometwo){
        $query1 = $this->db->prepare("UPDATE `hometwo` SET `title`=?,`text`=?,`buttontitle`=?,`buttonlink`=?,`videolink`=? WHERE `id`=?") ;
        $query1->execute(array(
            $hometwo->getTitle(),
            $hometwo->getText(),
            $hometwo->getButtonTitle(),
            $hometwo->getButtonLink(),
            $hometwo->getVideoLink(),
            $hometwo->getId(),
             
    
        ));
    
        $result1 = $query1->fetchAll();
        return $result1;
    
    }





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


    //update one 
    public function updateHomeThreeOne(HomeThree $home){
        $query1 = $this->db->prepare("UPDATE `homethree` SET `firstname`=?,`lastname`=?,`title`=?,`text`=?,`img`=? WHERE `id`=?;") ;
        $query1->execute(array(
            
            $home->getfirstName(),
            $home->getlastName(),
            $home->getTitle(),
            $home->getText(),
            $home->getImg(),
            
            $home->getId(),
             
    
        ));
    
        $result1 = $query1->fetchAll();
        return $result1;
    
    }


    //update two
    public function updateHomeThreeTwo(HomeThree $home){
        $query1 = $this->db->prepare("UPDATE `homethree` SET `firstname`=?,`lastname`=?,`title`=?,`text`=? WHERE `id`=?;") ;
        $query1->execute(array(
            
            $home->getfirstName(),
            $home->getlastName(),
            $home->getTitle(),
            $home->getText(),
           
            
            $home->getId(),
             
    
        ));
    
        $result1 = $query1->fetchAll();
        return $result1;
    
    
    }





}