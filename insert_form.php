<?php session_start(); 
    $_SESSION['error_msg'] = "";
    if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $quantity = $_POST['quantity']; 
                $img_name = $_FILES['img']['name'];
                $img_tmp = $_FILES['img']['tmp_name'];
                $img_size = $_FILES['img']['size'];

                $path = "proj_img/$img_name";
                move_uploaded_file($img_tmp, "$path"); 
                // Database connection
                require('conn.php');

                if($con) {
                   // echo "We Successfully create Database Connection";
                    $_SESSION['error_msg'] = "We Successfully create Database Connection";
                    header("location: error_page.php");
                    //3 - do some query on database
                    $sql = "INSERT INTO skinproduct (Name, Price, Quantity, img) VALUES 
                            ('$name', '$price', $quantity, '$path')";
                    $x = mysqli_query($con, $sql); 

                    if($x) {
                        //echo "insert Done"; 
                        $_SESSION['error_msg'] = "Product Inserted Successfully";
                        header("location: error_page.php");
                    }
                   // else echo "Insert Failed"; 
                     else {
                        $_SESSION['error_msg'] = "Insert Failed";
                        header("location: error_page.php");
                    }
                            
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Oswald:wght@200..700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Playwrite+AU+QLD:wght@100..400&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Oswald:wght@200..700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Playwrite+AU+QLD:wght@100..400&family=Story+Script&display=swap');

        body {
            font-family: "Josefin Sans", sans-serif;
            background-color: #f4f1ee;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 1000px;
        }
        .insert-container {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 400px;
            border: 1px solid #7e6e59;
            margin-top: -200px;
        }
        h2 {
            color: #7e6e59;
            text-align: center;
            margin-bottom: 25px;
        }
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #5d5141;
            font-weight: bold;
        }
        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box; 
            transition: 0.3s;
        }

        input:focus {
            border-color: #7e6e59;
            outline: none;
            box-shadow: 0 0 5px rgba(126, 110, 89, 0.3);
        }

        input[type="file"] {
            background-color: #f9f9f9;
            padding: 10px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #7e6e59;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #5d5141;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
        <?php 
            include("menu.php"); 
            
        
        ?>

    <div class="insert-container">
        <h2>Add New Product</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" placeholder="Enter product name" required>
            </div>
            <div class="form-group">
                <label>Product Price ($)</label>
                <input type="number" name="price" placeholder="$0" required>
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="quantity" placeholder="1" required>
            </div>
            <div class="form-group">
                <label>Product Image</label>
                <input type="file" name="img" accept="image/*" required>
            </div>
            <input type="submit" name="submit" value="Upload Product">
        </form>
    </div>

</body>
</html>