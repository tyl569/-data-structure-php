<?php

/**
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/leetbook/read/2020-top-interview-questions/xo4mt6/
 * 给你一个由 '1'（陆地）和 '0'（水）组成的的二维网格，请你计算网格中岛屿的数量。
 *
 * 岛屿总是被水包围，并且每座岛屿只能由水平方向或竖直方向上相邻的陆地连接形成。
 *
 * 此外，你可以假设该网格的四条边均被水包围。
 *
 *  
 *
 * 示例 1:
 *
 * 输入:
 * [
 * ['1','1','1','1','0'],
 * ['1','1','0','1','0'],
 * ['1','1','0','0','0'],
 * ['0','0','0','0','0']
 * ]
 * 输出: 1
 * 示例 2:
 *
 * 输入:
 * [
 * ['1','1','0','0','0'],
 * ['1','1','0','0','0'],
 * ['0','0','1','0','0'],
 * ['0','0','0','1','1']
 * ]
 * 输出: 3
 * 解释: 每座岛屿只能由水平和/或竖直方向上相邻的陆地连接而成。
 *
 */
class Solution
{

    /**
     * @param String[][] $grid
     * @return Integer
     */
    private $island_num = 0;

    function numIslands($grid)
    {
        for ($i = 0; $i < count($grid); $i++) {
            for ($j = 0; $j < count($grid[0]); $j++) {
                if ($grid[$i][$j]) {
                    $this->island_num++;
                    $this->deepTrace($grid, $i, $j);
                }
            }
        }

        return $this->island_num;
    }

    private function deepTrace(&$grid, $i, $j)
    {
        if ($grid[$i][$j] == 0 || !isset($grid[$i][$j])) {
            return;
        }
        $grid[$i][$j] = 0;
        $this->deepTrace($grid, $i + 1, $j);
        $this->deepTrace($grid, $i - 1, $j);
        $this->deepTrace($grid, $i, $j + 1);
        $this->deepTrace($grid, $i, $j - 1);
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";

    echo (new Solution())->numIslands([
            ['1', '1', '1', '1', '0'],
            ['1', '1', '0', '1', '0'],
            ['1', '1', '0', '0', '0'],
            ['0', '0', '0', '0', '0']
        ]) . "\n";
    echo (new Solution())->numIslands([
            ['1', '1', '0', '0', '0'],
            ['1', '1', '0', '0', '0'],
            ['0', '0', '1', '0', '0'],
            ['0', '0', '0', '1', '1']
        ]) . "\n";


    echo "======= test case end =======\n";
}