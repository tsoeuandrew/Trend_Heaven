function showSubcategories() {
    const category = document.getElementById("category").value; // Get the selected category.
    const product_type = document.getElementById("product_type"); // Get the Product Type dropdown.
    
    // Products available under each category.
    const products = {                  
        Men: ["Jeans", "T-Shirts", "Shirts", "pajama", "Socks", "Shoes", "Jackets"],
        Women: ["Dresses", "pajama", "Jeans", "Tops", "Skirts", "Shoes", "Handbags"],
        Kids: ["T-Shirts", "Jeans","pajama", "Socks", "Shoes", "Jackets", "School-Wear"],
        House: ["Bedding", "Cushions", "Curtains", "Decor", "Kitchenware"]
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

document.addEventListener("DOMContentLoaded", function() {
    const msg = document.getElementById("success-message");
    if (msg) {
        const name = msg.getAttribute("data-product-name");
        alert(name + " added successfully!");
    }
});