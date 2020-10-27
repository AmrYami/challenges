<?php
/*
 * For this challenge you will divide two numbers and return them in a certain format.
 * Using the PHP language, have the function DivisionStringified(num1,num2) take both parameters being passed,
 * divide num1 by num2, and return the result as a string with properly formatted commas.
 * If an answer is only 3 digits long, return the number with no commas (ie. 2 / 3 should output "1").
 * For example: if num1 is 123456789 and num2 is 10000 the output should be "12,345".
 * Input = 5 & num2 = 2 Output = "3"
 * Input = 6874 & num2 = 67 Output = "103"
 */

function DivisionStringified($num1, $num2)
{
    $number = round(($num1 / $num2), 0);
    if (strlen($number) > 3) {
        $number = number_format($number, 0, '', ',');
        return "$number";
    }
    return "$number";
}

echo DivisionStringified(123456789, 10000);
