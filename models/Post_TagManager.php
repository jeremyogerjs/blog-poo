<?php
require_once('Manager.php');
class PostTag extends Manager
{
    private $_id;
    private $_idPost;
    private $_idTag;


    //getter
    public function id()
    {
        return $this -> _id;
    }
    public function idPost()
    {
        return $this -> _idPost;
    }
    public function idTag()
    {
        return $this -> _idTag;
    }
    //setter
    public function setId($id)
    {
        if(is_numeric($id))
        {
            $this -> _id = $id;
        }
    }
    public function setIdPost($idPost)
    {
        if(is_int($idPost))
        {
            $this -> _idPost = $idPost;
        }
    }
    public function setIdTag($idTag)
    {
        if(is_int($idTag))
        {
            $this -> _idTag = $idTag;
        }
    }
}