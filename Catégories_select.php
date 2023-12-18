<?php
session_start();
include 'DataBase.php';
$Database = new Database();



$categorieData =  $Database->selectData('categorie','*','deleted_at IS NULL','');


echo json_encode($categorieData); ?>




