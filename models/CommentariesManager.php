<?php
require_once('Manager.php');
class Commentaries extends Manager
{
    private $_id;
    private $_comment;
    private $_idPosts;
    private $_validate;
    private $_pseudo;

    //getter
    public function id()
    {
        return $this -> _id;
    }
    public function comment()
    {
        return $this -> _comment;
    }
    public function idPosts()
    {
        return $this -> _idPosts;
    }
    public function validate()
    {
        return $this -> _validate;
    }
    public function pseudo()
    {
        return $this -> _pseudo;
    }
    //setter
    public function setId($id)
    {
        if(is_numeric($id))
        {
            $this -> _id = $id;
        }
    }
    public function setComment($comment)
    {
        $this -> _comment = htmlspecialchars($comment);
    }
    public function setIdPosts($idPost)
    {
        if(is_int($idPost))
        {
            $this -> _idPosts = $idPost;
        }
    }
    public function setValidate($validate)
    {
        if(is_bool($validate))
        {
            $this -> _validate = $validate;
        }
    }
    public function setPseudo($pseudo)
    {
        if(is_string($pseudo))
        {
            $this -> _pseudo = htmlspecialchars($pseudo);
        }
    }
}