<?php
/**
 * 链接：https://leetcode-cn.com/leetbook/read/2020-top-interview-questions/xo6qz3/
 * 来源：力扣（LeetCode）
 *
 * 给定一个数组，它的第 i 个元素是一支给定股票第 i 天的价格。
 * 如果你最多只允许完成一笔交易（即买入和卖出一支股票一次），设计一个算法来计算你所能获取的最大利润。
 * 注意：你不能在买入股票前卖出股票。
 *
 *  
 *
 * 示例 1:
 *
 * 输入: [7,1,5,3,6,4]
 * 输出: 5
 * 解释: 在第 2 天（股票价格 = 1）的时候买入，在第 5 天（股票价格 = 6）的时候卖出，最大利润 = 6-1 = 5 。
 * 注意利润不能是 7-1 = 6, 因为卖出价格需要大于买入价格；同时，你不能在买入前卖出股票。
 * 示例 2:
 *
 * 输入: [7,6,4,3,1]
 * 输出: 0
 * 解释: 在这种情况下, 没有交易完成, 所以最大利润为 0。
 */

/**
 * 股票买卖问题是比较经典的问题
 * labuladong有篇文章具体解析了这类题目的解法：https://github.com/tyl569/fucking-algorithm/blob/master/%E5%8A%A8%E6%80%81%E8%A7%84%E5%88%92%E7%B3%BB%E5%88%97/%E5%9B%A2%E7%81%AD%E8%82%A1%E7%A5%A8%E9%97%AE%E9%A2%98.md
 */
class Solution
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices)
    {
        if (empty($prices)) {
            return 0;
        }
        $dp = [];
        for ($i = 0; $i < count($prices); $i++) {
            if ($i == 0) {
                $dp[$i][0] = 0;
                $dp[$i][1] = -$prices[$i];
            } else {
                $dp[$i][0] = max($dp[$i - 1][0], $dp[$i - 1][1] + $prices[$i]);
                $dp[$i][1] = max($dp[$i - 1][1], -$prices[$i]);
            }
        }
        return $dp[count($prices) - 1][0];
    }

    // 优化版本
    function maxProfit2($prices)
    {
        if (empty($prices)) {
            return 0;
        }
        $dp_i_0 = 0;
        $dp_i_1 = PHP_INT_MIN;
        for ($i = 0; $i < count($prices); $i++) {
            $dp_i_0 = max($dp_i_0, $dp_i_1 + $prices[$i]);
            $dp_i_1 = max($dp_i_1, -$prices[$i]);;
        }
        return $dp_i_0;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->maxProfit([7, 1, 5, 3, 6, 4]) . "\n";
    echo (new Solution())->maxProfit2([7, 1, 5, 3, 6, 4]) . "\n";
    echo "======= test case end =======\n";
}