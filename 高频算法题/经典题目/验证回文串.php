<?php

/**
 * 来源：力扣（LeetCode）
 *
 * 链接：https://leetcode-cn.com/leetbook/read/2020-top-interview-questions/xoktgm/ * 给定一个字符串，验证它是否是回文串，只考虑字母和数字字符，可以忽略字母的大小写。
 *
 * 说明：本题中，我们将空字符串定义为有效的回文串。
 *
 * 示例 1:
 *
 * 输入: "A man, a plan, a canal: Panama"
 * 输出: true
 * 示例 2:
 *
 * 输入: "race a car"
 * 输出: false
 */
class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s)
    {
        $left = 0;
        $right = strlen($s);
        while ($left < $right) {
            $char1 = strtolower($s{$left});
            $char2 = strtolower($s{$right});
            if (!preg_match("/^[a-z0-9]/", $char1)) {
                $left++;
                continue;
            }
            if (!preg_match("/^[a-z0-9]/", $char2)) {
                $right--;
                continue;
            }
            if ($char1 != $char2) {
                return false;
            }
            $left++;
            $right--;
        }
        return true;
    }
}

echo "======= test case start =======\n";

var_dump((new Solution())->isPalindrome("A man, a plan, a canal: Panama"));
var_dump((new Solution())->isPalindrome("race a car"));

echo "======= test case start =======\n";


