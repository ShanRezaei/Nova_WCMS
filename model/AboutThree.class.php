<?php

class AboutThree{

    // properties
private $id;
private $title;
private $text;
private $link;
private $linktext;


// constructor
        // here we will give attribute array to the constructor, for $_post is array and also whatever we will received during reading the table will be array.
		public function __construct($id,$title,$text,$link,$linktext) {
            //With doing this for id which is autoincrement , we wont give amount during insertion but can read it
			$this->id = $id ?? null;
            $this->title= $title;
            $this->text = $text;
            $this->link = $link;
            $this->linktext = $linktext;
            
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
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link) : void
    {
        $this->link = $link;

    }


    // getter and setter
    public function getLinkText()
    {
        return $this->linktext;
    }

    /**
     * @param mixed $linktext
     */
    public function setLinkText($linktext) : void
    {
        $this->linktext = $linktext;

    }




















}