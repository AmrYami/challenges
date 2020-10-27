<?php

/*
 * For this challenge you will determine the mode, the number that appears most frequently, in an array.
 * Using the PHP language, have the function SimpleMode(arr) take the array of numbers stored in arr and return
 * the number that appears most frequently (the mode).
 * For example: if arr contains [10, 4, 5, 2, 4] the output should be 4.
 * If there is more than one mode return the one that appeared in the array first
 * (ie. [5, 10, 10, 6, 5] should return 5 because it appeared first).
 * If there is no mode return -1.
 * The array will not be empty.
 * Input = 5,5,2,2,1 Output = 5
 * Input = 3,4,1,6,10 Output = -1
 *
 */

function SimpleMode($arr)
{
    $i = 0;
    $number = '';
    while ($arr) {
        $number = $arr[$i];
        unset($arr[$i]) ;
        if (in_array($number, $arr)) {
            return $number;
        }
        if (empty($arr))
            break;
        $i++;
    }
    return -1;
}

echo SimpleMode([5, 10, 10, 6, 5]);