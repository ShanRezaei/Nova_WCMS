<?php

class HomeOne{

// properties
private $id;
private $logo;

// constructor
        // here we will give attribute array to the constructor, for $_post is array and also whatever we will received during reading the table will be array.
		public function __construct($id,$logo) {
            //With doing this for id which is autoincrement , we wont give amount during insertion but can read it
			$this->id = $id ?? null;
            $this->logo = $logo;
            
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
       public function getLogo()
       {
           return $this->logo;
       }
   
       /**
        * @param mixed $logo
        */
       public function setLogo($logo) : void
       {
           $this->logo = $logo;
   
       }







}