<?php
require_once __DIR__ . '/../../db.php';

// Validate the product ID.
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    http_response_code(400);
    exit('Invalid product ID.');
}

// Get the selected product.
$stmt = $conn->prepare(
    "SELECT * FROM Products WHERE ProductID = ?"
);

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    http_response_code(404);
    exit('Product not found.');
}

$stmt->close();

// Escape text before displaying it.
function escape($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

$inStock = (int) $row['Stock'] > 0;
?>

<!DOCTYPE html>
<html lang="en-ZA">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo escape($row['Name']); ?> | Trend Heaven</title>
    <link rel="stylesheet" href="../style/product.css">
</head>

<body>
    <main class="product-detail">
        <img
            src="../../<?php echo escape($row['Product_Image']); ?>"
            alt="<?php echo escape($row['Name']); ?>"
        >
        <h1><?php echo escape($row['Name']); ?></h1>
        <p>Price: R <?php echo number_format((float) $row['Price'], 2); ?> </p>
        <p>Category: <?php echo escape($row['Category']); ?></p>
        <p>Size: <?php echo escape($row['Size']); ?></p>
        <p>Colour: <?php echo escape($row['Colour']); ?></p>
        <p>Stock: <?php echo (int) $row['Stock']; ?> left</p>
        <p><?php echo nl2br(escape($row['Description'])); ?></p>
        <!-- Connect this button to your cart functionality. -->
        <button type="button" <?php echo $inStock ? '' : 'disabled'; ?>>
            <?php echo $inStock ? 'Add to Cart' : 'Out of Stock'; ?>
        </button>
    </main>
</body>
</html>