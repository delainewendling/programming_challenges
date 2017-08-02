<?php

/**
 * Created by PhpStorm.
 * User: dwendling
 * Date: 7/26/17
 * Time: 3:38 PM
 */


$int = readline("Enter an Integer: ");
/**
 * global stringLength
 */
$stringLength =  strlen($int);
/**
 * global counter
 */
$counter = 0;
/**
 * global resetCounter
 */
$resetCounter = 0;
/**
 * global lastInt
 */
$lastInt = $int;


function parseInt($int, $iteration){
    global $counter;
    global $stringLength;
    $numArr = str_split(trim(strrev($int)));
    if (!array_key_exists($iteration+1, $numArr) || $counter > $stringLength ){
        return null;
    } else {
        for ($i = $iteration; $i < $stringLength - 1; $i++){
            $rightMostNum = intval($numArr[$iteration]);
            $nextNum = intval($numArr[$i + 1]);
            if ($rightMostNum > $nextNum) {
                $numArr[$iteration] = $nextNum;
                $numArr[$i + 1] = $rightMostNum;
                return [ 'index' => $i+1, 'numArr' => $numArr];
            }
        }
        return parseInt($int, $iteration + 1);
    }
    $counter += 1;
}

$pass = parseInt($int, 0);
if ($pass['index']){
    $numArr = $pass['numArr'];
    $index = $pass['index'];
    $secondHalf = array_splice($numArr, $index);
    array_splice($numArr, $index);
    rsort($numArr);
    $numArr = array_merge($numArr, $secondHalf);
    echo "The next largest number is: " . strrev(str_replace(",", "", implode(",", $numArr)));
} else {
    echo "There is no integer that can be created that is larger \t";
}

