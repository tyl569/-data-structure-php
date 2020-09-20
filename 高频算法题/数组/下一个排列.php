<?php
/**
 * 链接：https://leetcode-cn.com/leetbook/read/2020-top-interview-questions/xojgvv/
 * 来源：力扣（LeetCode）
 * 实现获取下一个排列的函数，算法需要将给定数字序列重新排列成字典序中下一个更大的排列。
 *
 * 如果不存在下一个更大的排列，则将数字重新排列成最小的排列（即升序排列）。
 *
 * 必须原地修改，只允许使用额外常数空间。
 *
 * 以下是一些例子，输入位于左侧列，其相应输出位于右侧列。
 * 1,2,3 → 1,3,2
 * 3,2,1 → 1,2,3
 * 1,1,5 → 1,5,1
 *
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function nextPermutation(&$nums)
    {
        $i = count($nums) - 2;
        while ($i >= 0 && $nums[$i + 1] <= $nums[$i]) {
            $i--;
        }
        if ($i >= 0) {
            $j = count($nums) - 1;
            while ($j >= 0 && $nums[$j] <= $nums[$i]) {
                $j--;
            }
            $this->swap($nums, $i, $j);
        }
        $this->reverse($nums, $i + 1);
    }

    private function reverse(&$nums, $start)
    {
        $i = $start;
        $j = count($nums) - 1;
        while ($i < $j) {
            $this->swap($nums, $i, $j);
            $i++;
            $j--;
        }
    }

    private function swap(&$nums, $i, $j)
    {
        $temp = $nums[$i];
        $nums[$i] = $nums[$j];
        $nums[$j] = $temp;
    }
}

echo "======= test case start =======\n";
$arr = [1, 2, 3];
(new Solution())->nextPermutation($arr);
var_dump($arr);
$arr = [3, 2, 1];
(new Solution())->nextPermutation($arr);
var_dump($arr);
$arr = [1, 1, 5];
(new Solution())->nextPermutation($arr);
var_dump($arr);
echo "=======test case end ========\n";