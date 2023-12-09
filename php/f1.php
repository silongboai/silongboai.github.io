<?php

// sí — yes
$text = '

';

$rows = preg_split("/[\r\n]+/", $text, -1, PREG_SPLIT_NO_EMPTY);

// ['sí','yes'],
$r = '';
foreach ($rows as $row) {
    $regex = "/\s?[—]+\s?/";// 两个 “-” 不一样，肉眼看不出来; 手工修改统一
    $cols = preg_split($regex, $row);
    $cols = array_map('trim', $cols);
    $r .= "['$cols[0]','$cols[1]'],\n";
}

file_put_contents('1.txt', $r);
