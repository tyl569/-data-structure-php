<?php
/**
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/leetbook/read/2020-top-interview-questions/xoqg4h/
 *
 *给你两个有序整数数组 nums1 和 nums2，请你将 nums2 合并到 nums1 中，使 nums1 成为一个有序数组。
 *
 * 说明:
 *
 * 初始化 nums1 和 nums2 的元素数量分别为 m 和 n 。
 * 你可以假设 nums1 有足够的空间（空间大小大于或等于 m + n）来保存 nums2 中的元素。
 *  
 *
 * 示例:
 *
 * 输入:
 * nums1 = [1,2,3,0,0,0], m = 3
 * nums2 = [2,5,6],       n = 3
 */

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n)
    {
        $len = $m + $n - 1;
        $m--;
        $n--;
        while ($m >= 0 && $n >= 0) { // 从后向前进行比较
            if ($nums1[$m] < $nums2[$n]) {
                $nums1[$len] = $nums2[$n];
                $n--;
            } else {
                $nums1[$len] = $nums1[$m];
                $m--;
            }
            $len--;
        }
        while ($n >= 0) {
            $nums1[$len] = $nums2[$n];
            $len--;
            $n--;
        }
        return $nums1;
    }
}

echo "======= test case start =======\n";

$nums1 = [1, 2, 3, 0, 0, 0];
$m = 3;
$nums2 = [2, 5, 6];
$n = 3;
$arr = (new Solution())->merge($nums1, $m, $nums2, $n);
var_dump($arr);

echo "======= test case end =======\n";