<?php 
 include '../DataBase.php'; 
 session_start();



 $id = $_GET["id"] ;

 $data = new Users() ; 

 $data->deleteUser('users',"id = $id") ;




?>
