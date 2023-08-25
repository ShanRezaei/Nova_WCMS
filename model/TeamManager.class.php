<?php
/**
	 * Class DbManager
	 * Handles all Content queries CRUD (Create ReadOne ReadAll Update Delete)
	 */
class TeamManager extends DbConnector {

    //get all content
public function getAllClerks(){
    $clerk_obj = array();
    // query to get all clerks db
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


// delete team member

public function deleteclerk(int $id){
    
    // query to delete db
    $query=$this->db->prepare("DELETE FROM `team` WHERE `id`=?");
    $query->execute(array( $id));
    
    $result = $query->fetchAll();
    return $result;

}



// row count
public function countClerk(){
    
    // query to count service db
    $query=$this->db->prepare("SELECT * FROM `team`");
    $query->execute();
    
   
    return $query;

}


// update team
public function updateTeamOne(Team $team){
    $query1 = $this->db->prepare("UPDATE `team` SET `img`=?,`fname`=?,`lname`=?,`job`=? WHERE `id`=?;") ;
    $query1->execute(array(
        $team->getImg(),
        $team->getfirstName(),
        $team->getlastName(),
        $team->getjob(),
        
        $team->getId(),
         

    ));

    $result1 = $query1->fetchAll();
    return $result1;

}

public function updateTeamTwo(Team $team){
    $query1 = $this->db->prepare("UPDATE `team` SET `fname`=?,`lname`=?,`job`=? WHERE `id`=?;") ;
    $query1->execute(array(
       
        $team->getfirstName(),
        $team->getlastName(),
        $team->getjob(),
        
        $team->getId(),
         

    ));

    $result1 = $query1->fetchAll();
    return $result1;

}



}

?>