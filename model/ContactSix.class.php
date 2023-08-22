<?php

class ContactSix
{

    // properties
    private $id;
    private $type;
    private $name;
    private $placeholder;

    // constructor
    // here we will give attribute array to the constructor, for $_post is array and also whatever we will received during reading the table will be array.
    public function __construct($id, $type, $name, $placeholder)
    {
        //With doing this for id which is autoincrement , we wont give amount during insertion but can read it
        $this->id = $id ?? null;
        $this->type = $type;
        $this->name = $name;
        $this->placeholder = $placeholder;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
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
public function getPlaceholder()
{
    return $this->placeholder;
}

/**
 * @param mixed $placeholder
 */
public function setPlaceholder($placeholder): void
{
    $this->placeholder= $placeholder;
}










}