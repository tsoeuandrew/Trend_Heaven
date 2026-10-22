<?php include "db.php";   // Connect to the database using db.php.

 // Get product information sent from the form.
 $name = $_post["name"];
 $category = $_post["category"];
 $price = $_post["price"];
 $size = $_post["size"];
 $colour = $_post["colour"];
 $stock = $_post["stock"];
 $description = $_post["description"];
 $image = "";        // Create an empty image variable in case no image is uploaded.

 // Check whether the user selected an image file.
 if (isset($_FILES["image"]) && $_FILES["image"]["name"] != "") {

    // Make the filename unique by adding the current time.
    $image = time() . "_" . $_FILES["image"]["name"];

    // Move the uploaded image from its temporary folder to pages/uploads.
    move_uploaded_file(
        $_FILES["image"]["tmp_name"],
        "uploads/" . $image
    );
 }

 // SQL query to insert the new product into the Products table.
 $sql = "INSERT INTO Products
        (Name, Category, Price, Size, Colour, Stock, Description, Image)
        VALUES
        ('$name', '$category', '$price', '$size', '$colour', '$stock', '$description', '$image')";

 // Run the SQL query using the database connection.
 $conn->query($sql);
 header("Location: admin.php"); // Return the user to the admin page after adding the product.
 exit;       // Stop the code after the redirect.
?>