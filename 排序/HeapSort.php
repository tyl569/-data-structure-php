<?php

function heapAdjust(&$arr, $start, $len)
{
    for ($i = $start * 2 + 1; $i < $len; $i = $i * 2 + 1) {
        if ($i != $len - 1 && $arr[$i] < $arr[$i + 1]) {
            $i++;
        }
        if ($arr[$start] >= $arr[$i]) {
            break;
        }

        list($arr[$start], $arr[$i]) = array($arr[$i], $arr[$start]);
        $start = $i;
    }
}

function heapSort(&$arr)
{
    $len = count($arr);

    for ($i = ($len >> 1) - 1; $i >= 0; $i--) {
        heapAdjust($arr, $i, $len);
    }

    for ($i = $len - 1; $i >= 0; $i--) {
        list($arr[0], $arr[$i]) = array($arr[$i], $arr[0]);
        heapAdjust($arr, 0, $i);
    }
}

$arr = [3, 2, 1, 4, 5, 8, 5, 7];
heapSort($arr);
var_dump($arr);
