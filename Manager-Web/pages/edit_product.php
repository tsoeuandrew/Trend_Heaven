<?php include "db.php";     // Connect to the database.

 $id = $_GET["id"];      // Get the product ID from the URL, for example: edit_product.php?id=3

 // Check if the Update Product button was clicked.
 if (isset($_POST["update"])) {
    // Get the edited values submitted from the form.
    $name = $_POST["name"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];

    // SQL query to update the selected product.
    $sql = "UPDATE Products
            SET Name = ?, Price = ?, Stock = ?
            WHERE ProductID = ?";

    
    $stmt = $conn->prepare($sql);       // Prepare the SQL query.

    // Add the form values to the SQL query.s = text, d = decimal number, i = whole number.
    $stmt->bind_param("sdii", $name, $price, $stock, $id);
    $stmt->execute();       // Run the update query.
    header("Location: admin.php"); // Return to the admin page after updating.
    exit;
 }

// SQL query to get the selected product information.
$sql = "SELECT * FROM Products WHERE ProductID = ?";

 // Prepare and run the query.
 $stmt = $conn->prepare($sql);
 stmt->bind_param("i", $id);
 $stmt->execute();

 // Store the selected product information in $product.
 $product = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en-ZA">
 <head>
    <meta charset="UTF-8">
    <title>Trend Heaven</title>
    <link rel="icon" type="image/x-icon" href="../icon/favicon.png">
    <link rel="stylesheet" href="../style/edit_product.css">
    <meta name="author" content="Tsoeu Thabiso Andrew">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

 <body>
    <form method="POST">
        <input
            type="text"
            name="name"
            value="<?php echo htmlspecialchars($product["Name"]); ?>"
             >

        <input
            type="number"
            name="price"
            step="0.01"
            value="<?php echo $product["Price"]; ?>"
             >

        <input
            type="number"
            name="stock"
            value="<?php echo $product["Stock"]; ?>"
             >

        <button type="submit" name="update">Update Product</button>
    </form>
 </body>
</html>