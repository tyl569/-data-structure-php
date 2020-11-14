<?php

/**
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/leetbook/read/2020-top-interview-questions/xrhtat/
 *
 * 给定一个按照升序排列的整数数组 nums，和一个目标值 target。找出给定目标值在数组中的开始位置和结束位置。
 * 你的算法时间复杂度必须是 O(log n) 级别。
 * 如果数组中不存在目标值，返回 [-1, -1]。
 * 示例 1:
 * 输入: nums = [5,7,7,8,8,10], target = 8
 * 输出: [3,4]
 * 示例 2:
 * 输入: nums = [5,7,7,8,8,10], target = 6
 * 输出: [-1,-1]
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target)
    {
        $res = [-1, -1];
        $leftIndex = $this->helper($nums, $target, true);

        if ($leftIndex == count($nums) || $nums[$leftIndex] != $target) {
            return $res;
        }
        $res[0] = $leftIndex;
        $res[1] = $this->helper($nums, $target, false) - 1;
        return $res;
    }

    function helper($nums, $target, $left)
    {
        $low = 0;
        $height = count($nums);

        while ($low < $height) {
            $mid = intval(($low + $height) / 2);
            if ($nums[$mid] > $target || ($left && $target == $nums[$mid])) {
                $height = $mid;
            } else {
                $low = $mid + 1;
            }
        }
        return $low;
    }
}

echo "======= test case start =======\n";
var_dump((new Solution())->searchRange([5, 7, 7, 8, 8, 10], 8)) . "\n";
echo "======= test case end =======\n";