<?php
/**
	 * Class DbManager
	 * Handles all Content queries CRUD (Create ReadOne ReadAll Update Delete)
	 */
class ServiceManager extends DbConnector {

    //get all content
public function getAllServices(){
    $service_obj = array();
    // query to get all services db
    $query = $this->db->query("SELECT id,icon,title,text FROM service ;");
    $services = $query->fetchAll(PDO::FETCH_ASSOC);

   
        foreach ( $services as $obj ) {
            $service_obj[] = new Service( $obj["id"],$obj["icon"],$obj["title"],$obj["text"]);
        }

        return $service_obj;

    

}


// add new service
public function addNewService(Service $service){
    
    // query to add new product db
    $query=$this->db->prepare("INSERT INTO `service`( `icon`, `title`, `text`) VALUES (?,?,?)");
    $query->execute(array(
        $service->getIcon(),
        $service->getTitle(),
        $service->getText(),
        
    
    ));
    
    $result = $query->fetchAll();
    return $result;

}

// delete service
public function deleteService(int $id){
    
    // query to delete db
    $query=$this->db->prepare("DELETE FROM `service` WHERE `id`=?");
    $query->execute(array( $id));
    
    $result = $query->fetchAll();
    return $result;

}

//return row count
public function countService(){
    
    // query to count service db
    $query=$this->db->prepare("SELECT * FROM `service`");
    $query->execute();
    
   
    return $query;

}



// update service
public function updateServiceOne(Service $service){
    $query1 = $this->db->prepare("UPDATE `service` SET `icon`=?,`title`=?,`text`=? WHERE `id`=?;") ;
    $query1->execute(array(
        $service->getIcon(),
        $service->getTitle(),
        $service->getText(),
       
       
        $service->getId(),
         

    ));

    $result1 = $query1->fetchAll();
    return $result1;

}









}

?>