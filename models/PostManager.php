<?php
require_once('Manager.php');
class PostManager extends Manager
{
    private $_id;
    private $_title;
    private $_content;
    private $_idUser;
    private $_createdDate;
    private $_idCategory;

    

    //methods
    public function create()
    {
        $this -> setTitle($_POST['title']);
        $this ->setContent($_POST['content']);
        $this -> setCreatedDate($_POST['createdDate']);
        $this -> setIdCategory($_POST['idCategory']);

        $this -> setReq("INSERT INTO posts (
            title, 
            content, 
            idUser, 
            createdDate,
            idCategory)
        VALUES (:title,:content,:idUser,:createdDate,:idCategory)");

        $result = $this -> dbConnect() -> prepare($this -> req());
        $results = $result -> execute(
            array
            (
            ':title' => $this -> setTitle($_POST['title']),
            ':idUser' => 1,
            ':content' => $this ->setContent($_POST['content']),
            ':createdDate' => $this -> setCreatedDate($_POST['createdDate']),
            ':idCategory' => $this -> setIdCategory($_POST['idCategory'])
            )
        );
        return $results;
    }
    public function delete()
    {
        $this -> setId($_GET['id']);
        $this -> setReq("DELETE FROM posts WHERE posts.id=".$this -> id());
        $result = $this -> dbConnect() -> exec($this -> req());

        return $result;
    }
    public function getList()
    {
        $result = $this -> pagination("",
            "SELECT c.id,p.id,p.title,p.content,u.username,p.createdDate,c.catName,p.idCategory 
            FROM posts as p 
            INNER JOIN categories as c ON p.idCategory = c.id 
            INNER JOIN users as u ON u.id = p.idUser 
            ORDER BY createdDate DESC LIMIT " . $this -> perPage() . 
            "OFFSET ". $this -> offset()
        );
        
        return $result;
    }
    public function search()
    {
        $query = isset($_POST['search']) ? htmlspecialchars($_POST['search']) : '';
        $this -> pagination("SELECT COUNT(id) FROM posts as p WHERE p.title LIKE '%$query%'",
        "SELECT c.id,p.id,p.title,p.content,u.username,p.createdDate,c.catName,p.idCategory 
        FROM posts as p 
        INNER JOIN categories as c ON p.idCategory = c.id 
        INNER JOIN users as u ON u.id = p.idUser 
        WHERE p.title LIKE '%$query%'
        LIMIT " . $this -> perPage() . 
        "OFFSET ". $this -> offset()
        );
    }  
    public function update()
    {
        $this -> setTitle($_POST['title']);
        $this ->setContent($_POST['content']);
        $this -> setCreatedDate($_POST['createdDate']);
        $this -> setIdCategory($_POST['idCategory']);
        $this -> setId($_GET['id']);

        $this -> setReq("UPDATE posts SET
        title         = :title,
        content      = :content,
        idUser     = :idUser,
        createdDate   = :createdDate,
        idCategory      = :idCategory
        WHERE id = :id");

        $result = $this -> dbConnect() -> prepare($this -> req());

        $results = $result -> execute(array(
            ':title' => $this -> title(),
            ':idUser' => 1,
            ':content' => $this ->content(),
            ':createdDate' => $this ->createdDate(),
            ':idCategory' => $this -> idCategory(),
            ':id'           => $this -> id()
        ));
        if($results)
        {
            $msg = "La modification a été pris en compte !!!!";
            require('./views/forms/updateArticle.php');
        }
        else
        {
            $msg = "Erreur lros de la modification, veuillez reesayer.Si le probleme persiste allez boire un café";
            require('./views/forms/updateArticle.php');
        }
    }
    //getter
    public function id()
    {
        return $this -> _id;
    }
    public function title()
    {
        return $this -> _title;
    }
    public function content()
    {
        return $this -> _content;
    }
    public function idUser()
    {
        return $this -> _idUser;
    }
    public function createdDate()
    {
        return $this -> _createdDate;
    }
    public function idCategory()
    {
        return $this -> _idCategory;
    }
    //setter
    public function setId($id)
    {
        if(is_numeric($id))
        {
            $this -> _id = $id;
        }
    }
    public function setTitle($title)
    {
        if(is_string($title))
        {
            $this -> _title = $title;
        }
    }
    public function setContent($content)
    {
        $this -> _content = $content;
    }
    public function setIdUser($idUser)
    {
        $this -> _idUser = $idUser;
    }
    public function setCreatedDate($createdDate)
    {
        $this -> _createdDate = $createdDate;
    }
    public function setIdCategory($idCategory)
    {
        $this -> _idCategory = $idCategory;
    }
}