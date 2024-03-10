<?php
//test dome in this task page got freezed check solution below
function matchKeyCombo(string $sequence): bool
{
    $QEE = 0;
    $res = false;
    $arr = explode('A', $sequence);
    foreach ($arr as $value) {
        if ($value == 'QEE') {
            $QEE += 1;
            $res = true;
        } elseif ($value == 'ZCC') {
            $QEE -= 1;
            $res = true;
        }
        if ($QEE == 0 && $res == true) {
            return true;
        }
    }
    return false;
}

echo matchKeyCombo("QEEAZCC") ? "True" : "False";