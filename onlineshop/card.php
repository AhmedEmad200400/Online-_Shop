<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منتجاتي</title>

    <!-- روابط Bootstrap و Google Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        h1 {
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }
        .table-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="text-center">العربة الخاصة بك</h1>
        <div class="table-container">
            <?php
            include("db.php");
            $result = mysqli_query($con, "SELECT * FROM addcard");
            if (mysqli_num_rows($result) > 0) {
                echo "
                <table class='table table-striped'>
                    <thead class='table-dark'>
                        <tr>
                            <th scope='col'>اسم المنتج</th>
                            <th scope='col'>سعر المنتج</th>
                            <th scope='col'>إزالة المنتج</th>
                        </tr>
                    </thead>
                    <tbody>
                ";

                while ($row = mysqli_fetch_array($result)) {
                    echo "
                        <tr>
                            <td>{$row['name']}</td>
                            <td>{$row['price']} ج.م</td>
                            <td>
                                <a href='del_card.php?id={$row['id']}' class='btn btn-danger'>إزالة</a>
                            </td>
                        </tr>
                    ";
                }

                echo "
                    </tbody>
                </table>
                ";
            } else {
                echo "<p class='text-center'>لا توجد منتجات في العربة.</p>";
            }
            ?>
        </div>
    </div>
    <center>
        <a href="shop.php">الرجوع الي المتجر</a>
    </center>

</body>
</html>
