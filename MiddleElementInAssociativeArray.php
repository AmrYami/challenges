<?php
//Associative array.
$cars = array(
    'car_1' => 'BMW',
    'car_2' => 'Ford',
    'car_3' => 'Toyota',
    'car_4' => 'verna',
    'car_5' => 'Mercedes'
);

function middleElement($cars)
{
//Get the length of the array.
    $arraySize = count($cars);

//Divide the size by 2 and round down.
    $arraySizeDivided = ceil($arraySize / 2) - 1;

//Get a list of all array keys in the array.
    $arrayKeys = array_keys($cars);

//Get the middle key.
    $middleKey = $arrayKeys[$arraySizeDivided];
    return $cars[$middleKey];
}

echo middleElement($cars);


echo '<br>';
// Function to calculate Odd
function oddProduct($n)
{
    $odd = 1;

    for ($i = $n; $i > 0; $i--) {
        // Loop to find even, odd product
        if ($i % 2 != 0)
            $odd *= $i;
    }
    return $odd;
}

echo oddProduct(5);
echo '<br>';
//find lost number in array
function getLostNumber($array = []){

$arr2 = range(1,max($array));

return array_diff($arr2,$array);
}
print_r(getLostNumber([1,2,3,4,5,6,7,9,11]));