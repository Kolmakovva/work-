<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>
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
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<h2>Вход</h2>
<?php
session_start();
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base";
    
    // Подключение к базе данных
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $userId =2; 

    $_SESSION['id'] = $userId;
    $_SESSION['username'] = $username;
    // Перенаправляем на страницу профиля
    header("Location: profile.php");
    exit();
}
?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Имя пользователя:</label>
        <input type="text" name="username">
        <br>
        <label for="password">Пароль:</label>
        <input type="password" name="password">
        <br>
        <input type="submit" name="submit" value="Войти">
    </form>
</body>
</html>