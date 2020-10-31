<?php
//Have the function SwapCase(str) take the str parameter and swap the case of each character.
// For example: if str is "Hello World" the output should be hELLO wORLD. Let numbers and symbols stay the way they are.


function swapCase($str)
{

    $swapedcase = '';
    for ($i = 0; $i < strlen($str); $i++) {
        if (ctype_upper($str[$i])) {
            $swapedcase .= strtolower($str[$i]);
        } elseif (ctype_lower($str[$i])) {
            $swapedcase .= strtoupper($str[$i]);
        } else
            $swapedcase .= strtoupper($str[$i]);
    }
    return $swapedcase;

}

echo swapCase("Hello World");