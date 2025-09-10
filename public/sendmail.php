<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

header('Content-Type: application/json; charset=UTF-8');

$mail = new PHPMailer(true);

try {
    // Настройки SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'asaulsergey@gmail.com'; // твой Gmail
    $mail->Password   = 'gsev jpsb hvsi hddl'; // пароль приложения Gmail
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->isHTML(true);

    // От кого и кому
    $mail->setFrom('asaulsergey@gmail.com', 'Масштаб');
    $mail->addAddress('asaulsergey@gmail.com');

    // Тема и тело
    $mail->Subject = 'Новое сообщение с сайта';
    $body = "<h1>Новое сообщение</h1>";

    if (!empty($_POST['name'])) {
        $body .= "<p><strong>Имя:</strong> " . htmlspecialchars($_POST['name']) . "</p>";
    }
    if (!empty($_POST['email'])) {
        $body .= "<p><strong>Email:</strong> " . htmlspecialchars($_POST['email']) . "</p>";
    }
    if (!empty($_POST['phone'])) {
        $body .= "<p><strong>Телефон:</strong> " . htmlspecialchars($_POST['phone']) . "</p>";
    }
    if (!empty($_POST['comment'])) {
        $body .= "<p><strong>Комментарий:</strong> " . htmlspecialchars($_POST['comment']) . "</p>";
    }

    // Файл
    if (!empty($_FILES['image']['tmp_name'])) {
        $filePath = __DIR__ . '/files/' . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
            $mail->addAttachment($filePath);
            $body .= "<p><strong>Файл прикреплён</strong></p>";
        }
    }

    $mail->Body = $body;

    // Отправка
    if ($mail->send()) {
        echo json_encode(['message' => 'Данные отправлены'], JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode(['message' => 'Ошибка: ' . $mail->ErrorInfo], JSON_UNESCAPED_UNICODE);
    }
} catch (Exception $e) {
    echo json_encode(['message' => 'Ошибка: ' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
}
