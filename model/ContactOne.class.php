<?php

class ContactOne
{

    // properties
    private $id;
    private $title;
    private $description;
    private $icon;


    // constructor
    // here we will give attribute array to the constructor, for $_post is array and also whatever we will received during reading the table will be array.
    public function __construct($id, $title, $description, $icon)
    {
        //With doing this for id which is autoincrement , we wont give amount during insertion but can read it
        $this->id = $id ?? null;
        $this->title = $title;
        $this->description = $description;
        $this->icon = $icon;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    // getter and setter
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    // getter and setter
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     */
    public function setIcon($icon): void
    {
        $this->icon = $icon;
    }
}
