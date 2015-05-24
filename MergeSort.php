<?php

function mergeAndSort(&$arrayThatSort, $startIndex, $middleIndex, $endIndex)
{
    $sizeOfL = $middleIndex - $startIndex + 1;
    $sizeOfR =  $endIndex - $middleIndex;

    $L = array_slice($arrayThatSort, $startIndex, $sizeOfL);
    $R = array_slice($arrayThatSort, $middleIndex+1, $sizeOfR);

    $i = 0;
    $j = 0;
    $k = $startIndex;
    while ($i < $sizeOfL && $j < $sizeOfR) {
        $arrayThatSort[$k++] = ($L[$i] <= $R[$j]) ? $L[$i++] : $R[$j++];
    }

    while ($i < $sizeOfL) {
        $arrayThatSort[$k++] = $L[$i++];
    }

    while ($j < $sizeOfR) {
        $arrayThatSort[$k++] = $R[$j++];
    }

}

function divideAndSort(&$arrayThatSort, $startIndex, $endIndex)
{
    if ($endIndex > $startIndex) {

        $middleIndex = floor(($startIndex+$endIndex)/2);
        divideAndSort($arrayThatSort, $startIndex, $middleIndex);
        divideAndSort($arrayThatSort, $middleIndex+1, $endIndex);

        mergeAndSort($arrayThatSort, $startIndex, $middleIndex, $endIndex);
    }

}

function mergeSort(&$arrayThatSort)
{
    divideAndSort($arrayThatSort, 0, count($arrayThatSort)-1);
}

