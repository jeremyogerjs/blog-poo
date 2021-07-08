<?php
require_once('Manager.php');
class Mentions extends Manager
{
    private $_id;
    private $_likes;
    private $_idPosts;


    //getter
    public function id()
    {
        return $this -> _id;
    }
    public function likes()
    {
        return $this -> _likes;
    }
    public function idPosts()
    {
        return $this -> _idPosts;
    }
    //setter
    public function setId($id)
    {
        if(is_numeric($id))
        {
            $this -> _id = $id;
        }
    }
    public function setLikes($likes)
    {
        if(is_int($likes))
        {
            $this -> _likes = $likes;
        }
    }
    public function setIdPosts($idPosts)
    {
        $this -> _idPosts = $idPosts;
    }

}