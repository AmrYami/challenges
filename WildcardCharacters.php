<?php
/**
 * Challenge
 *
 * Have the function WildcardCharacters(str) read str which will contain two strings separated by a space.
 * The first string will consist of the following sets of characters: +, *, and {N} which is optional. The plus (+)
 * character represents a single alphabetic character, the asterisk (*) represents a sequence of the same character of
 * length 3 unless it is followed by {N} which represents how many characters should appear in the sequence where N
 * will be at least 1. Your goal is to determine if the second string exactly matches the pattern of the first string
 * in the input.
 *
 * For example: if str is "++*{5} gheeeee" then the second string in this case does match the pattern, so your
 * program should return the string true. If the second string does not match the pattern your program should
 * return the string false.
 *
 */

/**
 * @param string $str
 * @return bool
 */
function WildcardCharacters(string $str): bool
{
    if (!strpos($str, ' ') || substr_count($str, ' ') > 1) {
        return false;
    }

    $characters  = explode(' ', trim($str));
    $results     = str_split(strtolower($characters[1]));
    $charList    = str_split($characters[0]);
    $countString = 0;

    for ($key = 0; $key < count($charList); $key++) {

        switch ($charList[$key])
        {
            case '+':

                if (!preg_match("/^[a-z]/", $results[$countString])) {
                    return false;
                }

                $countString++;
                break;

            case '*':

                if ($key + 1 < count($charList) && $charList[$key + 1] === '{') {

                    $quantity = getQuantityBySpecialCharacter($charList, $key + 1);

                    if (!$quantity || !verifySpecialCharacter($results, $countString, (int)$quantity['value'])) {
                        return false;
                    }

                    $key = $quantity['position'];
                    $countString += $quantity['value'];
                }
                else {

                    if (!verifySpecialCharacter($results, $countString, 3)) {
                        return false;
                    }

                    $countString += 3;
                }

                break;

            case '{':

                $quantity = getQuantityBySpecialCharacter($charList, $key);

                if (!$quantity || !verifySpecialCharacter($results, $countString, (int)$quantity['value'])) {
                    return false;
                }

                $key = $quantity['position'];
                $countString += $quantity['value'];

                break;

            default:
                return false;
        }
    }

    return $countString === count($results);
}

/**
 * @param array $results
 * @param int $position
 * @param int $quantity
 * @return bool
 */
function verifySpecialCharacter(array $results, int $position, int $quantity): bool
{
    if ($position - 1 + $quantity < count($results)) {

        for ($i = $position; $i < $position + $quantity; $i++) {

            if ($results[$position] !== $results[$i]) {
                return false;
            }
        }

        return true;
    }

    return false;
}

/**
 * @param array $characters
 * @param int $position
 * @return array|null
 */
function getQuantityBySpecialCharacter(array $characters, int $position): ?array
{
    $value = '';

    for ($i = $position + 1; $i < count($characters); $i++) {

        if (!preg_match("/^[0-9]/", $characters[$i]) && !$value) {
            return null;
        }
        elseif ($characters[$i] === '}') {
            return [
                'position' => $i,
                'value' => (int)$value
            ];
        }

        $value .= $characters[$i];
    }

    return null;
}

// keep this function call here
echo WildcardCharacters('++*{5} gheeeee') ? 'true' : ' false';