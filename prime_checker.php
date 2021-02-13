<?php

/*
 * For this challenge you will determine if you can arrange a number to be a prime number.
 * Using the PHP language, have the function PrimeChecker(num) take num and return 1
 * if any arrangement of num comes out to be a prime number, otherwise return 0.
 * For example: if num is 910, the output should be 1 because 910 can be arranged into 109 or 019,
 * both of which are primes.
 */
function PrimeChecker($num)
{
    $result = rearrangements($num);
    $result = array_unique($result);
    foreach ($result as $value) {
        if (checkPrimeNumber($value))
            return 'true';
    }
    return 'false';
}

function rearrangements($num)
{
    $s = 0;
    while ($num) {// return all shapes of arrangement this number if num is 910 will return array of  901 ,190, 109, 091, 019
        $numbers = [];
        $array = str_split($num);
        $var = $array[$s] == 0 ? '0' : $array[$s];
        unset($array[$s]);
        for ($n = 0; $n < 2; $n++) {
            $numbers[] = $var == 0 ? '0' : $var;
            for ($i = 0; $i < count($array); $i++) {
                $numbers[] = $array[$i] == 0 ? '0' : $array[$i];
            }
            $result[] = implode($numbers);
            $array = array_reverse($array);
            $numbers = [];
        }
        $s++;

        if ($s == strlen($num))
            break;
    }
    return $result;
}

function checkPrimeNumber($num)
{
    if ($num <= 1) return false;
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0 && $num != $i)
            return false;
    }
    return true;
}

echo PrimeChecker(910);