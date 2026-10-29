<?php require_once "../../db.php"; ?>
<!DOCTYPE html>
<html lang="en-ZA">
 <head>
   <meta charset="UTF-8">                                                          <!--text forwhole document-->
   <title>Trend Heaven | Men </title>                                                    <!--web name-->
   <script src="../javascript/men.js"defer></script>                              <!-- style of page and locotion of sheet-->
   <link rel="icon" type="image/x-icon" href="../../images/icon/favicon.png">                           <!--favicon-->
   <link rel="stylesheet" href="../style/men.css">  
   <meta name="author" content="Tsoeu Thabiso Andrew">                             <!--author of page-->
   <meta name="viewport" content="width=device-width, initial-scale=1.0">          <!--make devise look good on all devises-->
 </head>
 <body>
   <header>
     <div class="top-header">
       <div class="logo">
         <img src="../../images/icon/favicon.png" alt="Trend Heaven Logo">
       </div>
       <div class="search-box">
         <input type="search" placeholder="Search products...">
         <button>🔍</button>
       </div>
       <div class="wishlist">
         <a href="#">❤️ Wishlist</a>
       </div>
       <div class="theme-toggle">
         <button type="button" title="Theme" id="theme">
          🌙
         </button>
       </div>
     </div>

    <!-- Navigation panel -->
    <nav>
     <a href="home.html">Home</a>
     <a href="men/home.html">Men</a>
     <a href="women/home.html">Women</a>
     <a href="kids/home.html">Kids</a>
     <a href="accessories.html">Accessories</a>
     <a href="sale.html">Sale</a>
     <a href="contact.html">Contact</a>
     <a href="about.html">About Us</a>
    </nav>
    </header>

    <h2>Men's Products</h2>
   <div class="grid">
  <?php
  $result = $conn->query("SELECT ProductID, Name, Price, Product_Image FROM Products WHERE Category='Men'");

  if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
  ?>
  <div class="card">
    <a href="product.php?id=<?php echo $row['ProductID']; ?>">
      <!-- add ../ to get to image folder -->
      <img src="../../Admin/uploads/<?php echo $row['Product_Image']; ?>" alt="<?php echo $row['Name']; ?>" style="width:100%; height:200px; object-fit:cover;">
    </a>
    <h3><?php echo $row['Name']; ?></h3>
    <p>R <?php echo $row['Price']; ?></p>
  </div>
  <?php } } else { echo "<p>No products</p>"; } ?>
</div>
 </body>
</html>