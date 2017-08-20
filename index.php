<?php

$allParam = $_GET;
$a1 = [];
$a1['degree'] = null;
$a1['type'] = 'c';

function getTextTemp($a)
{
    if ( $a <= -1 ) {
        return 'мороз';
    }

    if ( $a > -1 && $a <=3 ) {
        return 'заморозки';
    }

    if ( $a > 3 && $a <= 10 ) {
        return 'холодно';
    }

    if ( $a > 10 && $a <= 20 ) {
        return 'прохладно';
    }

    if ( $a > 20 && $a <= 30 ) {
        return 'тепло';
    }

    if ( $a > 30 ) {
        return 'жарко';
    }
}

$a2 = explode('&', $_SERVER['QUERY_STRING']);

foreach($a2 as $str) {
        list($key, $value) = explode('=', $str);
        $a1[$key] = $value;
    }

unset ($a2);

if ( $a1['degree'] === null) {
    exit('Значение температуры не указано');
}

if ($a1['type'] == 'f') {
    $a1['text'] = getTextTemp(( 5 / 9) * ($a1['degree'] -32));
} else {
    $a1['text'] = getTextTemp($a1['degree']);
    $a1['type'] == 'c';
}

echo 'На улице '.$a1['text'].'. температура = '.$a1['degree'].' по '.$a1['type'].'.';
