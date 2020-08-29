<?php
/**
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/leetbook/read/2020-top-interview-questions/xoyf7i/
 *
 * 给定两个大小为 m 和 n 的正序（从小到大）数组 nums1 和 nums2。
 *
 * 请你找出这两个正序数组的中位数，并且要求算法的时间复杂度为 O(log(m + n))。
 *
 * 你可以假设 nums1 和 nums2 不会同时为空。
 *
 *  
 *
 * 示例 1:
 *
 * nums1 = [1, 3]
 * nums2 = [2]
 *
 * 则中位数是 2.0
 * 示例 2:
 *
 * nums1 = [1, 2]
 * nums2 = [3, 4]
 *
 * 则中位数是 (2 + 3)/2 = 2.5
 *
 */

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        $len1 = count($nums1);
        $len2 = count($nums2);
        $totalLen = $len1 + $len2;
        if ($totalLen % 2) {
            $mid = intval($totalLen / 2);
            $median = $this->getKthEle($nums1, $nums2, $mid + 1);
            return $median;
        } else {
            $midIndex1 = intval($totalLen / 2) - 1;
            $midIndex2 = intval($totalLen / 2);
            $median = ($this->getKthEle($nums1, $nums2, $midIndex1 + 1) + $this->getKthEle($nums1, $nums2, $midIndex2 + 1)) / 2;
            return $median;
        }
    }

    function getKthEle($nums1, $nums2, $k)
    {
        $len1 = count($nums1);
        $len2 = count($nums2);
        $index1 = 0;
        $index2 = 0;
        while (true) {
            if ($index1 == $len1) {
                return $nums2[$index2 + $k - 1];
            }
            if ($index2 == $len2) {
                return $nums1[$index1 + $k - 1];
            }
            if ($k == 1) {
                return min($nums1[$index1], $nums2[$index2]);
            }

            $half = intval($k / 2);
            $newIndex1 = min($index1 + $half, $len1) - 1;
            $newIndex2 = min($index2 + $half, $len2) - 1;
            $pivot1 = $nums1[$newIndex1];
            $pivot2 = $nums2[$newIndex2];
            if ($pivot1 <= $pivot2) {
                $k -= ($newIndex1 - $index1 + 1);
                $index1 = $newIndex1 + 1;
            } else {
                $k -= ($newIndex2 - $index2 + 1);
                $index2 = $newIndex2 + 1;
            }
        }
    }

    // 一边合并有序数组，一边寻找中位数
    function findMedianSortedArrays2($nums1, $nums2)
    {
        $m = count($nums1);
        $n = count($nums2);

        if (($m + $n) & 1) {
            $mid = intval(($m + $n + 1) / 2) - 1; // 如果两个数组长度是奇数，则是合并之后的中间元素
        } else {
            $midMin = intval(($m + $n + 1) / 2) - 1; // 如果两个数组长度和是偶数，则是中间两个元素
            $midMax = $midMin + 1;
        }
        $i = 0;
        $j = 0;
        $tmp = [];
        if (empty($nums1)) {
            if (isset($mid) && isset($nums2[$mid])) {
                return $nums2[$mid];
            }
            if (isset($midMax) && isset($nums2[$midMax])) {
                return ($nums2[$midMin] + $nums2[$midMax]) / 2;
            }
        }
        if (empty($nums2)) {
            if (isset($mid) && isset($nums1[$mid])) {
                return $nums1[$mid];
            }
            if (isset($midMax) && isset($nums1[$midMax])) {
                return ($nums1[$midMin] + $nums1[$midMax]) / 2;
            }
        }
        while ($i < $m && $j < $n) {
            if ($nums1[$i] < $nums2[$j]) {
                $tmp[] = $nums1[$i];
                $i++;
            } else {
                $tmp[] = $nums2[$j];
                $j++;
            }
            if (isset($mid) && isset($tmp[$mid])) {
                return $tmp[$mid];
            }
            if (isset($midMax) && isset($tmp[$midMax])) {
                return ($tmp[$midMin] + $tmp[$midMax]) / 2;
            }
        }
        while ($i < $m) {
            $tmp[] = $nums1[$i];
            if (isset($mid) && isset($tmp[$mid])) {
                return $tmp[$mid];
            }
            if (isset($midMax) && isset($tmp[$midMax])) {
                return ($tmp[$midMin] + $tmp[$midMax]) / 2;
            }
            $i++;
        }
        while ($j < $n) {
            $tmp[] = $nums2[$j];
            if (isset($mid) && isset($tmp[$mid])) {
                return $tmp[$mid];
            }
            if (isset($midMax) && isset($tmp[$midMax])) {
                return ($tmp[$midMin] + $tmp[$midMax]) / 2;
            }
            $j++;
        }
    }
}

echo "======= test case start =======\n";
echo (new Solution())->findMedianSortedArrays([1, 3], [2]) . "\n";
echo (new Solution())->findMedianSortedArrays([1, 2], [3, 4]) . "\n";
echo (new Solution())->findMedianSortedArrays([0, 0], [0, 0]) . "\n";
echo (new Solution())->findMedianSortedArrays([], [1]) . "\n";
echo (new Solution())->findMedianSortedArrays([2], []) . "\n";

echo (new Solution())->findMedianSortedArrays2([1, 3], [2]) . "\n";
echo (new Solution())->findMedianSortedArrays2([1, 2], [3, 4]) . "\n";
echo (new Solution())->findMedianSortedArrays2([0, 0], [0, 0]) . "\n";
echo (new Solution())->findMedianSortedArrays2([], [1]) . "\n";
echo (new Solution())->findMedianSortedArrays2([2], []) . "\n";
echo "======= test case end =======\n";