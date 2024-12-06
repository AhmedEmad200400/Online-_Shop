<?php




include("db.php");

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    $IMAGE_LOCATION = $_FILES['image']["tmp_name"];
    $IMAGE_NAME = $_FILES['image']['name'];
    $IMAGE_UP = "images/".$IMAGE_NAME;

    // إدخال البيانات في قاعدة البيانات
    $update = "UPDATE prod set name ='$NAME', price='$PRICE' , image='$IMAGE_UP' WHERE id=$id ";
    mysqli_query($con, $update);

    // رفع الصورة إلى المجلد
    if(move_uploaded_file($IMAGE_LOCATION, $IMAGE_UP)){
        echo "<script>alert('تم تحديث المنتج بنجاح');
        </script>";
    } else {
        echo "<script>alert('حدث خطأ أثناء رفع المنتج');
        </script>";
    }

    // إعادة التوجيه إلى الصفحة الرئيسية
    header("location: products.php");
}










?>