<?php session_start(); 
    $_SESSION['error_msg'] = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    <link rel="stylesheet" href="lgin_style.css">
</head>
<body>
    
 <?php 
        if(isset($_POST['submit'])) {

            //if the button submit is clicked ==> receive form data
            $name = $_POST['username'];
            $password = $_POST['password'];

            //create database connection
            //$con = mysqli_connect("localhost:3306", "root", "", "proudcts");
            require('conn.php');

            //execute sql query (select)
            $sql = "SELECT * FROM users WHERE Name = '$name'";

            $result = mysqli_query($con, $sql);

            if($result && mysqli_num_rows($result) > 0 ) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                if($row["Password"] == $password) {  
                    // $_SESSION["name"] = $name;
                    //open index.html
                    header("location: index.html");
                    exit();
                }
                else {
                    $_SESSION['error_msg'] = "Your Password is incorrect go back to correct it.";
                    header("location: error_page.php");
                }
            }
            else {
                $_SESSION['error_msg'] = "Your User Name is incorrect";
                header("location: error_page.php");
            }
        }

    ?>
    <div class="main-container">
        <div class="info">
            <h1 class="title">SkinAura</h1>
            
            <p class="parag">
                <b>Nature's Secret to Radiance:</b><br>
                At SkinAura, we believe that true beauty is cultivated from the earth. Our mission is to bridge the gap between ancient botanical wisdom and modern skincare.
            </p>

            <p class="parag">
                <b>Pure. Holistic. Effective:</b><br>
                Every product is meticulously crafted with cold-pressed oils and rare herbal extracts to heal your skin from within.
            </p>
        </div>

        <div class="login-section">
            <h2>Login</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" value="Sign In" name="submit">
            </form>
        </div>
    </div>

   

</body>
</html>