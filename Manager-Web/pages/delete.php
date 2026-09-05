<?php include "db.php";     // Connect to the database.

 // Check that a product ID was sent in the URL.
 if (!isset($_GET["id"])) {
    header("Location: admin.php");
    exit;
 }

 $id = $_GET["id"];         // Get the product ID.
 $sql = "DELETE FROM Products WHERE ProductID = ?"; // SQL query to delete the selected product.
 $stmt = $conn->prepare($sql);   // Prepare the query.

 // Add the product ID to the query.i means the ID is an integer.
 $stmt->bind_param("i", $id);
 $stmt->execute();   // Run the delete query.
 header("Location: admin.php");  // Return to the admin page.
 exit;
?>