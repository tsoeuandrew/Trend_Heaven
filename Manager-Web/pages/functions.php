
<?php 
    //define variables and set to empty value
    $id_number = $name = $surname = $mobile_number = $email = $username = $password =  $gender = $address = $date_of_birth ="";
    $id_number_error = $name_error = $surname_error = $mobile_number_error = $email_error = $username_error = $password_error =  $gender_error = $address_error = $date_of_birth_error ="";
    $description = $size = $colour = $stock  = $category = $price = $product_type = $product_image ="";
    $description_error = $size_error = $colour_error = $stock_error = $category_error = $price_error =  $product_type_error = $product_image_error = "";

function validate_user(){
    if ($server["request_method"] = "post") {
        $id_number = $_post['id_number'];
        $name = $_post['name'];
        $username = $_post['username'];
        $surname = $_post['surname'];
        $mobile_number = $_post['mobile_number'];
        $email = $_post['email'];
        $password = $_post['password'];
        $gender = $_post['gender'];
        $address = $_post['address'];
        $date_of_birth = $_post['date_of_birth'];

        if (empty($name)) {
         $name_error = "Name Required";
        }
        elseif (!preg_match("/^[a-zA-Z]+$",$name)) {
         $name_error = "Name Must Contain Only Alphabets";
        }
        else{validate_user($name);}

        if (empty($surname)) {
         $surname_error = "Surname Required";
        }
        elseif (!preg_match("/^[a-zA-Z]+$",$surname)) {
         $surname_error = "Name Must Contain Only Alphabets";
        }
        else{validate_user($surname);}

        if (empty($id_number)) {
         $id_number_error = "ID Number Required";
        }
        elseif (!preg_match("/^[0-9]{13}$",$id_number)) {
         $id_number_error = "ID Number Must Contain 13 Digits";
        }
        else{validate_user($id_number);}

        if (empty($gender)) {
         $gender_error = "Gender Required";
        }
        else{validate_user($gender);}

        if (empty($email)) {
         $email_error = "Email Required";
        }
        else{validate_user($email);}

        if (empty($_post["mobile_number"])) {
         $mobile_number = "Mobile Number Required";
        }
        elseif (!preg_match("/^0[0-9]{9}+$",$mobile_number)) {
         $mobile_error = "Number Must Contain Only Numbers";
        }
        else{validate_user($mobile_number);}

        if (empty($password)) {
         $password_error = "password Required";
        }
        elseif (!preg_match("/^[0-9]{8,}$",$password)) {
         $password_error = "Invalid Password";
        }
        else{validate_user($password);}
    }

}

function validate_login(){
    if ($server["request_method"] = "post") {
        $username = $_post['username'];
        $password = $_post['password'];

        if (empty($username)) {
         $username = "Userame Required";
        }
        else{validate_user($username);}

        if (empty($password)) {
         $password_error = "password Required";
        }
        else{validate_user($password);}
    }
}

function validate_product(){
    if ($server["request_method"] = "post") {
        $name = $name = $_post['name'];
        $description = $_post['description'];
        $size = $_post['size'];
        $colour = $_post['colour'];
        $stock  = $_post['stock'];
        $category = $_post['category'];
        $price = $_post['price'];
        $product_type = $_post['product_type'];
        $product_image = $_post['product_image'];

        if (empty($name)) {
         $name_error = "Name Required";
        }
        else{validate_user($name);}

        if (empty($category)) {
         $category_error = "Category Required";
        }
        else{validate_user($category);}

        if (empty($product_type)) {
         $product_type_error = "Product Type Required";
        }
        else{validate_user($product_type);}

        if (empty($price)) {
         $price_error = "Price Required";
        }
        else{validate_user($price);}

        if (empty($size)) {
         $size_error = "Size Required";
        }
        else{validate_user($size);}

        if (empty($colour)) {
         $colour = "Colour Required";
        }
        else{validate_user($colour);}

        if (empty($stock)) {
         $stock_error = "Stock Required";
        }
        else{validate_user($stock);}

        if (empty($description)) {
         $description_error = "Description Required";
        }
        else{validate_user($description);}

        if (empty($product_image)) {
         $product_image_error = "Product Image Required";
        }
        else{validate_user($product_image);}

    }
}

function insert_into_product(){
    $sql = "insert into Products 
                (ProductID, Name, Type, Category, Price, Size, Colour, 
                 Stock, Description, Image)
            values 
                ('$productid','$name', '$product_type', '$category', '$price', '$size', 
                '$colour', '$stock', '$description', '$product_image')";   
}
   
function insert_into_user(){
    $sql = "insert into Products 
                (IDNumber, Name, , Surname, Gender, Date_of_Birth, Address, 
                 Username, Email, Mobile_Number, Password)
            values 
                ('$id_number','$name', '$surname', '$gender', '$date_of_birth', '$address', 
                '$username', '$email', '$mobile_number', '$password')";   
}

?>