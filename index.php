<?php

$a1 = [];
$a2 = explode('&', $_SERVER['QUERY_STRING']);
$string = '';

foreach($a2 as $str) {
    list($key, $value) = explode('=', $str);
    $a1[$key] = $value;
}

unset ($a2);

if (isset($a1['a']) && isset($a1['b']) && isset($a1['operation']) && $a1['a'] && $a1['b'] && $a1['operation']) {
    $string ='$string = '.$a1['a'].$a1['operation'].$a1['b'].';';
    eval($string);
    echo 'a '. $a1['operation'].' b = '.$string;
}
else {
    echo 'указанные данные не верны';
}