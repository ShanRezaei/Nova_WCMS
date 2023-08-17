<?php

class Team{

// properties
private $id;
private $img;
private $firstname;
private $lastname;
private $job;

// constructor
        // here we will give attribute array to the constructor, for $_post is array and also whatever we will received during reading the table will be array.
		public function __construct($id,$img,$firstname,$lastname,$job) {
            //With doing this for id which is autoincrement , we wont give amount during insertion but can read it
			$this->id = $id ?? null;
            $this->img = $img;
            $this->firstname = $firstname;
			$this->lastname = $lastname;
            $this->job = $job;
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
     public function getImg()
     {
         return $this->img;
     }
 
     /**
      * @param mixed $img
      */
     public function setImg($img) : void
     {
         $this->img = $img;
 
     }



      // getter and setter
    public function getfirstName()
	{
		return $this->firstname;
	}

    /**
     * @param mixed $name
     */
    public function setfirstName($firstname) : void
    {
    	$this->firstname = $firstname;

    }

  // getter and setter
  public function getlastName()
  {
      return $this->lastname;
  }

  /**
   * @param mixed $name
   */
  public function setlastName($lastname) : void
  {
      $this->lastname = $lastname;

  }

  // getter and setter
  public function getjob()
  {
      return $this->job;
  }

  /**
   * @param mixed $job
   */
  public function setjob($job) : void
  {
      $this->job = $job;

  }




}
?>