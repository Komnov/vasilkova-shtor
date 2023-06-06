<?php
// Google Captcha
// $url = 'https://www.google.com/recaptcha/api/siteverify?secret=1111&response='.(array_key_exists('g-recaptcha-response', $_POST) ? $_POST["g-recaptcha-response"] : '').'&remoteip='.$_SERVER['REMOTE_ADDR'];
// $resp = json_decode(file_get_contents($url), true);

// Фильтрация данных
// Проверка Имени
$input_name = strip_tags($_POST['name']);$input_name = htmlspecialchars($input_name);$name = str_replace(array('+', '-'), '', filter_var($_POST['name'], FILTER_SANITIZE_STRING));$name_email = "<strong>Имя:</strong> ".$name;
// Телефон
if (!empty($_POST['phone'])){$number = str_replace(array('+', '-'), '', filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT));$number_email = '<strong>Телефон:</strong> '.$number;} else{$number = '';$number_email = '';}
	// Проверка почты
	$input_email = strip_tags($_POST['email']);$input_email = htmlspecialchars($input_email);$email = str_replace(array('+', '-'), '', filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));$email_email = "<strong>E-Mail:</strong> ".$email;
// Проверка сообщения
if (!empty($_POST['message'])){$input_message = strip_tags($_POST['message']);$input_message = htmlspecialchars($input_message);$message = str_replace(array('+', '-'), '', filter_var($_POST['message'], FILTER_SANITIZE_STRING));$message_mail = '<strong>Сообщение:</strong> '.$message;} else{$message = '';$message_mail = '';}
	

// Проверка заполнения полей и выдача ошибок
// if (strlen($_POST['phone']) > 6 && !empty($_POST['phone']) && !empty($_POST['name']) && isset($_POST['policy'])) {
	if (!empty($_POST['phone']) && !empty($_POST['name'])) {
		// Формирование письма
		$letter = "
		<div style='padding:10px 15px;'>
			<h2 style='color:#920b0f;' align='center'>С сайта был получен запрос с такими данными:</h2>".
				"<p>".$name_email."</p>".
				"<p>".$number_email."</p>".
				"<p>".$email_email."</p>".
				"<p>".$message_mail."</p>
			</div>
		";
		// Отправка письма
		// conor.richard@yandex.ru
		// conor.richard@yandex.ru
		$headers = 'Content-type: text/html; сharset=utf-8';
		if(mail("natalivasilkova38@gmail.com","Заявка с сайта " . $_SERVER['HTTP_HOST'],$letter,$headers)){
				echo "Спасибо, ".$name.", Ваше<br>сообщение успешно отправлено";
				echo "<script>jQuery(document).ready(function(){jQuery('form').trigger('reset');});</script>";
			} else{
				echo "Ошибка, Ваше сообщение не отправлено";
			}
		} else if (empty($_POST['name'])) {
		echo "Сообщение не отправлено, напишите Ваше Имя.";
	} else if (empty($_POST['phone'])) {
		echo "Сообщение не отправлено, напишите Ваш Телефон.";
	} else {
		echo "Сообщение не отправлено, дайте согласие на обработку персональных данных.";
	}
	
?>