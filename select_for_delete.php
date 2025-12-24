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
    <style>
        .delete-bar {
            position: fixed;
            bottom: 0   ; 
            left: 0;
            width: 100%;
            /* background: #7e6e59; */
            padding: 10px;
            text-align: center;
            z-index: 1000;
        }
        .btn-delete-all {
            box-shadow: 0 -5px 15px rgba(0,0,0,0.2);
            background: #ff4d4d;
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            align-items: end;
        }
    </style>
</head>
<body>
  <form action="delete_form.php" method="post">
    <?php
        // if(isset($_POST['submit'])) {
        //        header("Location: update_form.php");
        //        exit();
        // }
        require('conn.php'); //connect to database
        if($con) {
            $sql = "SELECT * FROM skinProduct order by Price DESC"; 
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
                        <input type = 'checkbox' name = 'id[]' value = "<?php echo $id; ?>" />
                    </div>
                </div>
            </div>
            </div>
        <?php
        
            }
            include("menu.php"); 
            
        }
    ?>
    <div class="delete-bar">
            <button type="submit" name="submit" class="btn-delete-all">🗑️ Delete Selected Products</button>
        </div>
   </form> 
    
</body>
</html>