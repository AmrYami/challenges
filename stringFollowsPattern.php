<?php
// PHP program to check if a string
// is of the form a^nb^n.

// Returns true str is of
// the form a^nb^n.
function isAnBn($str)
{
    $n = strlen($str);

    // After this loop 'i'
    // has count of a's
    $i = 0;
    for($i = 0; $i < $n; $i++)
        if ($str[$i] != 'a')
            break;

    // Since counts of a's and b's should
    // be equal, a should apear exactly
    // n/2 times
    if ($i * 2 != $n)
        return false;

    // Rest of the characters
    // must be all 'b'
    $j = 0;
    for($j = $i; $j < $n; $j++)
        if ($str[$j] != 'b')
            return false;

    return true;
}

// Driver code
$str = "abab";
if(isAnBn($str))
    echo "Yes";
else
    echo "No";

// This code is contributed by nitin mittal.
