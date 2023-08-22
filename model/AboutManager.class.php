<?php

/**
 * Class DbManager
 * Handles all Content queries CRUD (Create ReadOne ReadAll Update Delete)
 */
class AboutManager extends DbConnector
{

    /////////////////////////// methods for AboutOne section///////////////////////
    //get all content
    public function getAllAboutOne()
    {
        $aboutone_obj = array();
        // query to get all clerks db
        $query = $this->db->query("SELECT id,img FROM aboutone ;");
        $aboutone = $query->fetchAll(PDO::FETCH_ASSOC);


        foreach ($aboutone as $obj) {
            $aboutone_obj[] = new AboutOne($obj["id"], $obj["img"]);
        }

        return $aboutone_obj;
    }



    //update




    /////////////////////////// methods for AboutTwo section///////////////////////

    //get all content
    public function getAllAboutTwo()
    {
        $abouttwo_obj = array();
        // query to get all clerks db
        $query = $this->db->query("SELECT id,titleone,titletwo,text FROM abouttwo ;");
        $abouttwo = $query->fetchAll(PDO::FETCH_ASSOC);


        foreach ($abouttwo as $obj) {
            $abouttwo_obj[] = new AboutTwo($obj["id"], $obj["titleone"], $obj["titletwo"], $obj["text"]);
        }

        return $abouttwo_obj;
    }

    // add new
    public function addNewpage(AboutTwo $abouttwo){
    
        // query to add new product db
        $query=$this->db->prepare("INSERT INTO `abouttwo`( `titleone`, `titletwo`, `text`) VALUES (?,?,?)");
        $query->execute(array(
            $abouttwo->getTitleOne(),
            $abouttwo->getTitleTwo(),
            $abouttwo->getText(),
        
        ));
        
        $result = $query->fetchAll();
        return $result;
    
    }

    // row count

    public function countPage(){
    
        // query to count product db
        $query=$this->db->prepare("SELECT * FROM `abouttwo`");
        $query->execute();
        
       
        return $query;
    
    }

    // delete

    public function deletePage(int $id){
    
        // query to delete new product db
        $query=$this->db->prepare("DELETE FROM `abouttwo` WHERE `id`=?");
        $query->execute(array( $id));
        
        $result = $query->fetchAll();
        return $result;
    
    }

    
    // update



    /////////////////////////// methods for AboutThree section///////////////////////

    //get all content
    public function getAllAboutThree()
    {
        $aboutthree_obj = array();
        // query to get all clerks db
        $query = $this->db->query("SELECT id,title,text,link,linktext FROM aboutthree ;");
        $aboutthree = $query->fetchAll(PDO::FETCH_ASSOC);


        foreach ($aboutthree as $obj) {
            $aboutthree_obj[] = new AboutThree($obj["id"], $obj["title"], $obj["text"], $obj["link"], $obj["linktext"]);
        }

        return $aboutthree_obj;
    }


    // update



}
