<?php
/*
 * Using the PHP language, have the function DistinctList(arr) take the array of numbers
 * stored in arr and determine the total number of duplicate entries.
 * For example if the input is [1, 2, 2, 2, 3] then your program should output 2 because there are two
 * duplicates of one of the elements.
 *
 * Input = 0,-2,-2,5,5,5 Output = 3
 * Input = 100,2,101,4 Output = 0
 */


function DistinctList($arr)
{
    return count($arr) - count(array_unique($arr));
}

echo DistinctList([100,2,101,4]);
