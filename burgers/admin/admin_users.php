<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Список пользователей</title>
</head>
<body>
<?php
try {
    $PDO = new PDO("mysql:host=localhost;dbname=vp_burgershop", 'root', '');
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}
$adminQuery = $PDO->query("SELECT * FROM `users`");
$adminQueryResult = $adminQuery->fetchAll(PDO::FETCH_ASSOC);

echo '<table class="admin"><tr><th>User ID</th><th>Имя</th><th>Почта</th><th>Телефон</th></tr>';
foreach ($adminQueryResult as $users ) {
    echo '<tr>';
    foreach ($users as $user) {
        echo '<td>' . $user . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>
</body>
</html>
