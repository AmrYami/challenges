<?php

//Have the function PrimeTime(num) take the num parameter being passed and return the string true if the parameter is
// a prime number, otherwise return the string false. The range will be between 1 and 2^16.

function PrimeTime($num) {
    if ($num <= 1) return false;
    $count = round($num/2) +2;
    for($i = 2; $i < $count; $i++)
        if ( $num % $i == 0 )
            return 'false';
    return 'true';
}
echo  PrimeTime(97);

