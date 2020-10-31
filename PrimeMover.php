<?php

//Have the function PrimeMover(num) return the numth prime number. The range will be from 1 to 10^4.
// For example: if num is 16 the output should be 53 as 53 is the 16th prime number.


function PrimeMover($num)
{
    $prime = 0;
    for ($i = 0; $i < 10000; $i++) {
        if (PrimeTime($i))
            $prime++;
        if ($prime == $num)
            return $i;
    }
}

function PrimeTime($num)
{
    if ($num <= 1) return false;
    if ($num == 2) return true;

    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0 && $num != $i)
            return false;
    }
    return true;
}

echo PrimeMover(16);