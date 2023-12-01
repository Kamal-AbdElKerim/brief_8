<?php
include 'layout/coon.php';

$categorie_result = $conn->query("SELECT * FROM `categorie` WHERE deleted_at IS NULL");
$categorieData = $categorie_result->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($categorieData); ?>




