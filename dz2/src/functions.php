<?php
function task1($strings, $concat = true) {
    if ($concat == false) {
        echo '<b>Если второй параметр = false:</b><br>';
        foreach ($strings as $string) {
            echo '<p>' . $string . '</p>';
        }
    } else {
        echo '<b>Если второй параметр = true:</b><br>';
        $result = implode(' ', $strings);
        return $result;
    }
}

function task2(...$arguments) {
    $args = func_get_args();
    $args_numb = func_num_args();
    $operator = array_shift($arguments);
    $result = 0;

    if ($operator == '+') {
        for ($i = 1; $i < sizeof($args); $i++) {
            $result += $args[$i];
            $expression = implode(" $operator ", $arguments);
        }
        echo $expression . ' = ' . $result . '<br>';
    } elseif ($operator == '*') {
        $result = 1;
        for ($i = 1; $i < sizeof($args); $i++) {
            $result *= $args[$i];
            $expression = implode(" $operator ", $arguments);
        }
        echo $expression . ' = ' . $result . '<br>';
    } elseif ($operator == '-') {
        $result = $args[1];
        for ($i = 1; $i < sizeof($args); $i++) {
            $result -= $args[$i+1];
            $expression = implode(" $operator ", $arguments);
        }
        echo $expression . ' = ' . $result . '<br>';
    } elseif ($operator == '/') {
        $result = $args[1];
        for ($i = 1; $i <= ($args_numb-2); $i++) {
            $result /= $args[$i+1];
            $expression = implode(" $operator ", $arguments);
        }
        echo $expression . ' = ' . $result . '<br>';
    }
}

function task3($rows, $cols) {
    if (is_int($rows) && is_int($cols)) {
        echo '<table>';
        for ($row = 1; $row <= $rows; $row++) {
            echo '<tr>';
            for ($col = 1; $col <= $cols; $col++) {
                echo '<td>' . $row * $col . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<h2>Пожалуйста, введите целые числа</h2>';
    }
}

function task4() {
    echo date('d.m.Y h:i') . '<br>';
    $customDate = mktime(0,0,0,2,24,2016);
    echo date('d.m.Y H:i:s', $customDate);
}

function task5() {
    echo '<b>Исходная строка:</b> ' . $string = 'Карл у Клары украл Кораллы.' . '<br>';
    $search = 'К';
    $replace = '';
    echo '<b>Результат:</b> ' . str_replace($search, $replace, $string) . '<br>';
}

function task6() {
    echo '<b>Дано: </b>' . $string = 'Две бутылки лимонада.' . '<br>';
    $search = 'Две';
    $replace = 'Три';
    echo '<b>Результат: </b>' . str_replace($search, $replace, $string);
}

function task7($file_name) {
    file_put_contents($file_name, 'Hello again!');
    echo file_get_contents($file_name);
}