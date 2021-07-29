<?php

function BracketMatcher($str)
{
    $string = preg_replace('`()|([^)(]+)`', '', $str);//remove all chars without what we need
    $result = RemoveBrackets($string);// send to RemoveBrackets
    if (strlen($result) > 0)
        return '0';
    else
        return '1';
}

function RemoveBrackets($string)
{
    if (preg_match('/\(\)/', $string))// if string has what we need
        $string = preg_replace('/\(\)/', '', $string);// remove chars from string
    if (preg_match('/\(\)/', $string))// if string has what we need
        $string = RemoveBrackets($string); // recursive
    return $string;
}

// keep this function call here
echo BracketMatcher('fge ts(fop en(p hp2 ( 34 aa d://st din, r))');

echo '<br>';


echo main('[({[({[(asdf{[({[({[({}sdfg)]})]})]})]})]})]');

function main($A)
{
if($A == '')
        return false;
    $stack = new Stack();
    return $stack->matcher($A);

}

class Stack
{
private $count = 0;
private $turns = 6;
    public function matcher($str)
    {
        $res = $this->bracketsMatcher($str, '`()|([^)(]+)`', '/\(\)/');
        if ($this->count > $this->turns)
            return 'too match brackets';
        $res1 = $this->bracketsMatcher($str, '`()|([^}{]+)`', '/\{\}/');
        if ($this->count > $this->turns)
            return 'too match brackets';
        $res2 = $this->bracketsMatcher($str, '`()|([^][]+)`', '/\[\]/');
        if ($this->count > $this->turns)
            return 'too match brackets';

        if ($res && $res1 && $res2)
            return 'Successfully';
        else
            return 'Failed';
    }

    function bracketsMatcher($str, $pattenr, $find)
    {
        $this->count = 0;
        $string = preg_replace($pattenr, '', $str);//remove all chars without what we need
        $result = $this->RemoveBrackets($string, $find);// send to RemoveBrackets
        if ($result === "too match brackets")
            return 'too match brackets';
        elseif (strlen($result) > 0)
            return false;
        else
            return true;
    }

    function RemoveBrackets($string, $find)
    {
        $this->count = $this->count + 1;
        if (preg_match($find, $string))// if string has what we need
            $string = preg_replace($find, '', $string);// remove chars from string
        if (preg_match($find, $string))// if string has what we need
            $string = $this->RemoveBrackets($string, $find); // recursive
        return $string;
    }
}
