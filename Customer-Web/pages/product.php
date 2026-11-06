<?php require_once "../../db.php"; ?>

<?php
// Get product id from link - men.php sends ?id=5
$id = $_GET['id'];

// Get the product
$result = $conn->query("SELECT * FROM Products WHERE ProductID = $id");
$row = $result->fetch_assoc();

if (!$row) {
    echo "Product not found.";
    exit;
}

// Get all pictures for this product
$images = $conn->query("SELECT Image_path, is_main FROM product_images WHERE ProductID = $id ORDER BY is_main DESC");
?>
<!DOCTYPE html>
<html lang="en-ZA">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['Name']; ?> | Trend Heaven</title>
    <link rel="stylesheet" href="../style/product.css">
</head>
<body>
    <main class="product-detail">

        <?php
        if ($images && $images->num_rows > 0) {
            while ($img = $images->fetch_assoc()) { ?>
                <img src="../../<?php echo $img['Image_path']; ?>" alt="<?php echo $row['Name']; ?>" style="width:300px; height:300px; object-fit:cover;">
            <?php }
        } else {
            echo "<p>No image available.</p>";
        }
        ?>

        <h1><?php echo $row['Name']; ?></h1>
        <p>Price: R <?php echo number_format($row['Price'], 2); ?></p>
        <p>Category: <?php echo $row['Category']; ?></p>
        <p>Size: <?php echo $row['Size']; ?></p>
        <p>Colour: <?php echo $row['Colour']; ?></p>
        <p>Stock: <?php echo $row['Stock']; ?> left</p>
        <p><?php echo $row['Description']; ?></p>

        <button type="button">
            <?php if ($row['Stock'] > 0) { echo "Add to Cart"; } else { echo "Out of Stock"; } ?>
        </button>

    </main>
</body>
</html>