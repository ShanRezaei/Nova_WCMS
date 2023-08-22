<?php

class ContactThree{

    // properties
    private $id;
    private $icon;
    private $linkaddress;

    public function __construct($id,$icon,$linkaddress)
    {
        $this->id = $id ?? null;
        $this->icon=$icon;
        $this->linkaddress=$linkaddress;
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

    // getter and setter
    public function getLinkAddress()
    {
        return $this->linkaddress;
    }

    /**
     * @param mixed $linkaddress
     */
    public function setLinkAddress($linkaddress): void
    {
        $this->linkaddress = $linkaddress;
    }







   


}