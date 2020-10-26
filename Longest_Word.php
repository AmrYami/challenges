<?php
function LongestWord($sen)
{
    if (preg_match('/[0-9]/', $sen)) {
        $array = explode(' ', $sen);// get all words as array
        $result = max($array);
    }else{
        $array = str_word_count($sen, 1);// get all words as array
        $result = getBiggestWord($array);
    }
    return $result;
}
function getBiggestWord($array){
    if (!count($array))
        return 'false';
    $arrayLengthValues = array_map('strlen', $array);// get all length elements in array
    $result = array_search(max($arrayLengthValues), $arrayLengthValues);
    return $array[$result];
}

// keep this function call here
//echo LongestWord('123456789 98765432');
echo LongestWord('function in PHP and is used to return information about words used in a string like total number word in the string, positions of the words in the string etc');