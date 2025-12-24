<?php  
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="select_style.css">
    <style>
        .sort-container {
            position: fixed;
            bottom: 0   ; 
            left: 50%;
            width: 100%;
            /* background: #7e6e59; */
            padding: 10px;
            text-align: center;
            z-index: 1000;
            transform: translateX(-50%);
        }
        .sort-select {
            padding: 8px 15px;
            border-radius: 5px;
            border: 1px solid #7e6e59;
            background-color: white;
            color: #7e6e59;
            font-weight: bold;
            cursor: pointer;
        }
        .cont {
            display: flex;
            gap: 20px;
        }
        .sort-btn {
            padding: 8px 20px;
            background-color: #7e6e59;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }
    </style>
</head>
<body>
    <div class="sort-container">
        <form  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <select name="order_by" class="sort-select">
                <option value="ASC" <?php if(isset($_POST['order_by'])); ?>>ASC</option>
                <option value="DESC" <?php if(isset($_POST['order_by'])); ?>>DESC</option>
            </select>
        <!-- </form>
        <form  action="<?php echo $_SERVER['PHP_SELF'];?>"> -->
            <select name="sort_by" class="sort-select">
                <option value="Name">Name</option>
                <option value="Price">Price</option>
            </select>
            <button type="submit" name="submit_sort" class="sort-btn">Sort</button>
        </form>
    </div>
    
    <?php
        $sortBy = isset($_POST['sort_by']) ? $_POST['sort_by'] : 'Name';
        $orderBy = isset($_POST['order_by']) ? $_POST['order_by'] : 'DESC';

        require('conn.php'); //connect to database

        if($con) {

            $sql = "SELECT * FROM skinProduct order by $sortBy $orderBy";
            $result = mysqli_query($con, $sql); //return all books rows

            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                $path = $row['img'];
                $name = $row['Name'];
                $price = $row['Price'];
                $quantity = $row['Quantity'];
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
                    <form action="cart_page.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <div class="cart-section">
                            <button class="add-to-cart" name="add_to_cart" type="submit">
                                <i class="fas fa-cart-plus"></i> <span>🛒</span> </button>
                            </div>
                    </form>
                </div>
            </div>
            </div>
        <?php
        }
            include("menu.php");

        }

    ?>



    
</body>
</html>