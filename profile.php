<!DOCTYPE html>
<html>
<head>
    <title>Профиль</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        label {
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 5px;
            margin-bottom: 10px;
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
    <?php
    session_start();

    if (isset($_SESSION['username'])) {
        echo "<p>Добро пожаловать, " . $_SESSION['username'] . "!</p> ";
    } else {
        echo "<p>Добро пожаловать, Гость!</p>";
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base";

    // Подключение к базе данных
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    // Обработка формы редактирования профиля
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['id'])) {
        $id = $_SESSION['id']; // Идентификатор пользователя из сессии
        $newUsername = $_POST['username'];
        $newPassword = $_POST['password'];

        // Защита от SQL-инъекции
        $newUsername = $conn->real_escape_string($newUsername);
        $newPassword = $conn->real_escape_string($newPassword);

        // Обновляем данные пользователя в базе данных
        $sql = "UPDATE users SET username='$newUsername', password='$newPassword' WHERE id='$id'";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            echo "Данные пользователя успешно обновлены";
        } else {
            echo "Ошибка при обновлении данных пользователя: " . $conn->error;
        }
    }
    ?>

    <h2>Редактирование профиля:</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Имя пользователя:</label>
        <input type="text" name="username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>">
        <br>
        <label for="password">Пароль:</label>
        <input type="password" name="password">
        <br>
        <input type="submit" name="submit" value="Сохранить">
    </form>
</body>
</html>