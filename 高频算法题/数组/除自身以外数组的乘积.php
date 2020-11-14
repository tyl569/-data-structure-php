<?php

/**
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/leetbook/read/2020-top-interview-questions/xr9nod/
 * 给你一个长度为 n 的整数数组 nums，其中 n > 1，返回输出数组 output ，其中 output[i] 等于 nums 中除 nums[i] 之外其余各元素的乘积。
 *  
 * 示例:
 * 输入: [1,2,3,4]
 * 输出: [24,12,8,6]
 *  
 * 提示：题目数据保证数组之中任意元素的全部前缀元素和后缀（甚至是整个数组）的乘积都在 32 位整数范围内。
 * 说明: 请不要使用除法，且在 O(n) 时间复杂度内完成此题。
 * 进阶：
 * 你可以在常数空间复杂度内完成这个题目吗？（ 出于对空间复杂度分析的目的，输出数组不被视为额外空间。）
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf($nums)
    {
        $left = [];
        $right = [];
        $res = [];
        for ($i = 0; $i < count($nums); $i++) {
            if (!isset($nums[$i - 1])) {
                $left[$i] = 1;
            } else {
                $left[$i] = $left[$i - 1] * $nums[$i - 1];
            }
        }

        for ($i = count($nums) - 1; $i >= 0; $i--) {
            if (!isset($nums[$i + 1])) {
                $right[$i] = 1;
            } else {
                $right[$i] = $right[$i + 1] * $nums[$i + 1];
            }
        }
        for ($i = 0; $i < count($nums); $i++) {
            $res[$i] = $left[$i] * $right[$i];
        }
        return $res;
    }

    function productExceptSelf2($nums)
    {
        $left = [];
        $right = [];
        $res = [];
        for ($i = 0; $i < count($nums); $i++) {
            if (!isset($nums[$i - 1])) {
                $left[$i] = 1;
            } else {
                $left[$i] = $left[$i - 1] * $nums[$i - 1];
            }
        }


        for ($i = count($nums) - 1; $i >= 0; $i--) {
            if (!isset($right[$i + 1])) {
                $right[$i] = 1;
            } else {
                $right[$i] = $right[$i + 1] * $nums[$i + 1];
            }
            $res[$i] = $left[$i] * $right[$i];
        }
        ksort($res);

        return $res;
    }
}


echo "======= test case start =======\n";
var_dump((new Solution())->productExceptSelf([1, 2, 3, 4])) . "\n";
var_dump((new Solution())->productExceptSelf2([1, 2, 3, 4])) . "\n";

echo "======= test case end =======\n";