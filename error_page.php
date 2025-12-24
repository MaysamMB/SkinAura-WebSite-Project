<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if($_SESSION['error_msg'] != "") {
            echo "<h3>" . $_SESSION['error_msg'] . "</h3>";
            unset($_SESSION['error_msg']);
        } else {
            echo "<h3>No error message available.</h3>";
        }
    
    ?>
</body>
</html>