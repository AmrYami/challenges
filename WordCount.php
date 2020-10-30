<?php

/**
 * Have the function WordCount(str) take the str string parameter being passed and
 * return the number of words the string contains (ie. "Never eat shredded wheat"
 * would return 4). Words will be separated by single spaces.
 *
 * Input = "Hello World" -> Output = 2
 * Input = "one 22 three" -> Output = 3
 *
 */


function WordCount($string)
{
    $word_array = explode(' ', $string);
    return count($word_array);
}

echo WordCount("one 22 three");