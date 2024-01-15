<!DOCTYPE html>
<html>
<head>
    <title>Форма отзывов</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #f0f0f0, #e6e6fa);
        }
        
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        
        label {
            font-weight: bold;
        }
        
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .review {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        
        .review strong {
            font-weight: bold;
        }
        
        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <h2>Оставьте свой отзыв</h2>
    <?php
    // Обработка отправленной формы
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        // Добавление отзыва в файл
        $file = fopen("reviews.txt", "a");
        fwrite($file, "<div class='review'><p><strong>Имя:</strong> " . $name . "</p><p><strong>Отзыв:</strong> " . $comment . "</p></div><hr>");
        fclose($file);
    }
    ?>
    <form method="post" action="">
        <label for="name">Ваше имя:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="comment">Ваш отзыв:</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br>
        <input type="submit" name="submit" value="Отправить">
    </form>

    <h2>Отзывы пользователей:</h2>
    <?php
    // Вывод отзывов из файла
    $file = fopen("reviews.txt", "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            echo $line;
        }
        fclose($file);
    }
    ?>
</body>
</html>