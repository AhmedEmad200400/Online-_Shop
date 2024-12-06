<?php

include('db.php');

// التحقق من أن المعرّف موجود
if (!isset($_GET['id'])) {
    die("لم يتم توفير معرّف المنتج للحذف.");
}

$id = intval($_GET['id']); // تأمين المدخلات
$query = "DELETE FROM addcard WHERE id=$id";

// تنفيذ الاستعلام
if (mysqli_query($con, $query)) {
    header("Location: card.php"); // إعادة التوجيه بعد الحذف
    exit; // إنهاء التنفيذ لتجنب تشغيل كود إضافي
} else {
    echo "خطأ أثناء حذف المنتج: " . mysqli_error($con);
}

?>
