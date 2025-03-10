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
        <tbody>
            <?php foreach ($producten as $product): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['product_code']); ?></td>
                    <td><?php echo htmlspecialchars($product['product_naam']); ?></td>
                    <td><?php echo htmlspecialchars($product['prijs_per_stuk']); ?></td>
                    <td><?php echo htmlspecialchars($product['omschrijving']); ?></td>
                    <td>
                        <a href="">Edit</a>
                        <a href="">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>