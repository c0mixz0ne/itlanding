<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/work.jpg">
    <title>Отправка</title>
    <style>
        @import url(../css/style.css);body{ background:var(--main-addwork-color); display: flex; justify-content: center; align-items:center; font-family: "Merriweather", serif; color:var(--main-black-color);height:100vh; }h2{padding:10px;text-align:center;}
    </style>
</head>
<body>
   <!-- Отправка задания -->
<?php
  $to = "shmatova-vika@mail.ru"; //Кому
  $from = "webmaster@example.com"; //От кого
  $subject = "Пользователь прислал файл"; // Заголовок сообщения

  $filename = $_FILES["file"]["name"]; //Файл
  $file = chunk_split(base64_encode(file_get_contents($_FILES["file"]["tmp_name"])));

  $boundary = "---"; //Разделитель

  /* Заголовки */
  $headers = "From: $from\nReply-To: $from\n";
  $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"";
  $message = "--$boundary\n";
  /* Собираем */
  $message .= "Content-type: text/html; charset='utf-8'\n";
  $message .= "Content-Transfer-Encoding: quoted-printablenn";
  $message .= "Content-Type: application/octet-stream; name==?utf-8?B?".base64_encode($filename)."?=\n";
  $message .= "Content-Transfer-Encoding: base64\n";
  $message .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode($filename)."?=\n\n";
  $message .= "--".$boundary ."--\n";
  $message .= $file;
  mail($to, $subject, $message, $headers); //Отправляем письмо
?>
<h2>Спасибо, Ваше задание(<?= $filename ?>) отправлено </h2>
</body>
</html>