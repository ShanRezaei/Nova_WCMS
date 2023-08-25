<?php
/**
	 * Class DbManager
	 * Handles all Content queries CRUD (Create ReadOne ReadAll Update Delete)
	 */
class ServiceCardManager extends DbConnector {

     //get all content
public function getAllServicecards(){
    $service_obj = array();
    // query to get all services db
    $query = $this->db->query("SELECT id,img,title,text FROM servicecard ;");
    $services = $query->fetchAll(PDO::FETCH_ASSOC);

   
        foreach ( $services as $obj ) {
            $service_obj[] = new ServiceCard( $obj["id"],$obj["img"],$obj["title"],$obj["text"]);
        }

        return $service_obj;

    

}

// add new service card
public function addNewServiceCard(ServiceCard $servicecard){
    
    // query to add new product db
    $query=$this->db->prepare("INSERT INTO `servicecard`( `img`, `title`, `text`) VALUES (?,?,?)");
    $query->execute(array(
        $servicecard->getImg(),
        $servicecard->getTitle(),
        $servicecard->getText(),
        
    
    ));
    
    $result = $query->fetchAll();
    return $result;

}

// delete
public function deleteServiceCard(int $id){
    
    // query to delete db
    $query=$this->db->prepare("DELETE FROM `servicecard` WHERE `id`=?");
    $query->execute(array( $id));
    
    $result = $query->fetchAll();
    return $result;

}



// row count
public function countServicecard(){
    
    // query to count service db
    $query=$this->db->prepare("SELECT * FROM `servicecard`");
    $query->execute();
    
   
    return $query;

}


// update
public function updateServiceCardOne(ServiceCard $service){
    $query1 = $this->db->prepare("UPDATE `servicecard` SET `title`=?,`text`=? WHERE `id`=?;") ;
    $query1->execute(array(
        $service->getTitle(),
        $service->getText(),
        
        $service->getId(),
         

    ));

    $result1 = $query1->fetchAll();
    return $result1;

}



public function updateServiceCardTwo(ServiceCard $service){
    $query1 = $this->db->prepare("UPDATE `servicecard` SET`img`=?, `title`=?,`text`=? WHERE `id`=?;") ;
    $query1->execute(array(
        $service->getImg(),
        $service->getTitle(),
        $service->getText(),
        
        $service->getId(),
         

    ));

    $result1 = $query1->fetchAll();
    return $result1;

}

}