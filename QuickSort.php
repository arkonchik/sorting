<?php

function getPartitionAndSwap(&$array, $startIndex, $endIndex)
{
    $partitionElement = $array[floor(($startIndex + $endIndex)/2)];

    $l = $startIndex;
    $r = $endIndex;

    do {
        while ($array[$l] < $partitionElement) {
            ++$l;
        }

        while ($array[$r] > $partitionElement) {
            --$r;
        }

        if ($l <= $r) {
            $tmpValue = $array[$l];
            $array[$l] = $array[$r];
            $array[$r] = $tmpValue;
            ++$l;
            --$r;
        }
    } while ($l <= $r);

    return $l;
}

function quickSortRecursive(&$arrayThatSort, $startIndex, $endIndex)
{
    if ($endIndex > $startIndex) {
        $partitionPosition = getPartitionAndSwap($arrayThatSort, $startIndex, $endIndex);
        quickSortRecursive($arrayThatSort, $startIndex, $partitionPosition - 1);
        quickSortRecursive($arrayThatSort, $partitionPosition, $endIndex);
    }
}

function quickSort(&$arrayThatSort)
{
    quickSortRecursive($arrayThatSort, 0, count($arrayThatSort) - 1);
}

$arrayThatSort = array(rand(-100, 100), rand(-100, 100), rand(-100, 100), rand(-100, 100), rand(-100, 100), rand(-100, 100), rand(-100, 100));
quickSort($arrayThatSort);
var_dump($arrayThatSort);