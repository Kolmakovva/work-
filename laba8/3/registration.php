<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $login = $_POST["login"];
    $password = $_POST["password"];
    $birthdate = $_POST["birthdate"];
    echo "Регистрация прошла успешно!";
}
?>