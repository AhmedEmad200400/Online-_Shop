<?php
$con = mysqli_connect('localhost', 'root', '', 'online');
if (!$con) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}
?>
