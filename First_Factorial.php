<?php

function factorial($num) {
    return array_product(range(1, $num));
}
// keep this function call here
echo factorial(5);