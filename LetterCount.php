<?php

/*
 * Using the PHP language, have the function LetterCount(str) take the str parameter
 * being passed and return the first word with the greatest number of repeated letters.
 * For example: "Today, is the greatest day ever!" should return greatest because it has 2 e's (and 2 t's)
 * and it comes before ever which also has 2 e's.
 * If there are no words with repeating letters return -1. Words will be separated by spaces.
 */
function LetterCount($str)
{
    $words = explode(' ', $str);
    $res = "-1";
    $repeats = 0;

    foreach ($words as $word) {
        $repeated_alph = getRepeats($word);
        if ($repeated_alph > $repeats) {
            $repeats = $repeated_alph;// set repeats count
            $res = $word;
        }
    }
    return $res;
}

function getRepeats($word)
{
    $sum = 0;
    $word_alph = str_split($word);
    $count_repeated_alphapets = array_count_values($word_alph);// get count chars in word
    foreach ($count_repeated_alphapets as $item) {
        if ($item > 1)
            $sum++;// if $item more than 1 then this char is repeated char
    }
    return $sum;
}

echo LetterCount("Today, is the greatest day ever!");