<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Список заказов</title>
</head>
<body>
<?php

try {
    $PDO = new PDO("mysql:host=localhost;dbname=vp_burgershop", 'root', '');
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}

$adminOrdersQuery = $PDO->query("SELECT * FROM `details`");
$adminOrdersResult = $adminOrdersQuery->fetchAll(PDO::FETCH_ASSOC);

echo '<table class="admin"><tr><th>User ID</th><th>Улица</th><th>Дом</th><th>Корпус</th><th>Квартира</th><th>Этаж</th><th>Комментарий</th>
<th>Способ оплаты</th><th>Обратный<br>звонок</th><th>Заказ по счету</th><th>Общий<br>номер<br>заказа</th></tr>';
foreach ($adminOrdersResult as $user_info ) {
    echo '<tr>';
    foreach ($user_info as $info) {
        echo '<td>' . $info . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>
</body>
</html>
