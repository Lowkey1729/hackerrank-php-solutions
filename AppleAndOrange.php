<?php

/*
 * Complete the 'countApplesAndOranges' function below.
 *
 * The function accepts following parameters:
 *  1. INTEGER s
 *  2. INTEGER t
 *  3. INTEGER a
 *  4. INTEGER b
 *  5. INTEGER_ARRAY apples
 *  6. INTEGER_ARRAY oranges
 */

function countApplesAndOranges($s, $t, $a, $b, $apples, $oranges)
{
    // Write your code here
    $apples_distances = distanceOfFruitToTree($a, $apples);
    $oranges_distances = distanceOfFruitToTree($b, $oranges);
    $count_apples = numberOfFruitsInTheHouse($apples_distances, $s, $t);
    $count_oranges = numberOfFruitsInTheHouse($oranges_distances, $s, $t);

    echo $count_apples . "\n";
    echo $count_oranges . "\n";

}

function numberOfFruitsInTheHouse($fruits_location, $house_start, $house_end)
{
    $count = 0;
    foreach ($fruits_location as $location) {
        if(isWithinRange($location, $house_start, $house_end)){
            $count += 1;
        }
    }

    return $count;
}

function isWithinRange($value, $house_start, $house_end)
{
    return ($value >= $house_start) && ($value <= $house_end);
}

function distanceOfFruitToTree($tree_location, $fruits_location)
{
    $result = [];
    foreach ($fruits_location as $location) {
        $result[] = $location + $tree_location;
    }

    return $result;
}

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$s = intval($first_multiple_input[0]);

$t = intval($first_multiple_input[1]);

$second_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$a = intval($second_multiple_input[0]);

$b = intval($second_multiple_input[1]);

$third_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$m = intval($third_multiple_input[0]);

$n = intval($third_multiple_input[1]);

$apples_temp = rtrim(fgets(STDIN));

$apples = array_map('intval', preg_split('/ /', $apples_temp, -1, PREG_SPLIT_NO_EMPTY));

$oranges_temp = rtrim(fgets(STDIN));

$oranges = array_map('intval', preg_split('/ /', $oranges_temp, -1, PREG_SPLIT_NO_EMPTY));

countApplesAndOranges($s, $t, $a, $b, $apples, $oranges);
