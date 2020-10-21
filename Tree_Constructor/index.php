<?php

function TreeConstructor($strArr) {

    // Parents have up to 2 children and children have only one father.
    // $parents[$i] = [1,2]
    // $children[$i] = [1]

    $parents = [];
    $children = [];

    foreach($strArr as $item) {
        $item = str_replace('(', '', $item);
        $item = str_replace(')', '', $item);
        $item = explode(',', $item);

        $parents[$item[1]][] = $item[0];
        // if parent has more than 2 children it's not a binary tree
        if (count($parents[$item[1]]) > 2) {
            return "false";
        }
        $children[$item[0]][] = $item[1];
        if (count($children[$item[0]]) > 1) {
            return "false";
        }

    }


    // code goes here
    return "true";


}

// keep this function call here
echo TreeConstructor(["(2,3)", "(1,2)", "(4,9)", "(9,3)", "(12,9)", "(6,4)"]);
echo '<br><br><br><br><br><br>';

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