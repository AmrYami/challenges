<?php

//Have the function OffLineMinimum(strArr) take the strArr parameter being passed which will be an array of integers
// ranging from 1...n and the letter "E" and return the correct subset based on the following rules.
// The input will be in the following format: ["I","I","E","I",...,"E",...,"I"] where the I's stand for
// integers and the E means take out the smallest integer currently in the whole set. When finished, your program
// should return that new set with integers separated by commas. For example: if strArr is
// ["5","4","6","E","1","7","E","E","3","2"] then your program should return 4,1,5.

function OffLineMinimum($strArr) {

    $newArr = array();
    $lowest = array();
    foreach ( $strArr as $number ) {
        if ( $number === 'E' && !empty( $newArr ) ) {
            $min_value = min($newArr);
            $lowest[]  = $min_value;
            $min_key   = array_keys( $newArr, $min_value );
            unset( $newArr[$min_key[0]] );
        }

        if ( $number !== 'E' ) {
            $newArr[] = $number;
        }
    }
    return implode( ',', $lowest );
}
echo OffLineMinimum(["5","4","6","E","4","1","7","E","E","3","2"]);