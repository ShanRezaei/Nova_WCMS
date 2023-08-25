<?php

/**
 * Class DbManager
 * Handles all Content queries CRUD (Create ReadOne ReadAll Update Delete)
 */
class ContactManager extends DbConnector{

/////////////////////////// methods for contactOne section///////////////////////
    //get all content
    public function getAllContactOne()
    {
        $contactone_obj = array();
        // query to get all clerks db
        $query = $this->db->query("SELECT * FROM contactone ;");
        $contactone = $query->fetchAll(PDO::FETCH_ASSOC);


        foreach ($contactone as $obj) {
            $contactone_obj[] = new ContactOne($obj["id"], $obj["title"], $obj["description"], $obj["icon"]);
        }

        return $contactone_obj;
    }



    //update
    public function updateContactOne(ContactOne $contactone){
        $query1 = $this->db->prepare("UPDATE `contactone` SET `title`=?,`description`=?,`icon`=? WHERE `id`=?;") ;
        $query1->execute(array(
            $contactone->getTitle(),
            $contactone->getDescription(),
            $contactone->getIcon(),
           
            $contactone->getId(),
             
    
        ));
    
        $result1 = $query1->fetchAll();
        return $result1;
    
    }

    

/////////////////////////// methods for contactTwo section///////////////////////
    //get all content
    public function getAllContactTwo()
    {
        $contacttwo_obj = array();
        // query to get all clerks db
        $query = $this->db->query("SELECT * FROM contacttwo ;");
        $contacttwo = $query->fetchAll(PDO::FETCH_ASSOC);


        foreach ($contacttwo as $obj) {
            $contacttwo_obj[] = new ContactTwo($obj["id"], $obj["name"], $obj["text"]);
        }

        return $contacttwo_obj;
    }



    //update

    public function updateContactTwo(ContactTwo $contacttwo){
        $query1 = $this->db->prepare("UPDATE `contacttwo` SET `name`=?,`text`=? WHERE `id`=?;") ;
        $query1->execute(array(
            $contacttwo->getName(),
            $contacttwo->getText(),
           
            $contacttwo->getId(),
             
    
        ));
    
        $result1 = $query1->fetchAll();
        return $result1;
    
    }




    /////////////////////////// methods for contactThree section///////////////////////
    //get all content
    public function getAllContactThree()
    {
        $contactthree_obj = array();
        // query to get all clerks db
        $query = $this->db->query("SELECT * FROM contactthree ;");
        $contactthree = $query->fetchAll(PDO::FETCH_ASSOC);


        foreach ($contactthree as $obj) {
            $contactthree_obj[] = new ContactThree($obj["id"], $obj["icon"], $obj["linkaddress"]);
        }

        return $contactthree_obj;
    }


    //delete

    public function deleteLink(int $id){
    
        // query to delete new product db
        $query=$this->db->prepare("DELETE FROM `contactthree` WHERE `id`=?");
        $query->execute(array( $id));
        
        $result = $query->fetchAll();
        return $result;
    
    }




    //rowcount

    public function countLink(){
    
        // query to count product db
        $query=$this->db->prepare("SELECT * FROM `contactthree`");
        $query->execute();
        
       
        return $query;
    
    }

    //update

    /////////////////////////// methods for contactFour section///////////////////////
    //get all content
    public function getAllContactFour()
    {
        $contactfour_obj = array();
        // query to get all clerks db
        $query = $this->db->query("SELECT * FROM contactfour ;");
        $contactfour = $query->fetchAll(PDO::FETCH_ASSOC);


        foreach ($contactfour as $obj) {
            $contactfour_obj[] = new ContactFour($obj["id"], $obj["text"],$obj["link"]);
        }

        return $contactfour_obj;
    }




    //add
    public function addContactFour(ContactFour $four){
    
        // query to add new product db
        $query=$this->db->prepare("INSERT INTO `contactfour`( `text`, `link`) VALUES (?,?)");
        $query->execute(array(
            $four->getText(),
            $four->getLink(),
            
        
        ));
        
        $result = $query->fetchAll();
        return $result;
    
    }






    //delete
    public function deleteFour(int $id){
    
        // query to delete new product db
        $query=$this->db->prepare("DELETE FROM `contactfour` WHERE `id`=?");
        $query->execute(array( $id));
        
        $result = $query->fetchAll();
        return $result;
    
    }



    //rowcount
    public function countFour(){
    
        // query to count product db
        $query=$this->db->prepare("SELECT * FROM `contactFour`");
        $query->execute();
        
       
        return $query;
    
    }


    //update
    public function updateContactFour(ContactFour $contactfour){
        $query1 = $this->db->prepare("UPDATE `contactfour` SET `text`=?,`link`=? WHERE `id`=?;") ;
        $query1->execute(array(
            
            $contactfour->getText(),
            $contactfour->getLink(),
            $contactfour->getId(),
             
    
        ));
    
        $result1 = $query1->fetchAll();
        return $result1;
    
    }




    /////////////////////////// methods for contactFive section///////////////////////
    //get all content
    public function getAllContactFive()
    {
        $contactfive_obj = array();
        // query to get all clerks db
        $query = $this->db->query("SELECT * FROM contactfive ;");
        $contactfive = $query->fetchAll(PDO::FETCH_ASSOC);


        foreach ($contactfive as $obj) {
            $contactfive_obj[] = new ContactFive($obj["id"], $obj["text"],$obj["link"]);
        }

        return $contactfive_obj;
    }




    //add
    public function addContactFive(ContactFive $five){
    
        // query to add new product db
        $query=$this->db->prepare("INSERT INTO `contactfive`( `text`, `link`) VALUES (?,?)");
        $query->execute(array(
            $five->getText(),
            $five->getLink(),
            
        
        ));
        
        $result = $query->fetchAll();
        return $result;
    
    }






    //delete
    public function deleteFive(int $id){
    
        // query to delete new product db
        $query=$this->db->prepare("DELETE FROM `contactfive` WHERE `id`=?");
        $query->execute(array( $id));
        
        $result = $query->fetchAll();
        return $result;
    
    }



    //rowcount
    public function countFive(){
    
        // query to count product db
        $query=$this->db->prepare("SELECT * FROM `contactfive`");
        $query->execute();
        
       
        return $query;
    
    }


    //update
    public function updateContactFive(ContactFive $contactfive){
        $query1 = $this->db->prepare("UPDATE `contactfive` SET `text`=?,`link`=? WHERE `id`=?;") ;
        $query1->execute(array(
            
            $contactfive->getText(),
            $contactfive->getLink(),
            $contactfive->getId(),
             
    
        ));
    
        $result1 = $query1->fetchAll();
        return $result1;
    
    }







/////////////////////////// methods for contactsix section///////////////////////
    //get all content
    public function getAllContactSix()
    {
        $contactsix_obj = array();
        // query to get all clerks db
        $query = $this->db->query("SELECT * FROM contactsix ;");
        $contactsix = $query->fetchAll(PDO::FETCH_ASSOC);


        foreach ($contactsix as $obj) {
            $contactsix_obj[] = new ContactSix($obj["id"], $obj["type"],$obj["name"],$obj["placeholder"]);
        }

        return $contactsix_obj;
    }




    //add
    public function addContactSix(ContactSix $six){
    
        // query to add new product db
        $query=$this->db->prepare("INSERT INTO `contactsix`( `type`, `name`, `placeholder`) VALUES (?,?,?)");
        $query->execute(array(
            $six->getType(),
            $six->getName(),
            $six->getPlaceholder(),
            
        
        ));
        
        $result = $query->fetchAll();
        return $result;
    
    }






    //delete

    public function deleteSix(int $id){
    
        // query to delete new product db
        $query=$this->db->prepare("DELETE FROM `contactsix` WHERE `id`=?");
        $query->execute(array( $id));
        
        $result = $query->fetchAll();
        return $result;
    
    }



    //rowcount
    public function countSix(){
    
        // query to count product db
        $query=$this->db->prepare("SELECT * FROM `contactsix`");
        $query->execute();
        
       
        return $query;
    
    }


    //update





}

?>