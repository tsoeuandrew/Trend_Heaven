<?php
include '../includes/db.php'; // your db connection file

// get id from URL
$id = $_GET['id'];

// get that one product
$result = $conn->query("SELECT * FROM Products WHERE ProductID = $id");
$row = $result->fetch_assoc();
?>

<div class="product-detail">
  <img src="../../Admin/uploads/<?php echo $row['Product_Image']; ?>" style="width:300px;">
  <h1><?php echo $row['Name']; ?></h1>
  <p>Price: R <?php echo $row['Price']; ?></p>
  <p>Category: <?php echo $row['Category']; ?></p>
  <p>Size: <?php echo $row['Size']; ?></p>
  <p>Colour: <?php echo $row['Colour']; ?></p>
  <p>Stock: <?php echo $row['Stock']; ?> left</p>
  <p><?php echo $row['Description']; ?></p>
  <button>Add to Cart</button>
</div>