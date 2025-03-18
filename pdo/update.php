<?php
require 'db.php';

if (isset($_POST['knop']) && $_SERVER['REQUEST_METHOD'] == 'POST') {


    $product_code = $_GET['product_code'];
    $product_naam = $_POST['product_naam'];
    $prijs_per_stuk = $_POST['prijs_per_stuk'];
    $omschrijving = $_POST['omschrijving'];


    try {
        $sql = "UPDATE Producten SET product_naam = :product_naam, prijs_per_stuk = :prijs_per_stuk, omschrijving = :omschrijving WHERE product_code = :product_code";
        $stmt = $pdo->prepare($sql);
        $placeholder = [
            'product_naam' => $product_naam, 
            'prijs_per_stuk' => $prijs_per_stuk, 
            'omschrijving' => $omschrijving, 'product_code' => $product_code];

        if ($stmt->execute(['product_naam' => $product_naam, 'prijs_per_stuk' => $prijs_per_stuk, 'omschrijving' => $omschrijving, 'product_code' => $product_code])) {
            echo "Record succesvol bijgewerkt.";
        } else {
            echo "Fout bij bijwerken van record.";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
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
        <input type="text" name="product_code" placeholder="product_code" required>
        <input type="text" name="product_naam" placeholder="product_naam" required>
        <input type="number" step="0.01" name="prijs_per_stuk" placeholder="prijs_per_stuk" required>
        <input type="text" name="omschrijving" placeholder="omschrijving" required>
        <button type="submit" name="knop">Update</button>
    </form>
</body>
</html>