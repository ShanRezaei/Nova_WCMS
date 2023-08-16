<?php
/**
	 * Class DbManager
	 * Handles all users and posts queries CRUD (Create ReadOne ReadAll Update Delete)
	 */
class DbManager extends DbConnector {


   ///////////////////////// //the methods to add user and also for login///////////////////////////

     // method to add new user
     public function addUser(user $user) {
        $query=$this->db->prepare("INSERT INTO user (firstname,lastname,email,passWord,level) VALUES (?,?,?,?,?)");
        $query->execute(array(
            $user->getFirstName(),
            $user->getLastName(),
            $user->getEmail(),
            $user->getPassWord(),
            $user->getLevel(),

        ));
        
        $result = $query->fetchAll();
        return $result;
    }


    // GET USER BY email to check unique email
    public function getUserByEmail(string $email) {
        $user_obj = array();
        $query3 = $this->db->prepare("SELECT * FROM user where email=?;");
        $query3->execute(array($email));
        $singleuser= $query3->fetchAll( PDO::FETCH_ASSOC );//if we want to get the info of the query we can use this line
        //return $query3->rowCount();


        
            foreach ( $singleuser as $user ) {
                return $user_obj[] =new user($user['id'],$user['firstname'],$user['lastname'],$user['email'],$user['password'],$user['level'],$user['stat']);
             }

             

        



    }

    //get all users
    public function getAllUser(){
        $user_obj = array();
        // query to get all users comments from posts db
        $query = $this->db->query("SELECT id,firstname,lastname,email,passWord,level,stat FROM user ;");
        $users = $query->fetchAll(PDO::FETCH_ASSOC);

       
            foreach ( $users as $obj ) {
                $user_obj[] = new user( $obj["id"],$obj["firstname"],$obj["lastname"],$obj["email"],$obj["passWord"],$obj["level"],$obj["stat"]);
            }
    
            return $user_obj;

        
       
       

    }


    //change status to 1 based on id
    public function activateUser(int $id){
        //update status of the user in db to 1
     $query1 = $this->db->prepare("UPDATE user SET stat=1 WHERE id=? ;");
     $query1->execute(array($id));
    //  then send another email to ask to log in
    //send email for activation
      $result2 = $query1->fetchAll();
      return $result2;

    }



    //change status to 0 based on id
    public function deactivateUser(int $id){
        //update status of the user in db to 1
     $query = $this->db->prepare("UPDATE user SET stat=0 WHERE id=? ;");
     $query->execute(array($id));
    //  then send another email to ask to log in
    //send email for activation
      $result2 = $query->fetchAll();
      return $result2;

    }












}

?>