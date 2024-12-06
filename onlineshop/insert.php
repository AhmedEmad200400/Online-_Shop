<?php




include("db.php");

if(isset($_POST['upload'])){
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    $IMAGE_LOCATION = $_FILES['image']["tmp_name"];
    $IMAGE_NAME = $_FILES['image']['name'];
    $IMAGE_UP = "images/".$IMAGE_NAME;

    // إدخال البيانات في قاعدة البيانات
    $insert = "INSERT INTO prod(name, price, image) VALUES ('$NAME', '$PRICE', '$IMAGE_UP')";
    mysqli_query($con, $insert);

    // رفع الصورة إلى المجلد
    if(move_uploaded_file($IMAGE_LOCATION, $IMAGE_UP)){
        echo "<script>alert('تم رفع المنتج بنجاح');</script>";
    } else {
        echo "<script>alert('حدث خطأ أثناء رفع المنتج');</script>";
    }

    // إعادة التوجيه إلى الصفحة الرئيسية
    header("location: index.php");
}










?>