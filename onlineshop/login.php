<?php
include('db.php'); // الاتصال بقاعدة البيانات

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];

    // البحث عن المستخدم
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: shop.php"); // توجيه إلى صفحة المتجر
            exit;
        } else {
            $error = "كلمة المرور غير صحيحة.";
        }
    } else {
        $error = "البريد الإلكتروني غير موجود.";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
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
        .login-container {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .login-container h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .login-container .form-control {
            border-radius: 10px;
            border: 2px solid #ddd;
            transition: all 0.3s ease-in-out;
        }
        .login-container .form-control:focus {
            border-color: #6e8efb;
            box-shadow: 0 0 10px rgba(110, 142, 251, 0.5);
        }
        .btn-login {
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
        .btn-login:hover {
            background: linear-gradient(90deg, #5a78d1, #9268c7);
            transform: scale(1.05);
        }
        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>تسجيل الدخول</h2>
        <?php if (!empty($error)) { echo "<div class='error-message'>$error</div>"; } ?>
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn-login">دخول</button>
        </form>
    </div>
</body>
</html>
