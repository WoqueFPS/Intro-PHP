<?php
require 'db.php';

try {
    $sql = "SELECT * FROM producten";
    $stmt = $pdo->query($sql);

    $producten = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Fout bij het ophalen van gegevens: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Producten Overzicht</title>
</head>
<body>
    <h1>Producten Overzicht</h1>
    <table>
        <thead>
            <tr>
                <th>Product Code</th>
                <th>Product Naam</th>
                <th>Prijs per Stuk</th>
                <th>Omschrijving</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php 
            foreach ($producten as $product) { 
            echo "<tr>";
            echo "<td>" . $product['product_code'] . "</td>";
            echo "<td>" . $product['product_naam'] . "</td>";
            echo "<td>" . $product['prijs_per_stuk'] . "</td>";
            echo "<td>" . $product['omschrijving'] . "</td>";
            echo "<td> <a href='update.php?product_code=".$product['product_code']."'>Edit</a> </td>";
            echo "</tr>";
            } 
        ?>
    </table>
</body>
</html>