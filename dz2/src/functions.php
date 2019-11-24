<?php
function task1($param, $a = true) {
    if ($a != true) {
        foreach ($param as $value) {
            echo '<p>' . $value . '</p>';
        }
    } else {
        $result = '';
        foreach ($param as $value) {
           $result = $result . $value . ' ';
        }
        return $result;
    }
}

function task2(string $operation) {
    $args = func_get_args();
    $args_numb = func_num_args();
    $result = 0;

    if ($operation == '+') {
        for ($i = 1; $i < sizeof($args); $i++) {
            $result += $args[$i];
        }
    } elseif ($operation == '*') {
        $result = 1;
        for ($i = 1; $i < sizeof($args); $i++) {
            $result *= $args[$i];
        }
    } elseif ($operation == '-') {
        for ($i = 1; $i < sizeof($args); $i++) {
            $result -= $args[$i];
        }
    } elseif ($operation == '/') {
        $result = $args[1];
        for ($i = 1; $i <= ($args_numb-2); $i++) {
            $result /= $args[$i+1];
        }
    }
    return $result;
}

function task3($rows, $cols) {
    if (is_int($rows) && is_int($cols)) {
        echo '<table>';
        for ($i = 1; $i <= $rows; $i++) {
            echo '<tr>';
            for ($c = 1; $c <= $cols; $c++) {
                echo '<td>' . $i * $c . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<h2>Текст корректной ошибки :)</h2>';
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
    $fp = fopen($file_name, 'w+');
    fwrite($fp, $string = 'Hello again!');
    echo file_get_contents($file_name);

}