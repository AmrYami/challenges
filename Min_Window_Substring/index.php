<?php
function findSubString(&$str, &$pat)
{
    $keys = getBlocks($str, $pat);
    if (!$keys)
        echo "No such window exists";
    $x = 0;
    $start = 'a';
    $end = 0;
    $patNum = 0;
    $pattern = $keys['splitPat'];
    $lowestNumber = count($keys['mainString']);// to set the lowest number between chars we ask
    while ($keys) {
        if (in_array($keys['mainString'][$x], $keys['splitPat'])) {// if key from main string in pattern
            if ($start == 'a')
                $start = $x;//set start index
            else
                $end = $x;//set end index
            if (($key = array_search($keys['mainString'][$x], $pattern)) !== false) {
                unset($pattern[$key]);// remove char from pattern
            }
            if (count($pattern) == 0) {// if we get all chars pattern in main string reset all values and set the result
                $x = $keys['keys'][$patNum];// to start search from the index we end and remove un related chars
                $patNum++;
                if ($start == 0 && $end == 0) {
                    $startEndChar = ['start' => 0, 'end' => 0];// set start and and keys
                    break;
                }
                if ($start == (count($keys['mainString']) -1) && $end == 0) {
                    $resu = count($keys['mainString']) - 1 ;
                    $startEndChar = ['start' => $resu, 'end' => $resu];// set start and and keys
                    break;
                }
                $startEndChar1[] = ['start' => $x == 0 ? 0 : $start, 'end' => $end, 'res' => $end - $start
                    ,'test' => count($keys['mainString'])];// set start and and keys
                $startEndChar1[] = ['start' => $x == 0 ? 0 : $start, 'end' => $end];// set start and and keys

                $res = $end - $start;
                if ($lowestNumber >= $res) {
                    $lowestNumber = $res;
                    $startEndChar = ['start' => $x == 0 ? 0 : $start, 'end' => $end];// set start and and keys
                }
                $start = 'a';
                $end = 0;
                $pattern = $keys['splitPat'];// reset patern to reloop
            }
            if (end($keys['keys']) == $x) // end loop
                break;
        }
        $x++;
        if ($x > 10000)// end loop after 10000 if condition doesnt work
            break;
    }
    if ($startEndChar)
        return 'Smallest window is : ' . implode(array_slice($keys['mainString'], $startEndChar['start'], (($startEndChar['end'] + 1) - $startEndChar['start'])));// cut result from array to return it as string
    else
        return "No such window exists";
}

function getBlocks($str, $pat)
{
    $keys = [];
    $split = str_split($str, 1);// convert main string to array
    $splitPat = str_split($pat, 1);// convert pattern string to array
    if (count($split) < count($splitPat))
        return false;
    $result['mainString'] = $split; // main string in array
    $result['splitPat'] = $splitPat;// pattern string in array
    for ($i = 0; $i < count($splitPat); $i++) {// get keys of chars pattern in main string
        $keys[] = array_keys($split, $pat[$i], true);
    }
    $keys = array_merge(...$keys);//merge all blocks in main string
    sort($keys);
    $result['keys'] = array_unique($keys);// all indexes of chars in the main string we need to search about
    return $result;
}

$str = "this is a test string";
$pat = "tist";
echo findSubString($str, $pat);

?>
