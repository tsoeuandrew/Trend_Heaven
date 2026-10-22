function showSubcategories() {
    const category = document.getElementById("category").value; // Get the selected category.
    const product_type = document.getElementById("product_type"); // Get the Product Type dropdown.
    
    // Products available under each category.
    const products = {                  
        Men: ["Jeans", "T-Shirts", "Shirts", "Socks", "Shoes", "Jackets"],
        Women: ["Dresses", "Jeans", "Tops", "Skirts", "Shoes", "Handbags"],
        Kids: ["T-Shirts", "Jeans", "Socks", "Shoes", "Jackets", "School-Wear"],
        Home: ["Bedding", "Cushions", "Curtains", "Decor", "Kitchenware"]
    };

    // Remove old Product Type options.
    product_type.innerHTML =
        '<option value="" selected disabled>Select Product Type</option>';

    // Add Product Type options for the selected category.
    products[category].forEach(function (product) {
        const option = document.createElement("option");
              option.value = product;
              option.textContent = product;
            product_type.appendChild(option);
    });
}