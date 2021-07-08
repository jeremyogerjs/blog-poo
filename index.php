<?php
require('./models/PostManager.php');
$test = new PostManager(['dbName' => 'blog','serverName' => 'localhost', 'userName' => 'root','password' => '']);


if(isset($_GET['target']))
{

}
else
{
    $result = $test -> getList();
    require('./views/home.php');
}
