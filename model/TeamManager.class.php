<?php
/**
	 * Class DbManager
	 * Handles all Content queries CRUD (Create ReadOne ReadAll Update Delete)
	 */
class TeamManager extends DbConnector {

    //get all content
public function getAllClerks(){
    $clerk_obj = array();
    // query to get all users comments from posts db
    $query = $this->db->query("SELECT id,img,fname,lname,job FROM team ;");
    $clerks = $query->fetchAll(PDO::FETCH_ASSOC);

   
        foreach ( $clerks as $obj ) {
            $clerk_obj[] = new Team( $obj["id"],$obj["img"],$obj["fname"],$obj["lname"],$obj["job"]);
        }

        return $clerk_obj;

    
   
   

}


//add new team member
public function addNewMember(Team $team){
    
    // query to add new product db
    $query=$this->db->prepare("INSERT INTO `team`( `img`, `fname`, `lname`, `job`) VALUES (?,?,?,?)");
    $query->execute(array(
        $team->getImg(),
        $team->getfirstName(),
        $team->getlastName(),
        $team->getjob(),
    
    ));
    
    $result = $query->fetchAll();
    return $result;

}






}

?>