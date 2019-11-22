<?php
$bmw = [
	'model' => 'X5',
	'speed' => 120,
	'doors' => 5,
	'year' => '2015'
];
$toyota = [
	'model' => 'RAV4',
	'speed' => 150,
	'doors' => 5,
	'year' => '2017'
];
$opel = [
	'model' => 'Astra',
	'speed' => 100,
	'doors' => 4,
	'year' => 2019
];
$car = ['bmw' => $bmw, 'toyota' => $toyota, 'opel' => $opel];
foreach ( $car as $name => $data) {
    echo 'CAR ' . $name . '<br/>';
    echo $data['model'] . ' ' . $data['speed'] . ' ' . $data['doors'] . ' ' . $data['year'] . '<br/><br/>';
}
?>