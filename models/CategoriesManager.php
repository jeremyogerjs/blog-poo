<?php
require_once('Manager.php');
class Categories extends Manager
{
    private $_id;
    private $_catName;


    //getter
    public function id()
    {
        return $this -> _id;
    }
    public function catName()
    {
        return $this -> _catName;
    }
    //setter
    public function setId($id)
    {
        if(is_numeric($id))
        {
            $this -> _id = $id;
        }
    }
    public function setCatName($catName)
    {
        if(is_string($catName))
        {
            $this -> _catName = htmlspecialchars($catName);
        }
    }
}