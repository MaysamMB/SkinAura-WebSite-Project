<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            gap: 20px;
            background-color: #7e6e59ff;
            opacity: 0.7;
            box-shadow: 0 8px 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: auto;
            justify-content: center;
            border-radius: 10px;
            padding: 5px;
        }
        .menu {
            position: fixed;
            z-index: 10;
            width: 100%;
            top: 6px;
            margin: auto;
        }
        li {
            margin: 10px 0;
            position: relative;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            color: white;
            /* background-color: beige; */
            padding: 10px;
            border-radius: 50%;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="menu">
        <ul>
            <li><a href="login_form.php">Login</a></li>
            <li><a href="select_form.php">Select</a></li>
            <li><a href="insert_form.php">Insert</a></li>
            <li><a href="update_form.php">Update</a></li>
            <li><a href="delete_form.php">Delete</a></li>
        </ul>
    </div>
  
       
           
</body>
</html>