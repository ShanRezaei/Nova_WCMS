

<?php

class user{

// properties
private $id;
private $firstName;
private $lastName;
private $passWord;
private $email;
private $level;
private $stat;


// constructor
        // here we will give attribute array to the constructor, for $_post is array and also whatever we will received during reading the table will be array.
		public function __construct($id,$firstName,$lastName,$email, $passWord,$level,$stat) {
            //With doing this for id which is autoincrement , we wont give amount during insertion but can read it
			$this->id = $id ?? null;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
			$this->passWord = $passWord;
			$this->email = $email;
            $this->level = $level;
			
            //With doing this for status which has default value , we wont give amount during insertion but can read it and change it
			$this->stat = $stat ?? 1;
		}


       // getter and setter
    public function getId()
	{
		return $this->id;
	}

    /**
     * @param mixed $id
     */
    public function setId($id) : void
    {
    	$this->id = $id;

    }
    
    // getter and setter
    public function getFirstName()
	{
		return $this->firstName;
	}

    /**
     * @param mixed $firstname
     */
    public function setFirstName($firstName) : void
    {
    	$this->firstName = $firstName;

    }
		
// getter and setter
public function getLastName()
{
    return $this->lastName;
}

/**
 * @param mixed $lastname
 */
public function setLastName($lastName) : void
{
    $this->lastName = $lastName;

}

public function getPassWord()
    {
        return $this->passWord;
    }

/**
 * @param mixed $password
 */
public function setPassWord($passWord) : void
{
    $this->passWord = $passWord;

}


public function getEmail()
    {
        return $this->email;
    }

/**
 * @param mixed $Email
 */
public function setEmail($email) : void
{
    $this->email = $email;

}

public function getLevel()
    {
    	return $this->level;
    }

    /**
     * @param mixed $status
     */
    public function setLevel($level) : void
    {
    	$this->level= $level;
    }



public function getStat()
    {
    	return $this->stat;
    }

    /**
     * @param mixed $status
     */
    public function setStat($stat) : void
    {
    	$this->stat= $stat;
    }















}

?>