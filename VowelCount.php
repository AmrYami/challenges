<?php
function VowelCount($str)
{
    $vovels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
    $counter = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if (in_array($str[$i], $vovels)) {
            $counter++;
        }
    }
    return $counter;
}
echo VowelCount('parameter being passed');