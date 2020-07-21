<?php

// 时间复杂度 O(N * logN)
// 空间复杂度 O(logN)
function fastSort($arr)
{
    if (count($arr) <= 1) {
        return $arr;
    }
    $mid = $arr[0];
    $left = [];
    $right = [];
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] >= $mid) {
            $right[] = $arr[$i];
        } else {
            $left[] = $arr[$i];
        }
    }
    $left = fastSort($left);
    $right = fastSort($right);
    return array_merge($left, [$mid], $right);
}

$arr = [3,2,1,4,5,8,5,7];
var_dump(fastSort($arr));

