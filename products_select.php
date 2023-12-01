<?php
// Include file for database connection
include 'layout/coon.php';

$sql = "SELECT * FROM `produit` WHERE deleted_at IS NULL";




if (isset($_GET["searchTerm"])) {
    $searchTerm = $_GET["searchTerm"];
    // Utilisation de la clause LIKE pour rechercher les titres contenant le terme de recherche
    $sql .= " AND Etiquette LIKE '%$searchTerm%'";
}


if (isset( $_GET["selectedValue"])) {
    $selectedValue = $_GET["selectedValue"];

    // Perform filtering based on the selected value (you need to modify this logic)
    switch ($selectedValue) {
        case '1':
            // Filter logic for value 1 (Quantité, croissant)
            $sql .= " ORDER BY QuantiteStock ASC"; // Change "quantity_column" to the appropriate column name
            break;
        case '2':
            // Filter logic for value 2 (Quantité, décroissant)
            $sql .= " ORDER BY QuantiteStock DESC"; // Change "quantity_column" to the appropriate column name
            break;
        case '3':
            // Filter logic for value 3 (Prix, croissant)
            $sql .= " ORDER BY PrixFinal ASC"; // Change "price_column" to the appropriate column name
            break;
        case '4':
            // Filter logic for value 4 (Prix, décroissant)
            $sql .= " ORDER BY PrixFinal DESC"; // Change "price_column" to the appropriate column name
            break;
        default:
            // Handle other cases or set a default sorting
            break;
    }
}



    // If "id" parameter is not set or empty, fetch all data without filtering
    $produit_result = $conn->query($sql);
    $produitData = $produit_result->fetchAll(PDO::FETCH_ASSOC);

    // Send all data back as JSON to the client
    echo json_encode($produitData);

?>
