<?php
/**
 * Created by PhpStorm.
 * User: dwendling
 * Date: 7/17/17
 * Time: 8:35 PM
 */

/**
 * global finalArr
 */
$finalArr = [];
$number = readline("Enter an integer: ");
$int = intval($number);
$numSquared = pow($int,2);
$evenNum = $int % 2 === 0 ? true : false;
$startingRowNumber = 0;
if ($evenNum) {
        createSpiral($int, 1, 0);
//        createSpiral($int-2,$int*3+1, 1);
} else {
        createSpiral($int, 1, 0);
//        createSpiral($int-2, $int*3+2, 1);
}
function createSpiral($spiralSize, $startingNum, $iteration) {
    global $finalArr;
    $firstIteration = $iteration === 0;
    $sizeSquared = pow($spiralSize,2);
    $rightColumnCounter = $iteration;
    $bottomRowNumbers = [];
    $leftColumnNumbers = [];
    $counter = $iteration;
    for ($x = $startingNum; $x <= $startingNum + $sizeSquared; $x++) {
        if ($x < $startingNum + $spiralSize - 1) {
            $finalArr[$iteration][$counter] = $x . "\t";
        }
        if ($x === $startingNum + $spiralSize - 1) {
            if ($iteration === 0){
                $finalArr[$iteration][$counter] = $x . "\n";
            } else {
                $finalArr[$iteration][$counter] = $x . "\t";
            }
        }
        if ($x > $startingNum + $spiralSize - 1 && $x <= 2 *($startingNum + $spiralSize - 1) - ($startingNum)) {
            $rightColumnCounter += 1;
            for ($i = 0; $i < $startingNum + $spiralSize - 2; $i++) {
                $finalArr[$rightColumnCounter][$i+$iteration] = 0 . "\t";
            }
            if ($iteration === 0){
                $finalArr[$rightColumnCounter][$spiralSize - $iteration] = $x . "\n";
            } else {
                $finalArr[$rightColumnCounter][$spiralSize - $iteration] = $x . "\t";
            }
        }
        if ($x > 2 * ($startingNum + $spiralSize - 1) - ($startingNum - 1) && $x < 3 * ($startingNum + $spiralSize - 1) - ($startingNum - 1)) {
            $bottomRowNumbers[] = $x;
        }
        if ($x === 3 * ($startingNum + $spiralSize - 1) - 2) {
            $bottomRowNumbers[] = $x;
            $reverseBottomRow = array_reverse($bottomRowNumbers);
            foreach ($reverseBottomRow as $index => $num) {
                $finalArr[$rightColumnCounter][$index] = $num . "\t";
            }
        }
        if ($x > 3 * ($startingNum + $spiralSize - 1) - ($startingNum - 2) && $x < 4 * ($startingNum + $spiralSize - 1) - ($startingNum -4)) {
            $leftColumnNumbers[] = $x;
        }
        if ($x === 4 * ($startingNum + $spiralSize - 1) - ($startingNum - 4)) {
            $leftColumnNumbers[] = $x;
            $reverseLeftColumn = array_reverse($leftColumnNumbers);
            foreach ($reverseLeftColumn as $index => $num) {
                $finalArr[$index + 1][0] = $num . "\t";
            }
        }
        $counter+=1;
    }
}
foreach ($finalArr as $num){
    foreach($num as $cell){
        echo $cell;
    }
}
