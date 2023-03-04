<?php

$matrix = [];
$tempMatrix = [];
$numberOfIsland = 0;

function islands(
    $matrix,
    $n,
    $firstRow = 0,
    $secondRow = 1,
    $firstIndex = 0,
    $secondIndex = 0,
    $tree = false,
    $tempN = []
) {
    $GLOBALS['matrix'] = $matrix;
    if ($secondIndex >= count($GLOBALS['matrix'][0])) {
        $secondIndex = 0;
    }
    $firstRow = $firstRow;
    $firstIndex = $firstIndex;
    $secondRow = $secondRow;
    $secondIndex = $secondIndex;
    $x = $matrix[$firstRow][$firstIndex];//first index
    $y = $matrix[$secondRow][$secondIndex];// next index
    if ($matrix[$secondRow][$secondIndex] == 1) {
        //$n next array values push array[index of array, index in array, value]
        $n[] = [$secondRow, $secondIndex, $matrix[$secondRow][$secondIndex]];
    }

    if (isset($matrix[$firstRow][$firstIndex]) &&
        $x == 1 && !$tree) {
        $GLOBALS['numberOfIsland'] += 1;
        $GLOBALS['matrix'][$firstRow][$firstIndex] = 2;
        $firstIndex += 1;
        $secondIndex += 1;
        $x = $matrix[$firstRow][$firstIndex];
        $y = $matrix[$firstRow][$firstIndex + 1];

        if ($matrix[$secondRow][$secondIndex] == 1) {
            $n[] = [$secondRow, $secondIndex, $matrix[$secondRow][$secondIndex]];
            $n = array_map("unserialize", array_unique(array_map("serialize", $n)));
        }

        islands($GLOBALS['matrix'], $n, $firstRow, $secondRow, $firstIndex, $secondIndex);
    } elseif (!$tree) {
        $GLOBALS['tempMatrix'][] = $GLOBALS['matrix'][0];
        array_shift($GLOBALS['matrix']);
        islands($GLOBALS['matrix'], $n, $firstRow, $secondRow, $firstIndex, $secondIndex, true);
    } else {
        $n = array_map("unserialize", array_unique(array_map("serialize", $n)));
        if ($GLOBALS['matrix'][$n[0][0]][$n[0][1]] == 1) {
            $GLOBALS['matrix'][$n[0][0] - 1][$n[0][1]] = 2;
            $tempN[] = [$n[0][0], $n[0][1], $GLOBALS['matrix'][$n[0][0]][$n[0][1]]];
        }

        array_shift($n);
        if (!count($n)) {

            $GLOBALS['matrix'][$n[0][0] - 1][$n[0][1]] = 2;
            $GLOBALS['tempMatrix'][] = $GLOBALS['matrix'][0];
            array_shift($GLOBALS['matrix']);
            echo '<pre>';
            print_r($GLOBALS['matrix'][$n[0][0]]);
            print_r($n);
            print_r($tempN);
            print_r($GLOBALS['matrix'][0]);
            print_r($GLOBALS['tempMatrix']);
            echo '</pre>';
            die();
            $n = $tempN;
            $tempN = [];

        }

        islands($GLOBALS['matrix'], $n, $firstRow, $secondRow, $firstIndex, $secondIndex, true);

    }
}


islands([
    ["1", "1", "1", "1", "0"],
    ["1", "1", "0", "1", "0"],
    ["1", "1", "1", "0", "0"],
    ["0", "0", "0", "0", "1"]
], []);