<?php

// 时间复杂度 O(N * logN)
// 空间复杂度 O(N)
function merge($arr)
{
    if (count($arr) <= 1) {
        return $arr;
    }
    $start = 0;
    $end = count($arr);
    $mid = ($start + $end) >> 1;
    $left = array_slice($arr, 0, $mid);
    $right = array_slice($arr, $mid);
    $left = merge($left);
    $right = merge($right);
    return doMerge($left, $right);
}

function doMerge($left, $right)
{
    $res = [];
    $m = 0;
    $n = 0;
    $k = 0;
    while ($m < count($left) && $n < count($right)) {
        $res[$k++] = $left[$m] > $right[$n] ? $right[$n++] : $left[$m++];
    }
    while ($m < count($left)) {
        $res[$k++] = $left[$m++];
    }
    while ($n < count($right)) {
        $res[$k++] = $right[$n++];
    }
    return $res;
}

$arr = [3, 2, 1, 4, 5, 8, 5, 7];
var_dump(merge($arr));
