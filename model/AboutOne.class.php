<?php

class AboutOne{

// properties
private $id;
private $img;

// constructor
        // here we will give attribute array to the constructor, for $_post is array and also whatever we will received during reading the table will be array.
		public function __construct($id,$img) {
            //With doing this for id which is autoincrement , we wont give amount during insertion but can read it
			$this->id = $id ?? null;
            $this->img = $img;
            
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





}