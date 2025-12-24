<?php  
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="selUpdate_style.css">
</head>
<body>
  <form action="update_form.php" method="post">
    <?php
        // if(isset($_POST['submit'])) {
        //        header("Location: update_form.php");
        //        exit();
        // }
        require('conn.php'); //connect to database
        if($con) {
            $sql = "SELECT * FROM skinProduct"; 
            $result = mysqli_query($con, $sql); //return all books rows 
            $id = "";
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
            {
                $path = $row['img'];
                $name = $row['Name'];
                $price = $row['Price'];
                $quantity = $row['Quantity']; 
                $id = $row['productID'];
            ?>

            <div class="contenar">

                <div class="sec4-parent">
                <div class="card-image">
                    <img class="img" src="<?php echo $path;?>" alt="<?php echo $name;?>"> <div class="info-icon">i</div>
                </div>
                <div class="card-content">
                    <div class="text-section">
                        <h3 class="product-name"><?php echo $name; ?></h3>
                        <p class="product-price">$<?php echo $price; ?></p>
                    </div>
                    <div class="cart-section">
                        <input type = 'radio' name = 'id' value = "<?php echo $id; ?>" />
                        <button type="submit" name="submit">✅</button>
                    </div>
                </div>
            </div>
            </div>
        <?php
        
            }
            include("menu.php"); 
            
        }
    ?>
   </form> 
    
</body>
</html>