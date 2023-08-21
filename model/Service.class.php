<?php

class Service{

// properties
private $id;
private $icon;
private $title;
private $text;


// constructor
        // here we will give attribute array to the constructor, for $_post is array and also whatever we will received during reading the table will be array.
		public function __construct($id,$icon,$title,$text) {
            //With doing this for id which is autoincrement , we wont give amount during insertion but can read it
			$this->id = $id ?? null;
            $this->icon = $icon;
            $this->title = $title;
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
     public function getIcon()
     {
         return $this->icon;
     }
 
     /**
      * @param mixed $icon
      */
     public function setIcon($icon) : void
     {
         $this->icon = $icon;
 
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

  



}
?>