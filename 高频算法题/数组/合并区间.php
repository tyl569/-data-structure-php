<?php

/**
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/leetbook/read/2020-top-interview-questions/xr5drs/
 * 给出一个区间的集合，请合并所有重叠的区间。
 *
 * 示例 1:
 *
 * 输入: [[1,3],[2,6],[8,10],[15,18]]
 * 输出: [[1,6],[8,10],[15,18]]
 * 解释: 区间 [1,3] 和 [2,6] 重叠, 将它们合并为 [1,6].
 * 示例 2:
 *
 * 输入: [[1,4],[4,5]]
 * 输出: [[1,5]]
 * 解释: 区间 [1,4] 和 [4,5] 可被视为重叠区间。
 */
class Solution
{
    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals)
    {
        usort($intervals, function ($a, $b) {
            return $a[0] - $b[0]; // 先根据第一项进行排序
        });
        $res = [];
        $idx = -1; // 使用idx，不用每次统计数组
        for ($i = 0; $i < count($intervals); $i++) {
            // 如果是第一个元素，默认插入
            // 比较res最后一个元素的结束值和当前元素开始值
            if ($i == 0 || $intervals[$i][0] > $res[$idx][1]) {
                $res[++$idx] = $intervals[$i];
            } else {
                $res[$idx][1] = max($res[$idx][1], $intervals[$i][1]);
            }
        }
        return $res;
    }
}

echo "======= test case start =======\n";
var_dump((new Solution())->merge([[1, 3], [2, 6], [8, 10], [15, 18]]));
var_dump((new Solution())->merge([[1, 4], [4, 5]]));
var_dump((new Solution())->merge([[1, 1], [1, 2]]));
var_dump((new Solution())->merge([[1, 4], [0, 4]]));
var_dump((new Solution())->merge([[1, 1], [2, 2], [1, 3]]));
echo "=======test case end ========\n";