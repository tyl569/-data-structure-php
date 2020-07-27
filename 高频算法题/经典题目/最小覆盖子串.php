<?php
/**
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/merge-sorted-array
 *
 *
 * 给你两个有序整数数组 nums1 和 nums2，请你将 nums2 合并到 nums1 中，使 nums1 成为一个有序数组。
 * 说明:
 * 初始化 nums1 和 nums2 的元素数量分别为 m 和 n 。
 * 你可以假设 nums1 有足够的空间（空间大小大于或等于 m + n）来保存 nums2 中的元素。
 * 示例:
 * 输入:
 * nums1 = [1,2,3,0,0,0], m = 3
 * nums2 = [2,5,6],       n = 3
 * 输出: [1,2,2,3,5,6]
 */

class Solution
{

    function merge(&$nums1, $m, $nums2, $n)
    {
        if (empty($nums2)) {
            return $nums1;
        }
        $i = $m - 1;
        $j = $n - 1;
        $end = ($m + $n) - 1;
        while ($i >= 0 && $j >= 0) {
            if ($nums1[$i] > $nums2[$j]) {
                $nums1[$end] = $nums1[$i]; //将较大的数字放后面
                $i--;
            } else {
                $nums1[$end] = $nums2[$j];
                $j--;
            }
            $end--;
        }
        while ($j >= 0) {
            $nums1[$j] = $nums2[$j];
            $j--;
        }
        return $nums1;
    }
}

mock();

function mock()
{
    $nums1 = [1, 2, 3, 0, 0, 0];
    $m = 3;
    $nums2 = [2, 5, 6];
    $n = 3;
    $ret = (new Solution())->merge($nums1, $m, $nums2, $n);
    var_dump($ret);
}
