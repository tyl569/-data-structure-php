<?php

/**
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/leetbook/read/2020-top-interview-questions/xrxlmr/
 * 给定一个包含 m x n 个元素的矩阵（m 行, n 列），请按照顺时针螺旋顺序，返回矩阵中的所有元素。
 *
 * 示例 1:
 *
 * 输入:
 * [
 * [ 1, 2, 3 ],
 * [ 4, 5, 6 ],
 * [ 7, 8, 9 ]
 * ]
 * 输出: [1,2,3,6,9,8,7,4,5]
 * 示例 2:
 *
 * 输入:
 * [
 * [1, 2, 3, 4],
 * [5, 6, 7, 8],
 * [9,10,11,12]
 * ]
 * 输出: [1,2,3,4,8,12,11,10,9,5,6,7]
 */
class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix)
    {
        $arr = [];
        $r1 = 0;
        $c1 = 0;
        $r2 = count($matrix) - 1;
        $c2 = count($matrix[0]) - 1;

        while ($r1 <= $r2 && $c1 <= $c2) {
            for ($c = $c1; $c <= $c2; $c++) {
                $arr[] = $matrix[$r1][$c];
            }
            for ($r = $r1 + 1; $r <= $r2; $r++) {
                $arr[] = $matrix[$r][$c2];
            }
            if ($r1 < $r2 && $c1 < $c2) {
                for ($c = $c2 - 1; $c > $c1; $c--) {
                    $arr[] = $matrix[$r2][$c];
                }
                for ($r = $r2; $r > $r1; $r--) {
                    $arr[] = $matrix[$r][$c1];

                }
            }
            $r1++;
            $r2--;
            $c1++;
            $c2--;
        }
        return $arr;
    }
}

echo "======= test case start =======\n";
$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
$ret = (new Solution())->spiralOrder($matrix);
var_dump($ret);
echo "======= test case end =======\n";