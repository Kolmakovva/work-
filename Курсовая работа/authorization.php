<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        form {
            background-color: #fff;
            padding: 20px;
            max-width: 300px;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        #adminBtn {
            background-color: #007bff;
            margin-bottom: 10px;
        }
        #userBtn {
            background-color: #28a745;
        }
        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "base";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login_username = $_POST['username'];
    $login_password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$login_username' AND password='$login_password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row['role'] === 'admin') {
            $conn->close();
            header("Location: admin.php");
            exit;
        } elseif ($row['role'] === 'user') {
            $conn->close();
            header("Location: login1.php");
            exit;
        }
    } else {
        echo "";
    }
}

$conn->close();
?>
<body>
    <form action="authorization.php" method="post">
        <label for="username">Имя пользователя:</label>
        <input type="text" id="username" name="username">

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password">

        <button type="submit" id="adminBtn">Войти как администратор</button>
        <button type="submit" formaction="login1.php" id="userBtn">Войти как обычный пользователь</button>
    </form>
    <?php
    if (!empty($error)) {
        echo "<p>$error</p>";
    }
    ?>
</body>
</html>