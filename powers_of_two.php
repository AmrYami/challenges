<?php

//Have the function PowersofTwo(num) take the num parameter being passed which will be an integer and return the string
// true if it's a power of two. If it's not return the string false. For example if the input is 16 then your program
// should return the string true but if the input is 22 then the output should be the string false.
//((4 & (4-1)) == 0)
//This translates to this of course:
//((4 & 3) == 0)
//But what exactly is 4&3?
//    The binary representation of 4 is 100 and the binary representation of 3 is 011 (remember the & takes the binary representation of these numbers). So we have:
//100 = 4
//011 = 3
//Imagine these values being stacked up much like elementary addition. The & operator says that if both values are equal to 1 then the result is 1, otherwise it is 0. So 1 & 1 = 1, 1 & 0 = 0, 0 & 0 = 0, and 0 & 1 = 0. So we do the math:
//100
//011
//----
//000
//The result is simply 0. So we go back and look at what our return statement now translates to:
//return (4 != 0) && ((4 & 3) == 0);
//Which translates now to:
//return true && (0 == 0);
//return true && true;
//We all know that true && true is simply true, and this shows that for our example, 4 is a power of 2.
function PowersofTwo($num) {
    return !($num & ($num-1)) ? 'true' : 'false';
}
echo PowersofTwo(4);