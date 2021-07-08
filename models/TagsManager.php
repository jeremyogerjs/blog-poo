<?php
require_once('Manager.php');
class Tags extends Manager
{
    private $_id;
    private $_tagName;

    //getter
    public function id()
    {
        return $this -> _id;
    }
    public function tagName()
    {
        return $this -> _tagName;
    }
    
    //setter
    public function setId($id)
    {
        if(is_numeric($id))
        {
            $this -> _id = $id;
        }
    }
    public function setTagName($tagName)
    {
        if(is_string($tagName))
        {
            $this -> _tagName = $tagName;
        }
    }
}