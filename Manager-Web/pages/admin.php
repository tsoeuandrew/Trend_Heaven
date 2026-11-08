<?php require_once "../../db.php";
  require_once "functions.php";
  validate_product();
?>

<!DOCTYPE html>
<html lang="en-ZA">
 <head>
    <meta charset="UTF-8">
    <title>Trend Heaven-Admin</title>
    <script src="../javascript/admin.js?v=5"></script>
    <link rel="icon" type="image/x-icon" href="../../images/icon/favicon.png">
    <link rel="stylesheet" href="../style/admin.css">
    <meta name="author" content="Tsoeu Thabiso Andrew">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <main>
      <section class="add-product-section" id="add-product">
        <h2>Add New Product</h2>
        <form method="POST" enctype="multipart/form-data">
         <label for="name">Product Name</label>
         <input type="text" id="name" name="name">
         <span class="error">*<?php echo $name_error ?? ''; ?></span>

         <label for="category">Category</label>
         <select id="category" name="category" onchange="showSubcategories()">
           <option value="" selected disabled>Select Category</option>
           <option value="Men">Men</option>
           <option value="Women">Women</option>
           <option value="Kids">Kids</option>
           <option value="House">House</option>
         </select>
         <span class="error">*<?php echo $category_error ?? ''; ?></span>

         <label for="product_type">Product Type</label>
         <select id="product_type" name="product_type">
           <option value="" selected disabled>Select a category first</option>
         </select>
         <span class="error">*<?php echo $product_type_error ?? ''; ?></span>

         <label for="price">Price</label>
         <input type="number" id="price" name="price" step="2" min="5">
         <span class="error">*<?php echo $price_error ?? ''; ?></span>

         <!-- Product status -->
         <label for="status">Product Status</label>
         <select name="status" id="status" required>
           <option value="Draft">Draft</option>
           <option value="Published">Published</option>
           <option value="Archived">Archived</option>
         </select>

         <label for="description">Description</label>
         <textarea id="description" name="description" rows="5"></textarea>

         <h3>Product Variations</h3>
           <p>Add the available colours, sizes and stock quantities.</p>
         <div id="variant-container">
          <div class="variant-row">
           <label>Colour</label>
           <select name="variants[0][colour]" required>
            <option value="">Select Colour</option>
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
            <option value="Default">Default</option>
           </select>

           <label for="size">Size</label>
           <select name="variants[0][size]" required>
           <select id="size" name="size">
            <option value="" selected disabled>Select Size</option>
            <option value="XS">Extra Small</option>
            <option value="S">Small</option>
            <option value="M">Medium</option>
            <option value="L">Large</option>
            <option value="XL">Extra Large</option>
           </select>

           <label>Stock</label>
           <input type="number" name="variants[0][stock]" min="0" placeholder="Quantity" required>  
          <div>
         </div>
         <button type="button" id="add-variant"> + Add Another Variation </button>

         <label for="product_image">Product Image</label>
         <input type="file" id="product_image" name="product_image[]" multiple accept="image/*">

         <button type="submit" name="submit">Add Product</button>
        </form>
      </section>

      </section>
      <!-- ================= PRODUCT LIST ================= -->
      <section class="product-list-section" id="product-list">
       <h2>Manage Products</h2>
        <div class="table-container">
          <table>
            <thead>
            <tr>
              <th>Product ID</th>
              <th>Image</th>
              <th>Name</th>
              <th>Category</th>
              <th>Product Type</th>
              <th>Price</th>
              <th>Variants</th>
              <th>Total Stock</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              <?php if ($result && $result->num_rows > 0): ?>
              <?php while ($row = $result->fetch_assoc()): ?>

              <tr>
                <td><?php echo $row['ProductID']; ?></td>   <!-- Product ID -->
                 
                <td>   <!-- Product image -->
                  <?php if (!empty($row['Main_Image'])): ?>
                  <img
                    src="../../<?php echo $row['Main_Image']; ?>"
                    alt="Product Image" class="product-image">
                    <?php else: ?>
                  <span>No Image</span>
                    <?php endif; ?>
                </td>
                 
                <td><?php echo $row['Name']; ?></td>  <!-- Product name -->
                <td><?php echo $row['Category']; ?></td>    <!-- Category -->
                <td><?php echo $row['Product_Type']; ?></td>   <!-- Product type -->
                <td>R<?php echo number_format($row['Price'], 2); ?></td>  <!-- Price -->
                <td><?php echo $row['Variant_Count']; ?></td>    <!-- Number of variants -->
                <td><?php echo $row['Total_Stock']; ?></td>      <!-- Total stock -->
                <td><?php echo $row['Status']; ?></td>   <!-- Product status -->
              
                <td>
                  <a href="edit_product.php?id=<?php echo $row['ProductID']; ?>">Edit</a>

                  <a href="delete_product.php?id=<?php echo $row['ProductID']; ?>"
                    onclick="return confirm('Are you sure you want to delete this product?');">
                    Delete
                  </a>

                </td>    <!-- Actions -->
              </tr>

              <?php endwhile; ?>
                <?php else: ?>

              <tr>
                <td colspan="10">
                  No products found.
                </td>
              </tr>
              <?php endif; ?>

            </tbody>
          </table>
        </div>
      </section>
    </main>
    <footer>
      <p>&copy; <?php echo date("Y"); ?> Trend Heaven. All rights reserved.</p>
    </footer>
  </body>
</html>