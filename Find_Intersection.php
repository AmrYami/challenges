<?php
//Find Intersection
//HIDE QUESTION
//Have the function FindIntersection(strArr) read the array of strings stored in strArr which will contain 2 elements: the first element will represent a list of comma-separated numbers sorted in ascending order, the second element will represent a second list of comma-separated numbers (also sorted). Your goal is to return a comma-separated string containing the numbers that occur in elements of strArr in sorted order. If there is no intersection, return the string false.
//
//For example: if strArr contains ["1, 3, 4, 7, 13", "1, 2, 4, 13, 15"] the output should return "1,4,13" because those numbers appear in both strings. The array given will not be empty, and each string inside the array will be of numbers sorted in ascending order and may contain negative numbers.


function FindIntersection($strArr) {
    $first = preg_split('/[\s,]+/', $strArr[0]);//get all elements after remove space and , as array
    $second = preg_split('/[\s,]+/', $strArr[1]);//get all elements after remove space and , as array
    $intersect = array_intersect($first, $second);// compare arrays to get common values
    return count($intersect) ? implode(',', $intersect) : 'false';

}

// keep this function call here
echo FindIntersection(["1, 3, 9, 10, 17, 18", "1, 4, 9, 10"]);

//Input: array("1, 3, 4, 7, 13", "1, 2, 4, 13, 15")
//Output: 1,4,13
//Input: array("1, 3, 9, 10, 17, 18", "1, 4, 9, 10")
//Output: 1,9,10



