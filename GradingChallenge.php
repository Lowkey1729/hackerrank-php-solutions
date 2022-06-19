<?php

/*
 * Complete the 'gradingStudents' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY grades as parameter.
 */

function gradingStudents($grades)
{
    //Write your code here
    $rounded = [];
    foreach ($grades as $grade) {
        $next_multiple_of_five_from_grade = closestMultipleOfFive($grade);
        $rounded[] = roundUpByGrade($grade, $next_multiple_of_five_from_grade);

    }

    return $rounded;


}


function closestMultipleOfFive($grade)
{
    $multiple = $grade;
    if (isMultipleOfFive($grade)) {
        return $grade;
    }
    for ($i = 1; $i <= 5; $i++) {
        if(isMultipleOfFive($multiple)){
            break;
        }
        $multiple += 1;

    }

    return $multiple;


}

function isMultipleOfFive($grade)
{
    return ($grade % 5) == 0;
}

function roundUpByGrade($grade, $next_multiple_of_five_from_grade)
{
    $difference = abs($grade - $next_multiple_of_five_from_grade);

    return ($difference < 3) && ($grade >= 38) ?
        $next_multiple_of_five_from_grade : $grade ;

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$grades_count = intval(trim(fgets(STDIN)));

$grades = array();

for ($i = 0; $i < $grades_count; $i++) {
    $grades_item = intval(trim(fgets(STDIN)));
    $grades[] = $grades_item;
}

$result = gradingStudents($grades);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($fptr);
