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
    <Form method="POST" action="<?php echo $_server['php_self'];?>">
        <label for="name"> Name</label>
        <input type="text" id="name" name="name >
        <label for="surname"> Surname</label>
        <input type="text" id="surname" name="surname >
        <input type="submit">
    </form>

<?php
	If ($sever[“request_method”] == “post”) {
	    $name  =  $request["name"];
	    If (empty($name)) {
           echo "name is empty";
        } else { echo $name;}
    }
?>
</body>
</html>
