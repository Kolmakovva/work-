<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Удаление пользователя</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        p {
            margin-bottom: 10px;
        }

        form {
            margin-top: 10px;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #008CBA;
            color: white;
            border: none;
            cursor: pointer;
        }

        hr {
            margin: 20px 0;
            border: none;
            border-top: 1px solid #ddd;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

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

        // Удаление пользователя из базы данных
        $sql = "DELETE FROM users WHERE id = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Пользователь успешно удален";
        } else {
            echo "Ошибка при удалении пользователя: " . $conn->error;
        }
    }

    // Запрос на получение списка пользователей
    $sql = "SELECT id, username, password, role FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Вывод списка пользователей
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $username = $row["username"];
            $password = $row["password"];
            $role = $row["role"];

            echo "<p>ID: $id</p>";
            echo "<p>Имя пользователя: $username</p>";
            echo "<p>Пароль: $password</p>";
            echo "<p>Роль: $role</p>";
            echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<input type='submit' value='Удалить пользователя'>";
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