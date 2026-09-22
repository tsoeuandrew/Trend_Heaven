
<?php 
    //define variables and set to empty value
    $name = $username = $surname = $mobile_number = $email = $password =  $gender = "";
    $name_error = $username_error = $surname_error = $mobile_number_error = $email_error = $password_error =  $gender_error = "";

function validate_user(){
    if ($server["request_method"] = "post") {
        if empty($_post["name"]) {
         $name_error = "Name Required";
        }
        else{validate_user($_post["name")}

        if empty($_post["surname"]) {
         $surname_error = "Surname Required";
        }
        else{validate_user($_post["surname")}

        if empty($_post["gender"]) {
         $gender_error = "Gender Required";
        }
        else{validate_user($_post["gender")}

        if empty($_post["email"]) {
         $email_error = "Email Required";
        }
        else{validate_user($_post["email")}

        if empty($_post["password"]) {
         $password_error = "password Required";
        }
        else{validate_user($_post["password")}

        if empty($_post["mobile_number"]) {
         $email = "Mobile Number Required";
        }
        else{validate_user($_post["mobile_number")}
    }

}


function validate_login(){
    if ($server["request_method"] = "post") {
        if empty($_post["username"]) {
         $username = "Userame Required";
        }
        else{validate_user($_post["username")}
    }
}

    $surname = $_post["surname"];
    $gender = $_post["gender"];
    $mobile_number = $_post["mobile_number"];
    $email = $_post["email"];

}
?>