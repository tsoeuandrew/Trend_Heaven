<?php include "db.php";?>

<!DOCTYPE html>
<html lang="en-ZA">
 <head>
    <meta charset="UTF-8">
    <title>Trend Heaven-Admin</title>
    <script src="../javascript/admin.js"></script>
    <link rel="icon" type="image/x-icon" href="../../image/icon/favicon.png">
    <link rel="stylesheet" href="../style/admin.css">
    <meta name="author" content="Tsoeu Thabiso Andrew">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

 <body>
   <header>
    <div class="top-header">
      <div class="logo">
        <img src="../../image/icon/favicon.png" alt="Trend Heaven Logo">
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

    <Main>
        <form action="add_product.php" method="post" enctype="multipart/form-data">
          <label for="name">Product Name</label>
         <input type="text" id="name" name="name" required>

         <label for="category">Category</label>
         <select id="category" name="category" required onchange="showSubcategories()">
             <option value="" selected disabled>Select Category</option>
             <option value="Men">Men</option>
             <option value="Women">Women</option>
             <option value="Kids">Kids</option>
             <option value="Home">Home</option>
         </select>

         <label for="type">Product Type</label>
         <select id="type" name="type" required>
            <option value="" selected disabled>Select a category first</option>
         </select>

         <label for="price">Price</label>
         <input type="number" id="price" name="price" step="0.01" required>

         <label for="size">Size</label>
          <select id="size" name="size" required>
            <option value="" selected disabled>Select Size</option>
            <option value="Extra Small">Extra Small</option>
            <option value="Small">Small</option>
            <option value="Medium">Medium</option>
            <option value="Large">Large</option>
            <option value="Extra Large">Extra Large</option>
          </select>

         <label for="colour">Colour</label>
          <select id="colour" name="colour" required>
            <option value="" selected disabled>Select Colour</option>
            <option value="Black">Black</option>
            <option value="White">White</option>
            <option value="Red">Red</option>
            <option value="Blue">Blue</option>
            <option value="Green">Green</option>
            <option value="Yellow">Yellow</option>
            <option value="Pink">Pink</option>
            <option value="Purple">Purple</option>
            <option value="Brown">Brown</option>
            <option value="Grey">Grey</option>
          </select>

         <label for="stock">Stock</label>
         <input type="number"
                id="stock" 
                name="stock" required>

         <label for="description">Description</label>
         <textarea id="description" name="description" required></textarea>

         <label for="image">Product Image</label>
         <input type="file" 
                id="image" 
                name="image" required>

         <button type="submit">Add Product</button>
        </form>

        <h2>Products</h2>

        <table>
         <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Product Type</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
         </tr>

           