<?php

/**
 * Have the function ExOh(str) take the str parameter being passed and return the string true if there is an equal
 * number of x's and o's, otherwise return the string false. Only these two letters will be entered in the string,
 * no punctuation or numbers. For example: if str is "xooxxxxooxo" then the output should return false because there
 * are 6 x's and 5 o's.
 *
 * Input = "xooxxo"  ->  Output = "true"
 * Input = "x"       ->  Output = "false"
 *
 */

function ExOh($str)
{
    $arr = str_split($str);
    $arrCountVal = array_count_values($arr);
    if (count($arrCountVal) < 2)
        return 'false';
    elseif (count(array_unique($arrCountVal)) == 1)
        return 'true';
    else
        return 'false';
}

echo ExOh('xooxxo');