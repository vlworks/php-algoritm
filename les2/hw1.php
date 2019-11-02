<?php

$prime = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103, 107, 109, 113, 127, 131, 137, 139, 149, 151, 157, 163, 167, 173, 179, 181, 191, 193, 197];

function getPrimeNumber($number){
    $x = 0;
    $y = $number;
    $simpleNumbers = [];
    $simple = false;
    while ($x <= ($y - 1)) {
        ++$x;
        $div = 1;
        while ($div <= ($x - 1)) {
            $simple = true;
            ++$div;
            $divRes = $x / $div;
            if ($divRes == floor($divRes)) {
                if (($div == 1) || $div == $x) {
                    $simple = true;
                } else {
                    $simple = false;
                    break;
                }
            }
        }
        if ($simple) {
            $simpleNumbers[] = $x;
        }
    }
    return $simpleNumbers;
}


function maxSimpleDivider ($number, $prime){
//    $prime = getPrimeNumber($number);
    $goodPrime = [];
    for($i = 0; $i < count($prime); $i++){
        if($number % $prime[$i] === 0){
            $goodPrime[] = $prime[$i];
            if($i === count($prime) - 1){
                if($number % $number){
                    $goodPrime[] = $number;
                }
            }
            $number = $number / $prime[$i];
            var_dump($number);
            continue;
        }
    }
    return max($goodPrime);
}

//echo maxSimpleDivider(13195, $prime) . PHP_EOL;
//echo maxSimpleDivider(324252, $prime) . PHP_EOL;
//echo maxSimpleDivider(623424, $prime) . PHP_EOL;
//echo maxSimpleDivider(600851475143, $prime) . PHP_EOL;


