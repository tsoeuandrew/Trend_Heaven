
<?php 
    //define variables and set to empty value
    $customer_id = $name = $surname = $mobile_number = $email = $username = $password =  $gender = $address = $date_of_birth ="";
    $customer_id_error = $name_error = $surname_error = $mobile_number_error = $email_error = $username_error = $password_error =  $gender_error = $address_error = $date_of_birth_error ="";
    $description = $size = $colour = $sku = $stock  = $category = $price = $product_type = $product_image ="";
    $description_error = $size_error = $colour_error = $sku_error = $stock_error = $category_error = $price_error =  $product_type_error = $product_image_error = "";
 
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
         $username_error = "Userame Required";
        }

        if (empty($password)) {
         $password_error = "password Required";
        }    
    }
}

function validate_product(){
    global $name, $description, $size, $colour,  $sku, $stock, $category, $price, $product_type, $product_image;
    global $name_error, $size_error, $colour_error,  $sku_error, $stock_error, $category_error, $price_error, $product_type_error, $product_image_error;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_POST['add_product'])) return;
        $name = $_POST['name']?? '';
        $description = $_POST['description']?? '';
        $size = $_POST['size']?? '';
        $colour = $_POST['colour']?? '';
        $sku = $_POST['sku'] ?? '';
        $stock  = $_POST['stock']?? '';
        $category = $_POST['category']?? '';
        $price = $_POST['price']?? '';
        $product_type = $_POST['product_type']?? '';
        $product_image = $_FILES['product_image'] ?? null;

        // Auto-generate SKU if empty
        if (empty($sku) && !empty($name) && !empty($colour) && !empty($size)) {
            $clean_name = strtoupper(str_replace(' ', '-', trim($name)));
            $clean_colour = strtoupper(trim($colour));
            $sku = $clean_name . '-' . $clean_colour . '-' . $size;
        }

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
        if ($stock === '' || $stock === null) {
            $stock_error = "Stock Required";
        }

        /* =============================================================================
        -             MULTIPLE IMAGE VALIDATRIONS
        ================================================================================= */
        $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];
        $max_size = 5 * 1024 * 1024;        //max = 5MB
        $has_file = false;   // BY defoult no image is selected  

        if (isset($product_image['name']) && is_array($product_image['name'])) { //check: does $_FILES['product_image']['name'] exist and is it an array?
            foreach ($product_image['name'] as $key => $filename) {             // Loop through every file name the user picked
                if ($product_image['error'][$key] !== 4 && $filename !== '') {   //if file was picked
                    $has_file = true;       //file was picked
                    break;
                }
            }
        }

        if (!$has_file) {        //if no image was picked
            $product_image_error = "Product Image Required";
        } else {
            // Now check EACH file user picked
            foreach ($product_image['name'] as $key => $filename) {

                //1. Skip empty slots (user clicked but cancelled)
                if ($product_image['error'][$key] == 4) continue;  

                // 2. Upload error?
                if ($product_image['error'][$key] !== 0) {
                  $product_image_error = "Error uploading $filename";
                   break;
                }

                // 3. Wrong file type?
                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                if (!in_array($ext, $allowed_ext)) {
                    $product_image_error = "Only JPG, PNG, WEBP allowed. $filename is .$ext";
                    break;
                }

                // 4. Too big?
                if ($product_image['size'][$key] > $max_size) {
                    $product_image_error = "$filename is too big. Max 5MB";
                    break;
                }
            }
        }
        /* =============================================================================
         -           add product under validate - only if no errors
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
    global $name, $description, $size, $colour, $stock, $sku, $category, $price, $product_type, $product_image;

    //Folder to save image on the PC
    $folder_fs = __DIR__ . "/../../images/" . strtolower($category) . "/" . strtolower($product_type) . "/";
    //Folder that the database will look fo for .  my sql cannot look for ../ or _DIR_ it will cause a bug or wrong location
    $folder_db = "images/" . strtolower($category) . "/" . strtolower($product_type) . "/";
    //Create folder if it does not exist
    if (!is_dir($folder_fs)) {
        mkdir($folder_fs, 0777, true);
    }

    // 1. Insert PRODUCT 
    $stmt = $conn->prepare("INSERT INTO Products (Name, Category, Product_Type, Price, Description)
                   VALUES (?, ?, ?, ?, ?)"); 
    $stmt->bind_param("sssds", $name, $category, $product_type, $price, $description);
    $stmt->execute();
    $product_id = $conn->insert_id;
    $stmt->close();

    // 2. Insert VARIANT - Colour, Size, Stock and SKU
    $stmt_v = $conn->prepare("INSERT INTO Product_Variants (ProductID, Colour, Size, Stock, SKU, Price)
                   VALUES (?, ?, ?, ?, ?, NULL)");
    $stmt_v->bind_param("issis", $product_id, $colour, $size, $stock, $sku);
    $stmt_v->execute();
    $stmt_v->close();

    foreach ($product_image['name'] as $key => $filename) {
        if ($product_image['error'][$key] == 4) continue;    // Skip empty slots (user clicked browse but cancelled)
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));   // Get extension in small letters, e.g. "JPG" -> "jpg"

        // Make unique file name so 2 products don't overwrite each other
        // Example: 1731234567_0_dress_white.jpg
        // time() = seconds, $key = 0 for first image, 1 for second
        $new_file_name = time() . "_" . $key . "_" . basename($filename);
        $full_path_fs = $folder_fs . $new_file_name;   // Full path on PC + short path for DB
        $full_path_db = $folder_db . $new_file_name;  //hort path for DB

                
        if (move_uploaded_file($product_image['tmp_name'][$key], $full_path_fs)) {  // Move file from temp folder to your images folder
                
         // 0 = clothes-only white, 1 = cropped face
         $is_main = ($key == 0) ? 1 : 0; // First image (key 0) = main image = 1, rest = 0
          /* =============================================================================
            -           Insert into product_images table, NOT Products table
         ================================================================================= */
         $stmt2 = $conn->prepare("INSERT INTO product_images (ProductID, Image_path, is_main, sort_order) 
                        VALUES (?, ?, ?, ?)");
         $stmt2->bind_param("isii", $product_id, $full_path_db, $is_main, $key);
         $stmt2->execute();
         $stmt2->close();
        }
    }
    header("Location: admin.php");
    exit;
}
   
function insert_into_users(){
    global $customer_id, $name, $surname, $mobile_number, $email, $username, $password, $gender, $address, $date_of_birth;
    global $customer_id_error, $name_error, $surname_error, $mobile_number_error, $email_error, $username_error, $password_error, $gender_error, $address_error, $date_of_birth_error;

    $sql = "insert into Customers
                (CustomerID, Name, Surname, Gender, Date_of_Birth, Address, 
                 Username, Email, Mobile_Number, Password)
            values 
                ('$customer_id','$name', '$surname', '$gender', '$date_of_birth', '$address', 
                '$username', '$email', '$mobile_number', '$password')";   
}

?>