<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	//От кого письмо
	$mail->setFrom('egor2323233232325@gmail.com', 'Фрилансер');
	//Кому отправить
	$mail->addAddress('info@isida-it.com');
	//Тема письма
	$mail->Subject = 'Привет! Это вопрос"';

	//Тело письма
	$body = '<h1>Всем привет</h1>';

	if(trim(!empty($_POST['name']))){
		$body.='<p><strong>Имя:</strong>'.$_POST['name'].'</p>';
	}
	if(trim(!empty($_POST['number']))){
		$body.='<p><strong>Телефон:</strong>'.$_POST['number'].'</p>';
	}
	if(trim(!empty($_POST['email']))){
		$body.='<p><strong>Email:</strong>'.$_POST['email'].'</p>';
	}
	if(trim(!empty($_POST['text']))){
		$body.='<p><strong>Сообщение:</strong>'.$_POST['text'].'</p>';
	}

	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>