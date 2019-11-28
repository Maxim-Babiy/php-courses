<?php
function task1() {
    $fileData = file_get_contents('data/data.xml');
    $xml = new SimpleXMLElement($fileData);

    echo '<h3 style ="margin:0;">Purchase Order Number: ' . $xml['PurchaseOrderNumber'] . '</h3>';
    echo '<h3 style ="margin:0;">Order Date: ' . $xml['OrderDate'] . '</h3>' ;
    echo '<pre>';
    foreach ($xml->Address as $Address) {
        echo '<p style="font-family:serif; margin-bottom:20px;">';
        echo '<b>Address Type: </b>' . $Address->attributes()->Type . '<br>';
        echo '<b>  Name: </b>' . $Address->Name->__toString() .'<br>';
        echo '<b>  Street: </b>' . $Address->Street->__toString() . '<br>';
        echo '<b>  City: </b>' . $Address->City->__toString() . '<br>';
        echo '<b>  State: </b>' . $Address->State->__toString() . '<br>';
        echo '<b>  Zip: </b>' . $Address->Zip->__toString() . '<br>';
        echo '<b>  Country: </b>' . $Address->Country->__toString() . '<br>';
        echo '</p>';
    }
    echo '<p style="font:18px serif;"><b>DeliveryNotes: </b>' . $xml->DeliveryNotes->__toString() . '</p>';
    foreach ($xml->Items->Item as $Item) {
        echo '<p style="font-family:serif; margin-bottom:20px;">';
        echo '<b>Item Part Number: </b>' . $Item->attributes()->PartNumber . '<br>';
        echo '<b>Product Name: </b>' . $Item->ProductName->__toString() . '<br>';
        echo '<b>Quantity: </b>' . $Item->Quantity->__toString() . '<br>';
        echo '<b>US Price: </b>' . $Item->USPrice->__toString() . '<br>';
        if (isset($Item->Comment)) {
            echo '<b>Comment: </b>' . $Item->Comment->__toString() . '<br>';
        }
        if (isset($Item->ShipDate)) {
            echo '<b>Ship Date: </b>' . $Item->ShipDate->__toString() . '<br>';
        }
        echo '</p>';
    }
    echo '</pre>';
};

function task2() {
    $flowers = [
        [
            ["розы", 100],
            ["тюльпаны", 60],
            ["орхидеи", 180]
        ],
        [
            ["кактусы", 100],
            ["магнолии", 60],
            ["фиалки", 180]
        ],
        [
            ["ромашки", 100],
            ["кувшинки", 60],
            ["лилии", 180]
        ]
    ];

    $encodeFlowers = json_encode($flowers);
    file_put_contents('data/output.json', $encodeFlowers);
    $open_flowers = file_get_contents('data/output.json');
    $decodeFlowers = json_decode($open_flowers);
        echo '<b>Вчерашние цены на цветы: </b><br>';
    for ($layer = 0; $layer <3; $layer++) {
        for ($row = 0; $row <3; $row++) {
                echo $flowers[$layer][$row][0] . ' = ' . $flowers[$layer][$row][1] .  '$;<br>';
        }
    }

    $shufflingVar = mt_rand(0,1);
    if ($shufflingVar == 1) {
        $new_flowers = [
            [
                ["розы", 90],
                ["тюльпаны", 60],
                ["орхидеи", 160]
            ],
            [
                ["кактусы", 100],
                ["магнолии", 70],
                ["фиалки", 180]
            ],
            [
                ["ромашки", 100],
                ["кувшинки", 40],
                ["лилии", 200]
            ]
        ];
        $encode_new_flowers = json_encode($new_flowers);
        file_put_contents('data/output2.json', $encode_new_flowers);
        $open_new_flowers = file_get_contents('data/output2.json');
        $decode_new_flowers = json_decode($open_new_flowers);
        echo '<br><b>Следующие цены изменились: </b><br>';
        for ($layer = 0; $layer <= 3; $layer++) {
            for ($row = 0; $row <= 3; $row++) {
                for ($col = 0; $col <= 3; $col++) {
                    if ($flowers[$layer][$row][$col] != $new_flowers[$layer][$row][$col]) {
                        echo $new_flowers[$layer][$row][0] . ' = ' . $new_flowers[$layer][$row][$col] .  '$;<br>';
                    } else {
                        continue;
                    }
                }
            }
        }
    } else {
        echo '<br><b>Данные не изменились</b>';
    }
}
//-------------------------------------------------------------------------------------------
function task3() {
    $random_array = [];
    $even_value = [];
    $even_value_summ = 0;

    for ($i = 1; $i <= 50; $i++) {
        $random = mt_rand(0,100);
       $random_array[] += $random;
    }
    $open_file = fopen('data/task3.csv', 'w+');
    fputcsv($open_file, $random_array);
    foreach ($random_array as $value) {
        if ($value % 2 == 0 && $value != 0) {
            $even_value[] += $value;
            $even_value_summ += $value;
        }
    }
    echo '<b>Сумма четных чисел:</b><br><br>';
    echo implode(' + ', $even_value) . ' = ' . $even_value_summ;
}
//-------------------------------------------------------------------------------------------
function task4() {
    $remoteData = file_get_contents('https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json');
    $decode_file = json_decode($remoteData, true);

    echo '<b>title:</b> ' . $decode_file['query']['pages']['15580374']['title'] . '<br>';
    echo '<b>page_id:</b> ' . $decode_file['query']['pages']['15580374']['pageid'] . '<br>';

}
