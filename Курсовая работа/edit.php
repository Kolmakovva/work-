<!DOCTYPE html>
<html>
<head>
    <title>Редактирование пользователей</title>
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

        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <h1>Редактирование данных пользователей</h1>

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
        $id = $_POST["id"];
        $newUsername = $_POST["new_username"];
        $newPassword = $_POST["new_password"];

        // Обновление пользователя в базе данных
        $sql = "UPDATE users SET username = '$newUsername', password = '$newPassword' WHERE id = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Пользователь успешно обновлен";
        } else {
            echo "Ошибка при обновлении пользователя: " . $conn->error;
        }
    }

    // Запрос на получение списка пользователей
    $sql = "SELECT id, username, password FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Вывод формы для каждого пользователя
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $username = $row["username"];
            $password = $row["password"];

            echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
            echo "ID: $id<br>";
            echo "Имя пользователя: <input type='text' name='new_username' value='$username'><br>";
            echo "Пароль: <input type='password' name='new_password' value='$password'><br>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<input type='submit' value='Сохранить изменения'>";
            echo "</form>";
            echo "<hr>";
        }
    } else {
        echo "Нет пользователей в базе данных";
    }

    // Закрытие соединения с базой данных
    $conn->close();
    ?>

</body>
</html>