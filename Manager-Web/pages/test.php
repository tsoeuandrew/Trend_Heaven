<?php include "db.php";?>

<!DOCTYPE html>
<html lang="en-ZA">
<body>
    <Form method="post" action="<?php echo $_server['php_self'];?>">
        <label for="name">Product Name</label>
        <input type="text" id="name" name="name >
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
