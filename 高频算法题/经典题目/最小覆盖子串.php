<?php
/**
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/leetbook/read/2020-top-interview-questions/xoy5lc/
 *
 * 给你一个字符串 S、一个字符串 T 。请你设计一种算法，可以在 O(n) 的时间复杂度内，从字符串 S 里面找出：包含 T 所有字符的最小子串。
 *
 *  
 *
 * 示例：
 *
 * 输入：S = "ADOBECODEBANC", T = "ABC"
 * 输出："BANC"
 *  
 *
 * 提示：
 *
 * 如果 S 中不存这样的子串，则返回空字符串 ""。
 * 如果 S 中存在这样的子串，我们保证它是唯一的答案。
 */

class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function minWindow($s, $t)
    {
        $left = $start = $right = 0;
        $target = [];
        $window = [];
        $minLen = PHP_INT_MAX;
        $match = 0;
        for ($i = 0; $i < strlen($t); $i++) {
            isset($target[$t{$i}]) ? $target[$t{$i}]++ : ($target[$t{$i}] = 1);
        }
        while ($right < strlen($s)) {
            $char = $s{$right};
            if ($target[$char]) {
                isset($window[$char]) ? $window[$char]++ : ($window[$char] = 1);
                if ($window[$char] == $target[$char]) { // 如果字符的个数和目标字符个数一致，则匹配+1
                    $match++;
                }
            }
            $right++; // 窗口继续向右滑动
            while ($match == count($target)) { // 如果匹配个数达到要求，窗口左边界开始右滑
                if ($right - $left <= $minLen) {
                    $start = $left;
                    $minLen = $right - $left;
                }
                $char = $s{$left};
                if ($target[$char]) {
                    $window[$char]--;
                    if ($window[$char] < $target[$char]) {
                        $match--;
                    }
                }
                $left++; // 窗口左边界向右滑动
            }
        }
        return $minLen == PHP_INT_MAX ? "" : substr($s, $start, $minLen);
    }
}

echo "======= test case start =======\n";
echo (new Solution())->minWindow('ADOBECODEBANC', 'ABC') . "\n";
echo "======= test case end =======\n";