<?php

//Codeland Username Validation
//Have the function CodelandUsernameValidation(str) take the str parameter being passed and determine if the string is a valid username according to the following rules:
//
//1. The username is between 4 and 25 characters.
//2. It must start with a letter.
//3. It can only contain letters, numbers, and the underscore character.
//4. It cannot end with an underscore character.
//
//If the username is valid then your program should return the string true, otherwise return the string false.
//Examples
//Input: "aa_"
//Output: false
//Input: "u__hello_world123"
//Output: true


function CodelandUsernameValidation($str) {
    $length = strlen($str);
    if ($length < 4 || $length > 25) {
        return 'false';
    }
    if(!preg_match('/^[A-Za-z][A-Za-z0-9_]*[^_]$/', $str)){
        return 'false';
    }
    return 'true';
}

// keep this function call here
echo CodelandUsernameValidation('u__hello_world123');
