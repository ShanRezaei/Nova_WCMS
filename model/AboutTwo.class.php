<?php

class AboutTwo{

    // properties
private $id;
private $titleone;
private $titletwo;
private $text;

// constructor
        // here we will give attribute array to the constructor, for $_post is array and also whatever we will received during reading the table will be array.
		public function __construct($id,$titleone,$titletwo,$text) {
            //With doing this for id which is autoincrement , we wont give amount during insertion but can read it
			$this->id = $id ?? null;
            $this->titleone = $titleone;
            $this->titletwo = $titletwo;
            $this->text = $text;
            
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
       public function getTitleOne()
       {
           return $this->titleone;
       }
   
       /**
        * @param mixed $titleone
        */
       public function setTitleOne($titleone) : void
       {
           $this->titleone = $titleone;
   
       }
   


       // getter and setter
       public function getTitleTwo()
       {
           return $this->titletwo;
       }
   
       /**
        * @param mixed $titletwo
        */
       public function setTitleTwo($titletwo) : void
       {
           $this->titletwo = $titletwo;
   
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


















}