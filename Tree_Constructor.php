<?php
//Description: For this challenge you will determine if an array of integer
// pairs can form a binary tree properly.
//first make variable array and  push all children to his parents and check
// if parent has more than 2 children will return false
//
// second make another variable array and push all parents to his children and check
// if children has more than 1 parent will return false

$parents = [];
$children = [];

function TreeConstructorTest($strArr){
    foreach ($strArr as $value){
        $result = str_replace('(', '', $value);
        $result = str_replace(')', '', $result);
        $result = explode(',', $result);
        $parents[$result[1]][] = $result[0];// push all children to his parents
        if (count($parents[$result[1]]) > 2)//if parent has more than 2 children will return false
            return 'false';
        $children[$result[0]][] = $result[1];// push all parents to his children
        if (count($children[$result[0]]) > 1)//if children has more than 1 parent will return false
            return 'false';
    }
    return 'true';

}
echo TreeConstructorTest(["(2,3)", "(1,2)", "(4,9)", "(9,3)", "(12,9)", "(6,4)"]);

?>