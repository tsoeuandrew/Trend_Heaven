
<?php 
    //define variables and set to empty value
    $customer_id = $name = $surname = $mobile_number = $email = $username = $password =  $gender = $address = $date_of_birth ="";
    $customer_id_error = $name_error = $surname_error = $mobile_number_error = $email_error = $username_error = $password_error =  $gender_error = $address_error = $date_of_birth_error ="";
    $description = $size = $colour = $stock  = $category = $price = $product_type = $product_image ="";
    $description_error = $size_error = $colour_error = $stock_error = $category_error = $price_error =  $product_type_error = $product_image_error = "";
 
function validate_user(){
    global $customer_id, $name, $surname, $mobile_number, $email, $username, $password, $gender, $address, $date_of_birth;
    global $customer_id_error, $name_error, $surname_error, $mobile_number_error, $email_error, $username_error, $password_error, $gender_error, $address_error, $date_of_birth_error;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $customer_id = $_POST['customer_id'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $surname = $_POST['surname'];
        $mobile_number = $_POST['mobile_number'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $date_of_birth = $_POST['date_of_birth'];

        if (empty($name)) {
         $name_error = "Name Required";
        }
        elseif (!preg_match("/^[a-zA-Z]+$",$name)) {
         $name_error = "Name Must Contain Only Alphabets";
        }

        if (empty($surname)) {
         $surname_error = "Surname Required";
        }
        elseif (!preg_match("/^[a-zA-Z]+$",$surname)) {
         $surname_error = "Name Must Contain Only Alphabets";
        }

        if (empty($customer_id)) {
         $customer_id_error = "ID Number Required";
        }
        elseif (!preg_match("/^[0-9]{13}$",$customer_id)) {
         $customer_id_error = "ID Number Must Contain 13 Digits";
        }

        if (empty($gender)) {
         $gender_error = "Gender Required";
        }

        if (empty($email)) {
         $email_error = "Email Required";
        }

        if (empty($mobile_number)) {
         $mobile_number_error = "Mobile Number Required";
        }
        elseif (!preg_match("/^0[0-9]{9}+$",$mobile_number)) {
         $mobile_number_error = "Number Must Contain Only Numbers";
        }

        if (empty($password)) {
         $password_error = "password Required";
        }
        elseif (!preg_match("/^[0-9]{8,}$",$password)) {
         $password_error = "Invalid Password";
        }
    }

}

function validate_login(){
    global $username, $password;
    global $username_error, $password_error;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username)) {
         $username = "Userame Required";
        }

        if (empty($password)) {
         $password_error = "password Required";
        }    
    }
}

function validate_product(){
    global $name, $description, $size, $colour, $stock, $category, $price, $product_type, $product_image;
    global $name_error, $size_error, $colour_error, $stock_error, $category_error, $price_error, $product_type_error, $product_image_error;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $size = $_POST['size'];
        $colour = $_POST['colour'];
        $stock  = $_POST['stock'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $product_type = $_POST['product_type'];
        $product_image = $_FILES['product_image']['name'];

        if (empty($name)) {
         $name_error = "Name Required";
        }

        if (empty($category)) {
         $category_error = "Category Required";
        }

        if (empty($product_type)) {
         $product_type_error = "Product Type Required";
        }

        if (empty($price)) {
         $price_error = "Price Required";
        }

        if (empty($size)) {
         $size_error = "Size Required";
        }

        if (empty($colour)) {
         $colour_error = "Colour Required";
        }

        if (empty($stock)) {
         $stock_error = "Stock Required";
        }

        if (empty($product_image)) {
         $product_image_error = "Product Image Required";
        }

        /* =============================================================================
                    add product under validate - only if no errors
        ================================================================================= */
        if (empty($name_error) &&  empty($category_error) && empty($product_type_error) && 
            empty($price_error) && empty($size_error) && empty($colour_error) &&
            empty($stock_error) && empty($product_image_error)) {
            insert_into_products();
        }
    }
}

function insert_into_products(){
    global $conn;
    global $name, $description, $size, $colour, $stock, $category, $price, $product_type, $product_image;
    global $name_error, $size_error, $colour_error, $stock_error, $category_error, $price_error, $product_type_error, $product_image_error;

    //Folder to save image on the PC
    $folder_fs = __DIR__ . "/../../images/" . strtolower($category) . "/" . strtolower($product_type) . "/";
    //Folder that the database will look fo for .  my sql cannot look for ../ or _DIR_ it will cause a bug or wrong location
    $folder_db = "images/" . strtolower($category) . "/" . strtolower($product_type) . "/";
    //Create folder if it does not exist
    if (!is_dir($folder_fs)) {
        mkdir($folder_fs, 0777, true);
    }

    $file_name = time() . "_" . $_FILES['product_image']['name'];
    
    // Save physical file to ROOT/images/
    move_uploaded_file($_FILES['product_image']['tmp_name'], $folder_fs . $file_name);

    // Save short path in DB
    $product_image = $folder_db . $file_name;

    $sql = "insert into Products 
                (Name, Category, Product_Type, Price, Size, Colour, 
                 Stock, Description, Product_Image)
            values 
                ('$name', '$category', '$product_type', '$price', '$size', 
                '$colour', '$stock', '$description', '$product_image')"; 
    $conn->query($sql);  

    header("Location: admin.php");
    exit;
}
   
function insert_into_users(){
    global $customer_id, $name, $surname, $mobile_number, $email, $username, $password, $gender, $address, $date_of_birth;
    global $customer_id_error, $name_error, $surname_error, $mobile_number_error, $email_error, $username_error, $password_error, $gender_error, $address_error, $date_of_birth_error;

    $sql = "insert into Customers
                (CustomerID, Name, , Surname, Gender, Date_of_Birth, Address, 
                 Username, Email, Mobile_Number, Password)
            values 
                ('$customer_id','$name', '$surname', '$gender', '$date_of_birth', '$address', 
                '$username', '$email', '$mobile_number', '$password')";   
}

?>