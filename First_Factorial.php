<?php

function FirstFactorial($num) {
    if ($num >= 1) {
        $total = $num;
        for ($i = 1; $i < $num; $i++) {
            $total = $total * $i;
        }
        return $total;
    }
    return false;
}

// keep this function call here
echo FirstFactorial(10);