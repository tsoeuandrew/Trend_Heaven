
<?php 
    //define variables and set to empty value
    $name = $username = $surname = $description = $size = $colour = $stock  = $category = $price = $product_type = $mobile_number = $email = $password =  $gender = "";
    $name_error = $username_error = $description_error = $size_error = $colour_error = $stock_error = $category_error = $price_error =  $product_type_error = $surname_error = $mobile_number_error = $email_error = $password_error =  $gender_error = "";

function validate_user(){
    if ($server["request_method"] = "post") {
        if (empty($_post["name"])) {
         $name_error = "Name Required";
        }
        else{validate_user($_post["name"]);}

        if (empty($_post["surname"])) {
         $surname_error = "Surname Required";
        }
        else{validate_user($_post["surname"]);}

        if (empty($_post["gender"])) {
         $gender_error = "Gender Required";
        }
        else{validate_user($_post["gender"]);}

        if (empty($_post["email"])) {
         $email_error = "Email Required";
        }
        else{validate_user($_post["email"]);}

        if (empty($_post["password"])) {
         $password_error = "password Required";
        }
        else{validate_user($_post["password"]);}

        if (empty($_post["mobile_number"])) {
         $email = "Mobile Number Required";
        }
        else{validate_user($_post["mobile_number"]);}
    }

}

function validate_login(){
    if ($server["request_method"] = "post") {
        if (empty($_post["username"])) {
         $username = "Userame Required";
        }
        else{validate_user($_post["username"]);}

        if (empty($_post["password"])) {
         $password_error = "password Required";
        }
        else{validate_user($_post["password"]);}
    }
}

function validate_product(){
    if ($server["request_method"] = "post") {
        if (empty($_post["name"])) {
         $name_error = "Name Required";
        }
        else{validate_user($_post["name"]);}

        if (empty($_post["category"])) {
         $category_error = "Category Required";
        }
        else{validate_user($_post["category"]);}

        if (empty($_post["product_type"])) {
         $product_type_error = "Product Type Required";
        }
        else{validate_user($_post["product_type"]);}

        if (empty($_post["price"])) {
         $price_error = "Price Required";
        }
        else{validate_user($_post["price"]);}

        if (empty($_post["size"])) {
         $size_error = "Size Required";
        }
        else{validate_user($_post["size"]);}

        if (empty($_post["colour"])) {
         $colour = "Colour Required";
        }
        else{validate_user($_post["colour"]);}

        if (empty($_post["stock"])) {
         $stock_error = "Stock Required";
        }
        else{validate_user($_post["stock"]);}

        if (empty($_post["description"])) {
         $description_error = "Description Required";
        }
        else{validate_user($_post["description"]);}

        if (empty($_post["product_image"])) {
         $product_image_error = "Product Image Required";
        }
        else{validate_user($_post["product_image"]);}

    }
}
   
?>