<!DOCTYPE html>
<html>
<head>
    <title>Добавление пользователя</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 5px;
            margin-bottom: 10px;
            width: 200px;
        }

        input[type="submit"] {
            padding: 8px 20px;
            background-color: #008CBA;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Добавить пользователя:</h1>

    <?php
    // Подключение к базе данных
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    // Обработка отправленной формы
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Вставка нового пользователя в базу данных
        $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'user')";
        if ($conn->query($sql) === TRUE) {
            echo "";
        } else {
            echo "Ошибка при добавлении пользователя: " . $conn->error;
        }
    }

    // Закрытие соединения с базой данных
    $conn->close();
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Имя пользователя:</label>
        <input type="text" name="username" required><br>

        <label for="password">Пароль:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Добавить пользователя">
    </form>

</body>
</html>