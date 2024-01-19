<?php

//Array Challenge
//Have the function ArrayChallenge(strArr) read the matrix of numbers stored in strArr which will be a 2D matrix
// that contains only the integers 1, 0, or 2. Then from the position in the matrix where a 1 is, return the number
// of spaces either left, right, down, or up you must move to reach an enemy which is represented by a 2.
// You are able to wrap around one side of the matrix to the other as well. For example: if strArr is
// ["0000", "1000", "0002", "0002"] then this looks like the following:
//
//0 0 0 0
//1 0 0 0
//0 0 0 2
//0 0 0 2
//
//For this input your program should return 2 because the closest enemy (2) is 2 spaces away from the 1 by moving left to wrap to the other side and then moving down once. The array will contain any number of 0's and 2's, but only a single 1. It may not contain any 2's at all as well, where in that case your program should return a 0.
//Examples
//Input: ["000", "100", "200"]
//Output: 1
//Input: ["0000", "2010", "0000", "2002"]
//Output: 2
function closest_enemy($arr)
{
    $player = [];
    $enemy = [];
    $distance = 0;
    $rowLength = strlen($arr[0]);
    $board = count($arr);

    // iterate over the length of the board stored in arrWidth
    for ($i = 0; $i < $board; $i++) {

        // split each row within the board into singlular elements
        $row = str_split($arr[$i]);
        // set the length of each new split array for iteration
        $rowLength = count($row);

        for ($j = 0; $j < $rowLength; $j++) {
            // look for the player's starting position
            // if the player (1) is found then push in the player's index
            // && push the index of the row on the board into player array
            if ($row[$j] == 1) {
                $player[] = $j;
                $player[] = $i;
                // look for every enemy (2) on the board
                // if the enemy is found then push the enemy's index
                // && the index of the row on the board into the enemy array
            } else if ($row[$j] == 2) {
                $enemy[] = $j;
                $enemy[] = $i;
            }
        }
    }
    // declare variable for enemy array length
    // this is for basic optimization of iteration
    $enemyLength = count($enemy);

    // iterate over the length of the enemy array
    for ($i = 0; $i < $enemyLength; $i += 2) {
        // declare a newDistance for counting
        $newDistance = 0;
        // check if the nearest enemy is on the same row
        // use Math.abs in order to return an absolute (positive) integer
        // if the player's location minus the enemy's location is less than
        // the row's length / 2 then adjust the newDistance to that value

                if (abs($player[0] - $enemy[$i]) < $rowLength / 2) {
            $newDistance = abs($player[0] - $enemy[$i]);
        } else {
            // otherwise adjust the newDistance to rowLength - the player's location of the enemy's location
//            $newDistance = $rowLength - ($pl - $enemy[$j -1]);
            $newDistance =  $rowLength - abs( $player[0] -  $enemy[$i]);
        }
        // check for distance between the player and enemy up and down the board
            if (abs($player[1] - $enemy[$i+1]) < $board / 2) {
            // calculate the difference between the player location and the enemy's
            // add it to the overall count of the distance from above
            $newDistance += abs($player[1] - $enemy[$i+1]);
        } else {
            $newDistance += $board - abs($player[0] - $enemy[$i]);
        }

        // if the newDistance is less than the overall distance return it
        // otherwise set the distance equal to the shortest travel
        if ($distance == 0 || $newDistance < $distance) {
            $distance = $newDistance;
        }
    }
    // return the distance
    return $distance;
}


echo closest_enemy(["0000", "2010", "0000", "2002"]);
echo '<br>';
echo closest_enemy(["000", "100", "200"]);
echo '<br>';
echo closest_enemy(["0000", "2010", "0000", "2002"]);
echo '<br>';
echo closest_enemy(["0000", "1000", "0002", "0002"]);
