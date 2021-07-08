<?php
class Manager
{
    private array $_config;
    private $_serverName;
    private $_dbName;
    private $_userName;
    private $_password;

    //pagination
    private $_perPage = 5;
    private $_pages;
    private $_currentPage;
    private $_offset;
    private $_reponse;
    private $_req;
    public function __construct($config)
    {
        $this -> hydrate($config);
    }

    public function hydrate($config)
    {
        foreach($config as $key => $value)
        {
            $method = 'set'. ucfirst($key);
            if(method_exists($this,$method))
            {
                $this -> $method($value);
            }
        }
    }
    protected function dbConnect ()
    {
        try{

            $conn = new PDO("mysql:host=".$this -> _serverName .";dbname=".$this -> _dbName,$this -> _userName, $this -> _password);
    
            $conn -> setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ATTR_ERRMODE);
            $conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            echo 'connection succesfully !!!';
            return $conn;
        }
        catch(PDOException $e)
        {
            echo "connection fail : " . $e ->getMessage();
        }
    }

    //setter
    public function setServerName($serverName)
    {
        $this -> _serverName =  $serverName;
    }
    public function setUserName($userName)
    {
        $this ->_userName = $userName;
    }
    public function setPassword($password)
    {
        $this -> _password = $password;
    }
    public function setDbName($dbName)
    {
        $this -> _dbName = $dbName;
    }

    //Pagination
    public function pagination($reponse,$req)
    {
        // $this -> setCurrentPage($_GET['page'] ?? 1);
        // if($this -> currentPage() <= 0)
        // {
        //     throw new Exception('Numérto de page invalide');
        // }
        // $this -> setReponse($this -> dbConnect() -> query($reponse) -> fetch(PDO::FETCH_NUM)[0]);
        //  //"SELECT COUNT(id) FROM posts"))

        // $this -> setPages($this -> setPages($this -> reponse()));
        // if($this -> currentPage() > $this -> Pages())
        // {
        //     header("Location:index.php?action=404");
        // }
        // $this -> setOffset();
        $this ->setReq($req);

        $result = $this -> dbConnect() -> prepare($this -> req());
        $result -> execute();
        $results = $result -> fetchAll();
        return $results;
    }
    public function currentPage()
    {
        return $this -> _currentPage;
    }
    public function offset()
    {
        return $this -> _offset;
    }
    public function perPage()
    {
        return $this -> _perPage;
    }
    public function Pages()
    {
        return $this -> _pages;
    }
    public function reponse()
    {
        return $this -> _reponse;
    }
    public function req()
    {
        return $this -> _req;
    }
    //setter
    public function setReponse($reponse)
    {
        $this ->_reponse = $reponse;
    }
    public function setCurrentPage($currentPage)
    {
        $this -> _currentPage = $currentPage;
    }
    public function setOffset()
    {
        $this -> _offset = $this -> perPage() * ($this -> currentPage() - 1);
    }
    public function setPages($reponse)
    {
        $this -> _pages = ceil($reponse / $this -> perPage());
    }
    public function setReq($req)
    {
        $this -> _req = $req;
    }
}