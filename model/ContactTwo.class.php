<?php

class ContactTwo{

    // properties
    private $id;
    private $name;
    private $text;
   


    // constructor
    // here we will give attribute array to the constructor, for $_post is array and also whatever we will received during reading the table will be array.
    public function __construct($id, $name, $text)
    {
        //With doing this for id which is autoincrement , we wont give amount during insertion but can read it
        $this->id = $id ?? null;
        $this->name = $name;
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
    public function setId($id): void
    {
        $this->id = $id;
    }


    // getter and setter
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    // getter and setter
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $description
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

    
}
