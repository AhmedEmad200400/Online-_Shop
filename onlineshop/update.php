<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">

    <title>Update|تعديل المنتج</title>
</head>
<body>
    <?php
    include("db.php");
    $id =($_GET['id']);
    $up =mysqli_query($con,"SELECT * FROM prod WHERE id=$id" );
    $data =mysqli_fetch_array($up);
    
    
    ?>


<center>
    <div class="main">
        <form action="up.php" method="post" enctype="multipart/form-data">
            <h2>تعديل المنتجات</h2>
            <input type="text" name="id" value="<?php echo $data['id']?>" >
            <br>
            <input type="text" name="name" value="<?php echo $data['name']?>"  >
            <br>
            <input type="text" name="price" value="<?php echo $data['price']?>" >
            <br>
            <input type="file" id="file" name="image" style="display: none;">
            <label for="file">تحديث صورة المنتج</label>
            <button name="update" type="submit"> تعديل المنتج</button>
            <br><br>
            <a href="products.php">عرض كل المنتجات</a>
            




        </form>
    </div>
    <p>Name of devolober AHMED</p>













</center>






</body>
</html>