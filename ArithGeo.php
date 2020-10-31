<?php

/**
 * Have the function ArithGeo(arr) take the array of numbers stored in arr and return the string "Arithmetic" if the
 * sequence follows an arithmetic pattern or return "Geometric" if it follows a geometric pattern. If the sequence
 * doesn't follow either pattern return -1. An arithmetic sequence is one where the difference between each of the
 * numbers is consistent, where as in a geometric sequence, each term after the first is multiplied by some constant or
 * common ratio. Arithmetic example: [2, 4, 6, 8] and Geometric example: [2, 6, 18, 54]. Negative numbers may be
 * entered as parameters, 0 will not be entered, and no array will contain all the same elements.
 *
 * Input = 5,10,15      -> Output = "Arithmetic"
 * Input = 2,4,16,24    -> Output = -1
 *
 */


function ArithGeo($arr)
{
    $result = array();
    $last_number = '';
    $between_arith = $arr[1] - $arr[0];
    $between_geo = $arr[1] / $arr[0];
    for ($i = 0; $i < count($arr); $i++) {

        if ($arr[$i] == $arr[0]) {
            $result['arith'] = 1;
            $result['geo'] = 1;
            $last_number = $arr[$i];
            continue;
        }

        if ($last_number + $between_arith == $arr[$i]) {
            $result['arith']++;
        }

        if ($last_number * $between_geo == $arr[$i]) {
            $result['geo']++;
        }

        $last_number = $arr[$i];
    }

    if ($result['geo'] == count($arr)) {
        return 'Geometric';
    } elseif ($result['arith'] == count($arr)) {
        return 'Arithmetic';
    } else {
        return '-1';
    }
}

echo ArithGeo([2, 6, 18, 54]);