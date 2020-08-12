<?php
/**
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/leetbook/read/2020-top-interview-questions/xo1ou2/
 *
 * 由数组 [0,1,0,2,1,0,1,3,2,1,2,1] 表示的高度图，在这种情况下，可以接 6 个单位的雨水（蓝色部分表示雨水）。
 *
 * 示例:
 *
 * 输入: [0,1,0,2,1,0,1,3,2,1,2,1]
 * 输出: 6
 */

class Solution
{

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height)
    {
        $vol = 0;
        $left = 0;
        $right = count($height) - 1;
        $leftMax = 0;
        $rightMax = 0;
        while ($left < $right) {
            // 如果第 $left 个元素 < 第 $right 个元素，说明右边的最大值，肯定不会小于 $height[$right]
            if ($height[$left] < $height[$right]) {
                $leftMax = max($height[$left], $leftMax);
                $vol += $leftMax - $height[$left];
                $left++;
            } else {
                $rightMax = max($height[$right], $rightMax);
                $vol += $rightMax - $height[$right];
                $right--;
            }
        }
        return $vol;
    }

    /**
     * 暴力解法
     * 第i个柱子接水 = min(第i个柱子接水左边的最大值, 第i个柱子接水右边的最大值) - $height[$i];
     *
     * @param $height
     * @return int|mixed
     */
    function trap_force($height)
    {
        $vol = 0;
        for ($i = 0; $i < count($height); $i++) {
            $left = 0;
            $right = count($height) - 1;
            $iMaxLeft = 0;
            $iMaxRight = 0;
            while ($left < $i) {
                $iMaxLeft = max($iMaxLeft, $height[$left]);
                $left++;
            }
            while ($right > $i) {
                $iMaxRight = max($iMaxRight, $height[$right]);
                $right--;
            }
            $iVol = (min($iMaxLeft, $iMaxRight) - $height[$i]);
            $vol += $iVol < 0 ? 0 : $iVol;

        }
        return $vol;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->trap_force([0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1]) . "\n";
    echo (new Solution())->trap([0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1]) . "\n";
    echo "======= test case end =======\n";
}