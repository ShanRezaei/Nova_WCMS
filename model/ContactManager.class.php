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


    //rowcount


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


    //delete


    //rowcount


    //update


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


    //delete


    //rowcount


    //update

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


    //delete


    //rowcount


    //update



}

?>