<?php
/*
 * Using the PHP language, have the function Division(num1,num2)
 * take both parameters being passed and return the Greatest Common Factor.
 * That is, return the greatest number that evenly goes into both numbers with no remainder.
 * For example: 12 and 16 both are divisible by 1, 2, and 4 so the output should be 4.
 * The range for both parameters will be from 1 to 10^3.
 * Input = 7 & num2 = 3 Output = 1
 * Input = 36 & num2 = 54 Output = 18
 */
function Division($num1, $num2) {
    $firstDiv = getDivisionNums($num1);
    $secondDiv = getDivisionNums($num2);
    $result = array_intersect($firstDiv, $secondDiv);
    return max($result);
}

function getDivisionNums($num) {
    $divisors = array();
    for($i = 1; $i < $num; $i ++) {
        if ($num % $i == 0) {
            $divisors [] = $i;
        }
    }
    return $divisors;
}
echo Division(36, 54);