<?php

/*
 php8
 * 1 - split first key in array as array and it wil be our matrix array
 * 2 - split every word in second array
 * 3 - will take first word and split it
 * 4 - get first char of word in matrix array and remove it from matrix array and add it in old chars array
 * 5 - get all chars between this char and put them in array as before, after, current
 * 6 - get next char of the word and search in array (before, after, current) if we get it remove it from matrix array
 * and add it in old chars array
 * 7 - if i didnt get the next char in matrix array remove it from old chars and add it again to word we search to research for it again
 * 8 -if i get it add it to old char and search for next char
 * 9 - after get all chars reset all data in matrix and split next word and oldChars
 * 10- the end get all words didnt get in matrix as array of words and implode it if there's no word return string true
 * **/

$letters = [];// the matrix array
$wordProccess = [];// current word
$startKey = ['level' => '0', 'key' => '0'];// start search from

function MatrixChallenge($strArr)
{
    $tempMat = $strArr[0];
    $wordsDontExist = [];
    $words = explode(',', $strArr[1]);// words
    // matrix array
    $mat = preg_split('/[\s,]+/', $strArr[0]);
    foreach ($mat as $chars) {
        if ($chars)
            $tmpLetters[] = str_split($chars);
    }
    // matrix array
    foreach ($words as $word) {
        $GLOBALS['letters'] = $tmpLetters;// set matrix as global variable
        $strArray = str_split($word);
        $GLOBALS['wordProccess'] = $strArray;// set current word as global variable
        $countFirstChar = preg_match_all('/[' . $word[0] . ']/', $tempMat);// count first char of word in matrix
        $res = startSearching($countFirstChar, $strArray);// start searching
        if (!$res)// if this word didnt exist in mat push it in $wordsDontExist
            $wordsDontExist[] = $word;
    }
    if (count($wordsDontExist))
        return implode(',', $wordsDontExist);
    return 'true';
}

function startSearching($countFirstChar, $tmp)
{
    $oldKeys = [];

    for ($s = 0; $s < $countFirstChar; $s++) {
        $GLOBALS['wordProccess'] = $tmp;// reset the word as a current word
        $n = 0;
        $res = getStartKey($GLOBALS['wordProccess'][$n]);// get start key in matrix to start
        if ($res != 'false') {
            // if there's result so the current char is exist so add it to oldKeys and remove it from global word and set next char in global start key and remove it from matrix
            $oldKeys[] = ['level' => $GLOBALS['startKey']['level'], 'key' => $GLOBALS['startKey']['key'], 'char' => $GLOBALS['wordProccess'][0]];
            array_shift($GLOBALS['wordProccess']);
            $GLOBALS['startKey'] = $res['res'];
            $GLOBALS['letters'][$GLOBALS['startKey']['level']][$GLOBALS['startKey']['key']] = '';
        }
        $i = 0;
        while (count($GLOBALS['wordProccess'])) {// get next char in word
            if ($i == 20)// all word less than 20 chars
                break;
            $result = storeKeys();// here get all keys between our char in matrix in (before, after, current)
            $GLOBALS['startKey'] = proccessMatching($result, $GLOBALS['wordProccess'][0]);// search for the next char in  (before, after, current)
            if ($GLOBALS['startKey']) {
                //if there's global start key add to oldKeys his place in matrix and remove it from word global and remove it from matrix
                $oldKeys[] = ['level' => $GLOBALS['startKey']['level'], 'key' => $GLOBALS['startKey']['key'], 'char' => $GLOBALS['wordProccess'][0]];
                array_shift($GLOBALS['wordProccess']);
                $GLOBALS['letters'][$GLOBALS['startKey']['level']][$GLOBALS['startKey']['key']] = '';
            } else{// if no
                if (count($oldKeys) == count($tmp) || !$oldKeys)
                    break;
                // remove last element in oldKeys to research for it again from matrix and also back it to word global
                array_unshift($GLOBALS['wordProccess'], $oldKeys[count($oldKeys)-1]['char']);
                array_pop($oldKeys);
            }
            if (!count($GLOBALS['wordProccess']))
                return true;
            $i++;
        }
    }
    return false;
}

function getStartKey($char)// here we search for the start key in matrix to start search
{
    for ($i = 0; $i < count($GLOBALS['letters']); $i++) {
        for ($l = 0; $l < count($GLOBALS['letters'][$i]); $l++) {
            if ($char == $GLOBALS['letters'][$i][$l]) {
                $res = ['level' => $i == 0 ? '0' : $i, 'key' => $l == 0 ? '0' : $l, 'char' => $char];
                return ['res' => $res];
            }
        }
    }
    return 'false';
}


function proccessMatching($result, $char)
{
    $loop = ['current', 'before', 'after'];
    foreach ($loop as $key) {
        foreach ($result as $value) {
            $foundChar = checkChar($value, $char);
            if ($foundChar)
                return $foundChar;
        }
    }
    return false;
}

function checkChar($value, $char)
{

    if (isset($GLOBALS['letters'][$value['level']][$value['start']]))
        if ($GLOBALS['letters'][$value['level']][$value['start']] == $char)
            return ['level' => $value['level'], 'key' => $value['start'], 'char' => $char];

    if (isset($GLOBALS['letters'][$value['level']][$value['middle']]))
        if ($GLOBALS['letters'][$value['level']][$value['middle']] == $char)
            return ['level' => $value['level'], 'key' => $value['middle'], 'char' => $char];

    if (isset($GLOBALS['letters'][$value['level']][$value['after']]))
        if ($GLOBALS['letters'][$value['level']][$value['after']] == $char)
            return ['level' => $value['level'], 'key' => $value['after'], 'char' => $char];

    return false;
}

function storeKeys()
{
    $before = [];
    $after = [];
    $current = [];
    if ($GLOBALS['startKey']['level'] > 0) {
        if ($GLOBALS['startKey']['key'] > 0)
            $before['start'] = ($GLOBALS['startKey']['key'] - 1) ?? '0';
        $before['middle'] = $GLOBALS['startKey']['key'] ?? '0';
        if ($GLOBALS['startKey']['key'] + 1 < count($GLOBALS['letters'][0]))
            $before['after'] = ($GLOBALS['startKey']['key'] + 1) ?? '0';
        $before['level'] = ($GLOBALS['startKey']['level'] - 1) ?? '0';
    }
    if ($GLOBALS['startKey']['level'] < (count($GLOBALS['letters']) - 1)) {
        if ($GLOBALS['startKey']['key'] > 0)
            $after['start'] = ($GLOBALS['startKey']['key'] - 1) ?? '0';
        $after['middle'] = $GLOBALS['startKey']['key'] ?? '0';
        if ($GLOBALS['startKey']['key'] + 1 < count($GLOBALS['letters'][0]))
            $after['after'] = ($GLOBALS['startKey']['key'] + 1) ?? '0';
        $after['level'] = ($GLOBALS['startKey']['level'] + 1) ?? '0';
    }
    if ($GLOBALS['startKey']['key'] > 0)
        $current['start'] = ($GLOBALS['startKey']['key'] - 1) ?? '0';
    $current['middle'] = $GLOBALS['startKey']['key'] ?? '0';
    if ($GLOBALS['startKey']['key'] + 1 < count($GLOBALS['letters'][0]))
        $current['after'] = ($GLOBALS['startKey']['key'] + 1) ?? '0';
    $current['level'] = ($GLOBALS['startKey']['level']) ?? '0';
    $current['char'] = $GLOBALS['letters'][$GLOBALS['startKey']['level']][$GLOBALS['startKey']['key']];
    $data = ['before' => $before, 'after' => $after, 'current' => $current];

    return $data;
}

echo MatrixChallenge(array("aaey, rrum, tgmn, ball", "raeymnl,xx"));
echo '<br>';
echo MatrixChallenge(array("aaey, rrum, tgmn, ball", "all,raeymnl,ball,mur,rumk,tall,true,trum,yes"));
echo '<br>';
echo MatrixChallenge(array("aaey, rrum, tgmn, ball", "all,ball,mur,raeymnl,tall,true,trum"));
