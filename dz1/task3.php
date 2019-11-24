<?php
$age = mt_rand(0,150);
echo $age.'<br>';
if ($age <= 65 && $age >= 18) {
    echo 'Вам еще работать и работать';
} elseif ($age >= 65 && $age <= 100) {
    echo 'Вам пора на пенсию';
} elseif ($age <= 17) {
    echo 'Вам еще рано работать';
} else {
    echo 'Неизвестный возраст';
}
