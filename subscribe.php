<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/work.jpg">
    <title>Подписка</title>
    <style>
        @import url(../css/style.css);body{ background:var(--main-addwork-color); display: flex; justify-content: center; align-items:center; font-family: "Merriweather", serif; color:var(--main-black-color);height:100vh; }h2{padding:10px;text-align:center;}
    </style>
</head>
<body>
   <!-- Подписка на рассылку -->
<?php
$to = 'shmatova-vika@mail.ru'; // Кому слать
$from = $_POST["email"]; //Кто подписался
$subject = 'Пользователь подписался'; // Заголовок сообщения
$message = 'Почта пользователя: '.$from; //Контент
$headers = 'From: webmaster@example.com' . "\r\n" . //Заголовки
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers); //Отправка
?>
<h2>Спасибо за подписку, ваша почта: <?= $from ?></h2>
</body>
</html>