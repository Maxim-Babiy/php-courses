<?php
require('src/functions.php');

$lines = ['Строка №1', 'Строка №2', 'Строка №3', 'Строка №4'];
$result = task1($lines, false);
echo $result;
echo '<hr>';

echo task2('+',100,5,4,2);
echo '<hr>';

task3(8,10);
echo '<hr>';

task4();
echo '<hr>';

task5();
task6();
echo '<hr>';

task7('test.txt');
