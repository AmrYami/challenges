<?php
//Coderbyte
//← Back to assessmentView instructions
//easyTime left: 0 hours, 1 minutes
//String Challenge
//Have the function StringChallenge(str) take the str parameter being passed which represents the parameters given to a command in an old PDP system. The parameters are alphanumeric tokens (without spaces) followed by an equal sign and by their corresponding value. Multiple parameters/value pairs can be placed on the command line with a single space between each pair. Parameter tokens and values cannot contain equal signs but values can contain spaces. The purpose of the function is to isolate the parameters and values to return a list of parameter and value lengths. It must provide its result in the same format and in the same order by replacing each entry (tokens and values) by its corresponding length.
//
//For example, if str is: "SampleNumber=3234 provider=Dr. M. Welby patient=John Smith priority=High" then your function should return the string "12=4 8=12 7=10 8=4" because "SampleNumber" is a 12 character token with a 4 character value ("3234") followed by "provider" which is an 8 character token followed by a 12 character value ("Dr. M. Welby"), etc.
//Examples
//Input: "letters=A B Z T numbers=1 2 26 20 numbersa=1 2 26 20 combine=true"
//Output: 7=7 7=9 7=4
//Input: "a=3 b=4 a=23 b=a 4 23 c="
//Output: 1=1 1=1 1=2 1=6 1=0
//Browse Resources
//Search for any help or documentation you might need for this problem. For example: array indexing, Ruby hash tables, etc.

//PHP8
//3125678910111213414

function StringChallenge($str)
{
$resultInString = '';
    $arr = explode('=', $str);
    $first = $arr[0];
    if (substr("$str", -1) == '=')
    $last = 0;
    else
    $last = $arr[count($arr) - 1];
    array_shift($arr);
    array_pop($arr);
    $arr1 = explode(' ', $arr[0]);
    array_shift($arr);
    $next = $arr1[count($arr1) - 1];
    array_pop($arr1);

//    $result[$first] = strlen(implode(' ', $arr1));
    $resultInString .= strlen($first) . '=' . strlen(implode(' ', $arr1)). ' ';
    $resulAsArray = recursive($arr, $next, $resultInString, $last);
//   $resultInString = swapToString($resulAsArray);
    return $resulAsArray;
}

function recursive($arr, $current, $resultInString, $last)
{
    $arr1 = explode(' ', $arr[0]);
    array_shift($arr);
    $next = $arr1[count($arr1) - 1];
    array_pop($arr1);
    $resultInString .= strlen($current) . '=' . strlen(implode(' ', $arr1)). ' ';
    if (count($arr) == 0) {
        $last = $last != 0 ? strlen($last) : '0';
        $resultInString .= strlen($next) . '=' . $last;
        return $resultInString;
    } else
        return recursive($arr, $next, $resultInString, $last);
}

echo StringChallenge("letters=A B Z T numbers=1 2 26 20 combine=true");
echo '<br>';
echo StringChallenge("a=3 b=4 a=23 b=a 4 23 c=");