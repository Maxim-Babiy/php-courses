<?php

try {
    $PDO = new PDO("mysql:host=localhost;dbname=vp_burgershop", 'root', '');
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}

$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$street = $_GET['street'];
$home = $_GET['home'];
$part = $_GET['part'];
$appt = $_GET['appt'];
$floor = $_GET['floor'];
$comment = $_GET['comment'];
if (isset($_GET['payment'])) {
    $payment = $_GET['payment'];
} else {
    $payment = 'unknown';
}
if (isset($_GET['callback'])) {
    $callback = $_GET['callback'];
} else {
    $callback = 'call';
}

$authCheck = $PDO->query("SELECT email FROM users WHERE email = '$email'");
$authentificate = $authCheck->fetchAll(PDO::FETCH_ASSOC);

if (empty($authentificate)) {
    $insertUser = $PDO->prepare("INSERT INTO `users` (`name`, `email`, `phone`) VALUES (?, ?, ?)");
    $insertUser->execute(array($name, $email, $phone));

    $userIdQuery = $PDO->query("SELECT `email`, `user_id` FROM users WHERE `email` = '$email'");
    $userIdQueryResult = $userIdQuery->fetchAll(PDO::FETCH_ASSOC);
    $user_id = $userIdQueryResult[0]['user_id'];

    $insertDetails = $PDO->prepare("INSERT INTO `details` (`user_id`, `street`, `home`, `part`, `appt`, `floor`, `comment`, `payment`, `callback`, `number_of_order`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $insertDetails->execute(array($user_id, $street, $home, $part, $appt, $floor, $comment, $payment, $callback, '1'));
} else {
    // Когда пользователь в базе, просто вносим заказ
    $userIdQuery = $PDO->query("SELECT `email`, `user_id` FROM users WHERE `email` = '$email'");
    $userIdQueryResult = $userIdQuery->fetchAll(PDO::FETCH_ASSOC);
    $user_id = $userIdQueryResult[0]['user_id'];

    $userIdQuery = $PDO->query("SELECT `email`, `user_id` FROM users WHERE `email` = '$email'");
    $userIdQueryResult = $userIdQuery->fetchAll(PDO::FETCH_ASSOC);
    $user_id = $userIdQueryResult[0]['user_id'];

    $orderNumber = $PDO->query("SELECT COUNT(*) as total FROM details WHERE user_id = '$user_id'");
    $orderNumberResult = $orderNumber->fetchAll(PDO::FETCH_ASSOC);
    $numberOfOrder = ($orderNumberResult[0]['total']+1);

    $InsertOrder = $PDO->prepare("INSERT INTO `details` (`user_id`, `street`, `home`, `part`, `appt`, `floor`, `comment`, `payment`, `callback`, `number_of_order`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $InsertOrder->execute(array($user_id, $street, $home, $part, $appt, $floor, $comment, $payment, $callback, $numberOfOrder));

   // Высылаю письмо
    $subject = 'Заказ №' . $numberOfOrder;
    $message = 'DarkBeefBurger за 500 рублей, 1 шт' . "\r\n" . 'Ваш заказ будет доставлен по адресу:'. "\r\n" .
        'Улица: ' . $_GET['street'] . "\r\n" . 'Дом: ' . $_GET['part'] . "\r\n" . 'Корпус: ' . $_GET['part'] . "\r\n" .
        'Квартира: ' . $_GET['appt'] . "\r\n" . 'Этаж: ' . $_GET['floor']  . "\r\n" . "Спасибо! Это ваш $numberOfOrder заказ!";
    $sending_mail = mail($email, $subject ,$message);
}
echo 'Спасибо за заказ!';


