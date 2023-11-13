<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];


    print "пример - это $email";

    // Создаем экземпляр PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Настройки сервера отправки почты
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Замените на адрес вашего SMTP сервера
        $mail->SMTPAuth   = true;
        $mail->Username   = 'rstsupr@gmail.com'; // Замените на вашу почту
        $mail->Password   = 'orbk wurn jrqa dfml'; // Замените на ваш пароль
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->isHTML(true);

        // Адрес отправителя
        $mail->setFrom('rstsupr@gmail.com');

        // Адрес получателя (адрес пользователя)
        $mail->addAddress($email);

        // Тема письма
        $mail->Subject = 'Мы получили ваш запрос';

        // Текст письма
        $mail->Body = "Ghb";

        // Отправляем письмо
        $mail->send();

        echo "Форма успешно отправлена!";
    } catch (Exception $e) {
        echo "Ошибка при отправке письма: {$mail->ErrorInfo}";
    }
} else {
    echo "Ошибка: форма не отправлена!";
}
?>