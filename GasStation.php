<?php
function GasStation($strArr) {
    $start = 0;
    $next = 0;
    for ($i = 1; $i < count($strArr); $i++) {
        $station = explode(":", $strArr[$i]);
        $start += intval($station[0]);
        $next += intval($station[1]);
    }
    if ($next > $start) {
        return "impossible";
    }
    $newArr = array_merge(array_slice($strArr, 1), array_slice($strArr, 1));
    for ($i = 0; $i < $strArr[0]; $i++) {
        $con = 0;
        for ($index = $i; $index < count($newArr) - intval($strArr[0]) + $i; $index++) {
            $station = explode(":", $newArr[$index]);
            $start = intval($station[0]);
            $next = intval($station[1]);
            $con += $start;
            if ($next > $con) {
                break;
            } else {
                $con -= $next;
            }
            if ($index === count($newArr) - intval($strArr[0]) + $i - 1) {
                return $i + 1;
            }
        }
    }
}
// keep this function call here
echo GasStation(array("4","0:1","2:2","1:2","3:1"));