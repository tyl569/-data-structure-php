<?php

/**
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/maximum-subarray
 *
 * 给定一个整数数组 nums ，找到一个具有最大和的连续子数组（子数组最少包含一个元素），返回其最大和。
 * 示例:
 * 输入: [-2,1,-3,4,-1,2,1,-5,4]
 * 输出: 6
 * 解释: 连续子数组 [4,-1,2,1] 的和最大，为 6。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums)
    {
        $max = $nums[0];
        for ($i = 1; $i < count($nums); $i++) {
            if ($nums[$i - 1] > 0) {
                $nums[$i] += $nums[$i - 1];

            }
            $max = max($max, $nums[$i]);
        }
        return $max;
    }
}

echo "======= test case start =======\n";
echo (new Solution())->maxSubArray([-2, 1, -3, 4, -1, 2, 1, -5, 4]);
echo "======= test case end =======\n";