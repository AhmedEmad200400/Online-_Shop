<?php
include('db.php'); // الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // تشفير كلمة المرور

    // التحقق من عدم وجود المستخدم مسبقًا
    $check_user = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $check_user);

    if (mysqli_num_rows($result) > 0) {
        $error = "البريد الإلكتروني مستخدم بالفعل.";
    } else {
        // إضافة المستخدم الجديد
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($con, $query)) {
            $success = "تم إنشاء الحساب بنجاح!";
        } else {
            $error = "حدث خطأ: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل مستخدم جديد</title>
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
        .signup-container {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .signup-container h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .signup-container .form-control {
            border-radius: 10px;
            border: 2px solid #ddd;
            transition: all 0.3s ease-in-out;
        }
        .signup-container .form-control:focus {
            border-color: #6e8efb;
            box-shadow: 0 0 10px rgba(110, 142, 251, 0.5);
        }
        .btn-signup {
            background: linear-gradient(90deg, #6e8efb, #a777e3);
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            padding: 12px;
            border-radius: 10px;
            border: none;
            width: 100%;
            transition: transform 0.2s, background 0.3s;
        }
        .btn-signup:hover {
            background: linear-gradient(90deg, #5a78d1, #9268c7);
            transform: scale(1.05);
        }
        .message {
            margin-top: 15px;
            font-size: 14px;
        }
        .message.success {
            color: green;
        }
        .message.error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>إنشاء حساب جديد</h2>
        <?php if (!empty($error)) { echo "<div class='message error'>$error</div>"; } ?>
        <?php if (!empty($success)) { echo "<div class='message success'>$success</div>"; } ?>
        <form action="signup.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">اسم المستخدم:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn-signup">تسجيل</button>
        </form>
    </div>
</body>
</html>
