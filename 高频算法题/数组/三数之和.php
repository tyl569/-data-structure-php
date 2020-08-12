<?php

/**
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/leetbook/read/2020-top-interview-questions/xob4wg/
 * 给你一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，使得 a + b + c = 0 ？请你找出所有满足条件且不重复的三元组。
 *
 * 注意：答案中不可以包含重复的三元组。
 *
 *  
 *
 * 示例：
 *
 * 给定数组 nums = [-1, 0, 1, 2, -1, -4]，
 *
 * 满足要求的三元组集合为：
 * [
 * [-1, 0, 1],
 * [-1, -1, 2]
 * ]
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums)
    {
        sort($nums);
        $arr = [];
        $len = count($nums);
        for ($i = 0; $i < $len; $i++) {
            if ($nums[$i] > 0) {
                break;
            }
            if ($i > 0 && $nums[$i - 1] == $nums[$i]) {
                continue;
            }
            $m = $i + 1;
            $n = $len - 1;
            while ($m < $n) {
                $sum = $nums[$i] + $nums[$m] + $nums[$n];

                if ($sum > 0) {
                    $n--;
                } else if ($sum < 0) {
                    $m++;
                } else if ($sum == 0) {
                    $arr[] = [
                        $nums[$i], $nums[$m], $nums[$n]
                    ];
                    while ($m < $n && $nums[$m] == $nums[$m + 1]) {
                        $m++;
                    }
                    while ($m < $n && $nums[$n] == $nums[$n - 1]) {
                        $n--;
                    }
                    $m++;
                    $n--;

                }
            }
        }
        return $arr;
    }
}

echo "======= test case start =======\n";
$ret = (new Solution())->threeSum([-1, 0, 1, 2, -1, -4]);
var_dump($ret);
$ret = (new Solution())->threeSum([0, 0, 0]);
var_dump($ret);
$ret = (new Solution())->threeSum([-1, 0, 1, 0]);
var_dump($ret);
$ret = (new Solution())->threeSum([-2, 0, 0, 2, 2]);
var_dump($ret);
echo "======= test case start =======\n";
