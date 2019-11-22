<?php
const PICTURE = 80;
const MARKER_DRAW = 23;
const PENCIL_DRAW = 40;

echo "<b>Дана задача:</b><br/>";
echo "На школьной выставке <b>" . PICTURE . "</b> рисунков. <b>" . MARKER_DRAW . "</b> из них выполнены <b>фломастерами, "
    . PENCIL_DRAW . " карандашами</b>, а остальные — <b>красками</b>. Сколько рисунков, выполненные красками, 
    на школьной выставке?<br/><br/>";
echo "<b>Решение:</b><br/>";
echo PICTURE." - "."(".MARKER_DRAW." + " .PENCIL_DRAW.") =";
echo PICTURE - (MARKER_DRAW + PENCIL_DRAW);
?>