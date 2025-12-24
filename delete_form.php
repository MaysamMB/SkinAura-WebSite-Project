<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include("menu.php");
    //receive the ids of products to be deleted 
    if(!empty($_POST["id"])) {
        $ids = $_POST['id'];  //deal with them as array

        require("conn.php"); 
        foreach($ids as $i) {
            $sql = "DELETE FROM skinproduct WHERE productID = '$i'"; 
            mysqli_query($con, $sql); 
        }
        $_SESSION['error_msg'] = count($ids) . " products deleted successfully.";
        header("Location: error_page.php");
        exit();

    } 
    else {
        $_SESSION['error_msg'] = "No products were selected for deletion.";
        header("Location: select_for_delete.php");  
        exit();
    }

?>
</body>
</html>