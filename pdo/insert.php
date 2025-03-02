<?php

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_naam = $_POST['product_naam'];
    $prijs_per_stuk = $_POST['prijs_per_stuk'];
    $omschrijving = $_POST['omschrijving'];

    $query= "INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving) VALUES (:product_naam, :prijs_per_stuk, :omschrijving)";
    $result=$pdo->prepare($query);
    $winkel = [
        "product_naam" => $product_naam,
        "prijs_per_stuk" => $prijs_per_stuk,
        "omschrijving" => $omschrijving
    ];
    $result->execute($winkel);
    if ($result) {
        echo "Product is toegevoegd!";
    } else {
        echo "Er is iets fout gegaan";
        die();
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkel</title>
</head>
<body>
    <form method="post">
        <input type="text" name="product_naam" placeholder="product_naam" required>
        <input type="float" name="prijs_per_stuk" placeholder="prijs_per_stuk" required>
        <input type="text" name="omschrijving" placeholder="omschrijving" required>
        <button type="submit" name="knop">Voeg toe</button>
    </form>
</body>
</html>
