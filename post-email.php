<?php

if (!$_POST) exit('No direct script access allowed');

if (!isset($_POST['f'])) exit('No direct script access allowed');
if (!isset($_POST['f']['name'])) exit('No direct script access allowed');
if (!isset($_POST['f']['tel'])) exit('No direct script access allowed');

$tel = trim(strip_tags($_POST['f']['tel']));
$name = trim(strip_tags($_POST['f']['name']));

if (!$tel)
{
	exit('Неверный email! Обновите страницу (F5) и укажите правильный адрес');
}

if (!$name)
{
	exit('Не указано имя! Обновите страницу (F5) и укажите своё имя');
}


$to = 'skosam1208@gmail.com'; // адрес получателя

$subject = 'Тема письма'; // тема письма

// формируем тело сообщения
$message = 'Имя: ' . $name . "\r\n" . 'Телефон: ' . $tel; 

// формируем headers для письма
$headers = 'From: '. $tel . "\r\n"; // от кого
 
// кодируем заголовок в UTF-8
$subject = preg_replace("/(\r\n)|(\r)|(\n)/", "", $subject);
$subject = preg_replace("/(\t)/", " ", $subject);
$subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
	
// отправка
@mail($to, $subject, $message, $headers);

echo 'Дякуємо!!!';

# end of file