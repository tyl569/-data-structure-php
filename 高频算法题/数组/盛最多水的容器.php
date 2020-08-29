<?php

/**
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/leetbook/read/2020-top-interview-questions/xocc0e/
 *
 * 给你 n 个非负整数 a1，a2，...，an，每个数代表坐标中的一个点 (i, ai) 。在坐标内画 n 条垂直线，垂直线 i 的两个端点分别为 (i, ai) 和 (i, 0)。找出其中的两条线，使得它们与 x 轴共同构成的容器可以容纳最多的水。
 *
 * 说明：你不能倾斜容器，且 n 的值至少为 2。
 *
 * 示例：
 *
 * 输入：[1,8,6,2,5,4,8,3,7]
 * 输出：49
 */
class Solution
{

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height)
    {
        $max = 0;
        for ($i = 0; $i < count($height); $i++) {
            for ($j = $i + 1; $j < count($height); $j++) {
                $len = $j - $i;
                $max = max($max, $len * min($height[$i], $height[$j]));
            }
        }
        return $max;
    }

    function maxArea2($height)
    {
        $left = 0;
        $right = count($height) - 1;
        $max = 0;
        while ($left < $right) {
            $max = max($max, ($right - $left) * min($height[$left], $height[$right]));
            if ($height[$left] < $height[$right]) {
                $left++;
            } else {
                $right--;
            }
        }
        return $max;
    }
}

echo "======= test case start =======\n";
echo (new Solution())->maxArea([1, 8, 6, 2, 5, 4, 8, 3, 7]) . "\n";
echo (new Solution())->maxArea2([1, 8, 6, 2, 5, 4, 8, 3, 7]) . "\n";
echo (new Solution())->maxArea2([2, 3, 4, 5, 18, 17, 6]) . "\n";
echo "======= test case end =======\n";