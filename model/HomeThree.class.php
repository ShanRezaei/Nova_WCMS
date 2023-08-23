<?php

class HomeThree{

// properties
private $id;
private $firstname;
private $lastname;
private $title;
private $text;
private $img;


// constructor
        // here we will give attribute array to the constructor, for $_post is array and also whatever we will received during reading the table will be array.
		public function __construct($id,$firstname,$lastname,$title,$text,$img) {
            //With doing this for id which is autoincrement , we wont give amount during insertion but can read it
			$this->id = $id ?? null;
            $this->firstname = $firstname;
            $this->lastname=$lastname;
            $this->title=$title;
            $this->text=$text;
            $this->img=$img;
            
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
            return $this->firstname;
        }
    
        /**
         * @param mixed $fname
         */
        public function setFirstName($firstname) : void
        {
            $this->firstname = $firstname;
    
        }

// getter and setter
public function getLastName()
{
    return $this->lastname;
}

/**
 * @param mixed $lname
 */
public function setLastName($lastname) : void
{
    $this->lastname = $lastname;

}

// getter and setter
public function getTitle()
{
    return $this->title;
}

/**
 * @param mixed $title
 */
public function setTitle($title) : void
{
    $this->title = $title;

}

// getter and setter
public function getText()
{
    return $this->text;
}

/**
 * @param mixed $text
 */
public function setText($text) : void
{
    $this->text = $text;

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