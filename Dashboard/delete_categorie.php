<?php 
session_start();
include '../DataBase.php';

$data = new categories() ; 



 $id = $_GET["id"] ;

 $data->deletecategorie("id = $id") ;



header("Location: ../dashboard_Categories.php");
exit; 




?>
