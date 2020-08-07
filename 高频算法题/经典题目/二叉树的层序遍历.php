<?php
/**
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/leetbook/read/2020-top-interview-questions/xogl61/
 *
 * 给你一个二叉树，请你返回其按 层序遍历 得到的节点值。 （即逐层地，从左到右访问所有节点）。
 *
 *  
 *
 * 示例：
 * 二叉树：[3,9,20,null,null,15,7],
 *
 *    3
 *   / \
 *  9  20
 *  /  \
 * 15   7
 * 返回其层次遍历结果：
 *
 * [
 * [3],
 * [9,20],
 * [15,7]
 * ]
 *
 */

require_once "../../数据结构/TreeNode.php";

class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    private $result = [];

    function levelOrder($root)
    {
        $this->deepTrace($root, 0);
        return $this->result;
    }

    // 深度遍历
    function deepTrace($rootNode, $level)
    {
        if ($rootNode == null) {
            return;
        }
        $this->result[$level][] = $rootNode->val;
        $this->deepTrace($rootNode->left, $level + 1);
        $this->deepTrace($rootNode->right, $level + 1);
    }

    // 迭代解法
    function levelOrder2($root)
    {
        if (empty($root)) {
            return [];
        }
        $queue = new SplQueue();
        $queue->push($root);
        $res = [];
        $level = 0;
        while (!$queue->isEmpty()) {
            $nums = $queue->count();
            for ($i = 0; $i < $nums; $i++) {
                $node = $queue->dequeue();
                $res[$level][] = $node->val;
                if ($node->left != null) {
                    $queue->push($node->left);
                }
                if ($node->right != null) {
                    $queue->push($node->right);
                }
            }
            $level++;
        }
        return $res;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";

    $rootNode = new TreeNode(3);
    $node1 = new TreeNode(9);
    $node2 = new TreeNode(20);

    $node3 = new TreeNode(15);
    $node4 = new TreeNode(7);

    $rootNode->left = $node1;
    $rootNode->right = $node2;
    $node1->left = $node3;;
    $node2->right = $node4;

    $ret = (new Solution())->levelOrder($rootNode);
    var_dump($ret);

    $ret = (new Solution())->levelOrder2($rootNode);
    var_dump($ret);

    echo "======= test case end =======\n";
}