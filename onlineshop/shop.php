<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">

    <title>products| المنتجات </title>
    <style>
        h3{
            font-family: 'cairo', sans-serif;
        }
        .card{
            float: right;
            margin-top: 20px;
            margin-right: 10;
            margin-bottom: 10px;
            margin-left: 10px;
        }
        .card img{
            width: 100%;
            height: 200px;
        }
        main{
            width: 60%;
        }
    
        #aa{
            margin-left: 45px;
            text-decoration: none;
            color:black;
        }


    </style>



</head>
<body>
    <nav class="navbar navbar_dark bg_dark">    
    <a id="aa" class="navbar-brand" href="card.php">My shopping cart | عربتي التسوق</a>
    </nav>

<center>

    <h3>جميع المنتجات المتوفره</h3>

</center>



<?php
include("db.php");

// Fetch all rows from the 'prod' table
$result = mysqli_query($con, "SELECT * FROM prod");

while ($row = mysqli_fetch_array($result)) {

    echo "
    <center>
    <main>
        <div class='card' style='width: 15rem;'>
            <img src='$row[image]'  class='card-img-top'>
            <div class='card-body'>
                <h5 class='card-title'>$row[name]</h5>
                <p class='card-text'>$row[price]</p>
                <a href='val.php?id=$row[id]'class='btn btn-success'>اضافة المنتج للعربه</a>
               
            </div>
        </div>
    </main>
    </center>
    ";
}
?>


    



   

</body>
</html>