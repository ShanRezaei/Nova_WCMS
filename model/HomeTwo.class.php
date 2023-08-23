<?php

class HomeTwo{


    // properties
private $id;
private $title;
private $text;
private $buttontitle;
private $buttonlink;
private $videolink;


// constructor
        // here we will give attribute array to the constructor, for $_post is array and also whatever we will received during reading the table will be array.
		public function __construct($id,$title,$text,$buttontitle,$buttonlink,$videolink) {
            //With doing this for id which is autoincrement , we wont give amount during insertion but can read it
			$this->id = $id ?? null;
            $this->title = $title;
            $this->text = $text;
            $this->buttontitle = $buttontitle;
            $this->buttonlink = $buttonlink;
            $this->videolink = $videolink;
            
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
public function getButtonTitle()
{
    return $this->buttontitle;
}

/**
 * @param mixed $buttontitle
 */
public function setButtonTitle($buttontitle) : void
{
    $this->buttontitle = $buttontitle;

}


// getter and setter
public function getButtonLink()
{
    return $this->buttonlink;
}

/**
 * @param mixed $buttonlink
 */
public function setButtonLink($buttonlink) : void
{
    $this->buttonlink = $buttonlink;

}


// getter and setter
public function getVideoLink()
{
    return $this->videolink;
}

/**
 * @param mixed $videolink
 */
public function setVideoLink($videolink) : void
{
    $this->videolink = $videolink;

}










}