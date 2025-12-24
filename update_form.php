<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produts</title>
    <style>
        body { 
            font-family: "Josefin Sans", sans-serif; 
            background-color: #f4f1ee; margin: 0; 
            display: flex; justify-content: center; 
            align-items: center;
            min-height: 100vh; 
        }
        .edit-container { 
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 450px; border: 1px solid #7e6e59;
            margin-top: 100px;
        }
        h2 { 
            color: #7e6e59;
            text-align: center;
        }
        .form-group { 
            margin-bottom: 15px; 
        }
        label { 
            display: block;
            margin-bottom: 5px; 
            color: #5d5141;
            font-weight: bold; 
        }
        input[type="text"], input[type="number"] { 
            width: 100%; 
            padding: 10px; 
            border: 1px solid #ddd; 
            border-radius: 5px; 
            box-sizing: border-box; 
        }
        .current-img { 
            width: 100px; 
            display: block; 
            margin: 10px 0; 
            border-radius: 5px; 
            border: 1px dashed #7e6e59; 
        }
        .btn-save { 
            width: 100%; 
            background-color: #7e6e59; 
            color: white; 
            padding: 12px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            font-weight: bold; 
            font-size: 16px; 
        }
        .btn-save:hover { 
            background-color: #5d5141; 
        }
    </style>
</head>
<body>
    <?php include("menu.php"); 
          require('conn.php'); //connect to database

        if (!isset($_POST['id']) && !isset($_POST['productID'])) {
            header("Location: select_for_update.php");
            exit();
        }
        $id = isset($_POST['id']) ? $_POST['id'] : $_POST['productID'];
        if (isset($_POST['update'])) {

            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            if (!empty($_FILES['img']['name'])) {
                $img_name = $_FILES['img']['name'];
                $img_tmp = $_FILES['img']['tmp_name'];
                $path = "proj_img/$img_name";
                move_uploaded_file($img_tmp, $path);
                    $sql = "UPDATE skinproduct SET Name = '$name', Price = '$price', Quantity = '$quantity', img = '$path' WHERE productID = '$id'";
                } 
                else {
                    $sql = "UPDATE skinproduct SET Name = '$name', Price = '$price', Quantity = '$quantity' WHERE productID = '$id'";
                }
                $result = mysqli_query($con, $sql);
        }


            if($con) {
                $sql = "SELECT * FROM skinproduct WHERE productID = '$id'";
                $result = mysqli_query($con, $sql); //one row (selected row)
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
         }
    ?>
    <div class="edit-container">
        <h2>Update Product Details</h2>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
            
            <input type="hidden" name="productID" value="<?php echo $row['productID']; ?>">
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" value="<?php echo $row['Name']; ?>" required>
            </div>
            <div class="form-group">
                <label>Price ($)</label>
                <input type="number" name="price" value="<?php echo $row['Price']; ?>" required>
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="quantity" value="<?php echo $row['Quantity']; ?>" required>
            </div>
            <div class="form-group">
                <label>Current Image</label>
                <img src="<?php echo $row['img']; ?>" class="current-img">
                <label>Change Image (Optional)</label>
                <input type="file" name="img">
            </div>

            <button type="submit" name="update" class="btn-save">Save Changes</button>
        </form>
    </div>
</body>
</html>