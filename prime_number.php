<?php

/*
 * For this challenge you will be returning a certain prime number
 * Input = 9 Output = 23
 * Input = 100 Output = 541
 * Input : 5 Output : 11
 * Input : 16 Output : 53
 * Input : 1049 Output : 8377
 */
function PrimeMover($num)
{
    $primeNumbersCount = 0;
    $i = 0;
    while ($num) {
        if (checkPrimeNumber($i))
            $primeNumbersCount++;
        if ($primeNumbersCount == $num)
            return $i;
        if ($primeNumbersCount > $num)
            break;
        $i++;
    }

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

echo PrimeMover(1049);
