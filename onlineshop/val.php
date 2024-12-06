<?php
include('db.php');

$id = $_GET['id'];
$UP = mysqli_query($con, "SELECT * FROM prod WHERE id=$id");
$data = mysqli_fetch_array($UP);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد شراء المنتج</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .main {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: white;
            padding: 10px;
            border-radius: 8px;
        }
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }
        input[type="text"]:focus {
            border-color: #6e8efb;
            box-shadow: 0 0 8px rgba(110, 142, 251, 0.5);
        }
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #6e8efb, #a777e3);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        button:hover {
            background: linear-gradient(90deg, #5a78d1, #9268c7);
            transform: scale(1.05);
        }
        a {
            display: inline-block;
            margin-top: 15px;
            color: #6e8efb;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="main">
        <form action="insert_card.php" method="post">
            <h2>معلومات المنتج</h2>
            <input type="text" name="id" value="<?php echo $data['id']; ?>" readonly>
            <input type="text" name="name" value="<?php echo $data['name']; ?>" readonly>
            <input type="text" name="price" value="<?php echo $data['price']; ?>" readonly>
            <button name="add" type="submit">تأكيد شراء المنتج</button>
            <a href="shop.php">الرجوع لصفحة المنتجات</a>
        </form>
    </div>
</body>
</html>
