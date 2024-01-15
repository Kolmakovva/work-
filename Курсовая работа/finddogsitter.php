<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Найти догситтера</title>
    <style>
        .header {
            text-align: center;
            background-color: #ffe0b2;
            padding: 20px;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 36px;
            color: #4a4a4a;
        }
        form {
            font-family: Arial, sans-serif;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        
        input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px; /* добавим отступ перед кнопкой */
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
    /* стили для отображения заявок */
    .application {
        margin-bottom: 10px;
    }
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        
    </style>
</head>
<body>

<div class="header">
    <h1>Найти догситтера</h1>
</div>
<?php
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['service']) && isset($_POST['date']) && isset($_POST['dogSize'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $dogSize = $_POST['dogSize'];
  
    $file = fopen("zayavki.txt", "a") or die("Unable to open file!");
    fwrite($file, "Name: " . $name . ", Email: " . $email . ", Service: " . $service . ", Date: " . $date . ", Dog Size: " . $dogSize . "n");
    fclose($file);
  }
?>
    <h1>Оставить заявку:</h1>
    <p>После того, как Вы оставите заявку на сайте, мы свяжемся с вами.</p>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="name">Имя:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br>
    <label for="service">Услуга:</label><br>
    <select id="service" name="service">
      <option value="Передержка(дома у догситтера)">Передержка(дома у догситтера)</option>
      <option value="Дневная няня(дома у заказчика)">Дневная няня(дома у заказчика)</option>
      <option value="Выгул">Выгул</option>
    </select><br>
    <label for="date">Дата:</label><br>
    <input type="date" id="date" name="date"><br>
    <label for="dogSize">Размер собаки:</label><br>
    <select id="dogSize" name="dogSize">
      <option value="Мини">Мини (до 5 кг)</option>
      <option value="Малый">Малый (5-10 кг)</option>
      <option value="Средний">Средний (10-20 кг)</option>
      <option value="Большой">Большой (20+ кг)</option>
    </select><br>
    <input type="submit" value="Оставить заявку">
  </form>

  <h2>Заявки:</h2>
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      echo "<div class='application'>
                <p><strong>Имя:</strong> ". $name . "</p>
                <p><strong>Email:</strong> ". $email . "</p>
                <p><strong>Услуга:</strong> ". $service . "</p>
                <p><strong>Дата:</strong> ". $date . "</p>
                <p><strong>Размер собаки:</strong> ". $dogSize . "</p>
            </div>";
  }
?>
</form>

</body>

</html>