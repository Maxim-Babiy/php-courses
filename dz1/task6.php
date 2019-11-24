<?php
echo '<table style="border:1px solid black;">';
for ($rows = 1; $rows <= 10; $rows++) {
    echo '<tr>';
    for ($cols = 1; $cols <= 10; $cols++) {
        if ($rows % 2 == 0 && $cols % 2 == 0) {
            echo '<td>(' . $rows * $cols . ')</td>';
        }
        elseif ($rows % 2 != 0 && $cols % 2 != 0) {
            echo '<td>[' . $rows * $cols . ']</td>';
        }
        else {
            echo '<td>' . $rows * $cols . '</td>';
        }
    }
    echo '</tr>';
}
echo '</table>';
