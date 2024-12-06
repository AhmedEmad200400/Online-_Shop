<?php
include("db.php");

// تحقق من إرسال النموذج
if (isset($_POST['add'])) {
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];

    // استعلام إدخال البيانات بصيغة صحيحة
    $insert = "INSERT INTO addcard (name, price) VALUES ('$NAME', '$PRICE')";

    // تنفيذ الاستعلام
    if (mysqli_query($con, $insert)) {
        // إعادة التوجيه بعد نجاح الإدخال
        header('Location: card.php');
        exit;
    } else {
        // عرض خطأ إذا فشل الاستعلام
        echo "حدث خطأ أثناء إدخال البيانات: " . mysqli_error($con);
    }
}
?>
