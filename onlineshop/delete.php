<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // تنفيذ عملية الحذف
    $query = "DELETE FROM prod WHERE id = $id";
    if (mysqli_query($con, $query)) {
        echo "تم حذف المنتج بنجاح.";
        header("Location: index.php");
        exit;
    } else {
        echo "حدث خطأ أثناء حذف المنتج: " . mysqli_error($con);
    }
} else {
    echo "لم يتم توفير معرف المنتج لحذفه.";
}
?>