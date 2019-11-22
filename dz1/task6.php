<?php
echo '<table style="border:1px solid black;">';
for ($i=1; $i<=10; $i++) {
    echo '<tr>';
    for ($s=1; $s<=10; $s++) {
        if ($i%2==0 && $s%2==0) {
            echo '<td>(' . $i*$s . ')</td>';
        }
        elseif ($i%2!=0 && $s%2!=0) {
            echo '<td>[' . $i*$s . ']</td>';
        }
        else {
            echo '<td>' . $i*$s . '</td>';
        }
    }
    echo '</tr>';
}
echo '</table>';
?>