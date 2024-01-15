<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Выгул и передержка домашних животных</title>
    <style>
        .header {
            text-align: center;
            background-color: #fff8e1;
            padding: 10px; /* изменение расстояния сверху */
        }

        .company-name {
            font-size: 50px;
            font-family: cursive;
            color: #ff69b4;
            margin: 0; /* убираем отступ у h1 */
        }

        .navigation {
            text-align: center;
            background-color: #ffe0b2;
            padding: 10px;
        }

        .menu-item {
            display: inline-block;
            margin: 0 10px;
        }

        .menu-item a {
            font-size: 24px;
            font-family: cursive;
            color: #ff69b4;
            text-decoration: none;
        }

        /* Добавляем стили для отображения перечня услуг */
        .submenu {
            display: none;
            position: absolute;
            background-color: #ffe0b2;
            padding: 10px;
        }

        .menu-item:hover .submenu {
            display: block;
        }
        .submenu a {
            font-size: 24px;
            font-family: cursive;
            color: #ff69b4;
            text-decoration: none;
        }

        .submenu a:hover {
            color: #ff1493;
            cursor: pointer;
        }
    </style>
</head>

<body>

<?php
$companyName = "PETS";
?>

<div class="header">
    <h1 class="company-name"><?php echo $companyName; ?></h1>
</div>

<div class="navigation">
    <div class="menu-item">
        <a href="#">Наши услуги</a>
        <div class="submenu">
            <p><a href="dogboarding.php" style="font-family: cursive; font-size: 17px; color: #ff69b4;">Передержка собак</a></p>
            <p><a href="dogwalking.php" style="font-family: cursive; font-size: 17px; color: #ff69b4;">Выгул собак</a></p>
        </div>
    </div>
    <div class="menu-item">
        <a href="finddogsitter.php">Найти догситтера</a></div>
    <div class="menu-item"><a href="feedback.php">Отзывы</a></div>
    <div class="menu-item"><a href="authorization.php">Личный кабинет</a></div>
</div>
<div class="header" style="background-color: white; padding: 2cm; text-align: left;">
    <h1 style="font-family: cursive;; font-size: 32px; font-weight: bold; color: black; margin-top: 0;">Сталкиваетесь с такими проблемами?</h1>
    <img class="img1" src="https://static.tildacdn.com/tild3064-3261-4133-b538-383066333432/photo.png" width = "550px;" style="display:inline-block; float: right">
    <ol class="pills" style="display:inline-block;">
        <li>Много времени проводите на работе, а с четвероногим любимцем некому погулять?</li>
        <li>Уезжаете в отпуск или в командировку и не с кем оставить питомца?</li>
        <li>Хотите отдохнуть, полениться, провести время с друзьями, да и мало ли других причин? Не знаете, куда деть четвероногого друга?</li>
        <li>Не можете оставить питомца одного дома: хулиганит, болеет или тоскует без вас?</li>
    </ol>
    <style>
        .pills {
            width: 50%; 
            margin-left: auto; 
            margin-left: 0;
            list-style: none;
            counter-reset: li;
            font-family: calibri;
            font-size: 20px;
        }
        .pills li {
            padding: 10px 0;
            position: relative;
            left: 1.5em;
            margin-bottom: 0.75em;
            padding-left: 1em;
            background: #E3DEDC;
        }
        .pills li:before {
            padding: 10px 0;
            position: absolute;
            top: 0;
            bottom: 0;
            left: -1.5em;
            width: 1.875em;
            text-align: center;
            color: white;
            font-weight: bold;
            background: #D66786;
            border-bottom-left-radius: 70em;
            border-top-left-radius: 70em;
            counter-increment: li;
            content: counter(li);
        }
    </style>
    <div class="header" style="position: absolute; background-color: white; padding: 2cm; text-align: right;">
    <h2 style="font-family: cursive;; font-size: 32px; font-weight: bold; color: black; margin-top: 0;">PETS готов прийти вам на помощь в любое время!</h2>
    <img class="img1" src="https://static.tildacdn.com/tild3639-3066-4235-a262-313665303764/pug-dog-isolated-on-.jpg" width = "550px;" style="display:inline-block; float: left">
    <ol class="onepills" style="display:inline-block;">
        <li>Погуляем с вашим питомцем!</li>
        <li>Сводим собаку за вас к ветеринару или на стрижку!</li>
        <li>Оказываем услуги по передержке. Наши проверенные догситтеры возьмут питомца к себе домой. Это не унылая гостиница для животных, в домашней обстановке собака легче перенесет разлуку с любимым хозяином.</li>
        <li>Дневная няня для собак побудет с вашим любимцем дома.</li>
    </ol>
    <style>
        .onepills {
            width: 50%; 
            margin-left: auto; 
            margin-left: 0;
            list-style: none;
            counter-reset: li;
            font-family: calibri;
            font-size: 20px;

        }
        .onepills li {
            padding: 10px 0;
            position: relative;
            left: 1.5em;
            margin-bottom: 0.75em;
            padding-left: 1em;
            background: #E3DEDC;
            text-align: left;
        }
        .onepills li:before {
            padding: 10px 0;
            position: absolute;
            top: 0;
            bottom: 0;
            left: -1.5em;
            width: 1.875em;
            text-align: center;
            color: white;
            font-weight: bold;
            background: #3CB371;
            border-bottom-left-radius: 70em;
            border-top-left-radius: 70em;
            counter-increment: li;
            content: counter(li);
            
        }
    </style>
</div>
</body>

</html>
