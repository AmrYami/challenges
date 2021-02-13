<?php

//Questions Marks
//Have the function QuestionsMarks(str) take the str string parameter, which will contain single digit numbers,
// letters, and question marks, and check if there are exactly 3 question marks between every pair of two numbers
// that add up to 10. If so, then your program should return the string true, otherwise it should return the string false.
// If there aren't any two numbers that add up to 10 in the string, then your program should return false as well.
//
//For example: if str is "arrb6???4xxbl5???eee5" then your program should return true because there are exactly 3
// question marks between 6 and 4, and 3 question marks between 5 and 5 at the end of the string.
//Examples
//Input: "aa6?9"
//Output: false
//Input: "acc?7??sss?3rr1??????5"
//Output: true

function QuestionsMarks($str)
{
    $result = 'false';
    $check = false;
    $start = 0;
    $end = 0;
    $countQuestionMarks = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if (is_numeric($str[$i]) && !$check) {
            $start = $str[$i];//set the first number in $start
            $check = true;
        } elseif ($start) {//if start has value
            if ($str[$i] == '?')
                $countQuestionMarks++;//increase questionmark after get one
            if (is_numeric($str[$i]) && $check) {//get second number
                $end = $str[$i];
                if (($start + $end) == 10) {//if start and end == 10
                    if ($countQuestionMarks != 3)
                        return 'false';// if start and end = 10 and question mark != 3
                    else
                        $result = 'true';// if start and end = 10 and question mark = 3
                    $start = $str[$i];//put end value in start value
                    $end = 0;
                    $countQuestionMarks = 0;
                }
            }
        }
    }
    return $result;
}


echo QuestionsMarks("acc?7??sss?3rr1??????5");
