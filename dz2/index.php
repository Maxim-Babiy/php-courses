<?php
require('src/functions.php');

$lines = ['Строка №1', 'Строка №2', 'Строка №3', 'Строка №4'];
$result = task1($lines, false);
echo $result . '<br>';
$result = task1($lines, true);
echo $result . '<br>';
echo '<hr>';

task2('+',15,5,3,1);
task2('*',5,4,3,2);
task2('-',15,5,3,1);
task2('/',200,10,5,2);
echo '<hr>';

task3(8,10);
echo '<hr>';

task4();
echo '<hr>';

task5();
task6();
echo '<hr>';

task7('test.txt');
