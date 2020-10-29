<?php

/*
 * Using the PHP language, have the function ArrayAddition(arr) take the array of numbers stored in arr
 * and return the string true if any combination of numbers in the array can be added up to equal the largest number
 * in the array, otherwise return the string false.
 *
 * For example: if arr contains [4, 6, 23, 10, 1, 3] the output should return true because 4 + 6 + 10 + 3 = 23.
 * The array will not be empty, will not contain all the same elements, and may contain negative numbers.
 * Input = 5,7,16,1,2 Output = "false"
 * Input = 3,5,-1,8,12 Output = "true"
 */
function ArrayAddition($arr)
{
    $highestVal = max($arr);// get the highest val
    $highestKeyOfVal = array_keys($arr, $highestVal);//get the key of max val
    unset($arr[$highestKeyOfVal[0]]);//remove from array
    $resultSumArray = array_sum($arr);//sum values in array
    if ($highestVal == $resultSumArray)
        return 'true';
    elseif ($resultSumArray > $highestVal) {
        $val = $resultSumArray - $highestVal;// get val after after minus max val from array
        if (in_array($val, $arr))// if result in array then the combination is true
            return 'true';
        else {
            return checkCombinationsNumbers($arr, $highestVal);


        }
    }
    return 'false';
}

function checkCombinationsNumbers($arr, $highestVal)
{
    $s = 0;
    $cloneArray = $arr;
    rsort($cloneArray);
    $checksArray = [];
    while ($arr) {
        $val = $cloneArray[$s];
        unset($cloneArray[$s]);
        foreach ($cloneArray as $value) {
            if ($value != '' && $val != '')
                $checksArray[] = [$val, $value];// get couples from array
        }
        $cloneArray = $arr;

        if ($s == count($arr))
            break;
        $s++;
    }
    return getSummisionNumbers($checksArray, $highestVal);
}

function getSummisionNumbers($checksArray, $highestVal)
{
    foreach ($checksArray as $value) {
        if (array_sum($value) == $highestVal)// if any sum couples equal $highestVal
            return 'true';
    }
    return 'false';
}

echo ArrayAddition([5, 7, 16, 9, -2]);
