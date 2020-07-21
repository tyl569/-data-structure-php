<?php

class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($val)
    {
        $this->val = $val;
    }

    static function printTree($node)
    {
        if ($node == null) {
            return;
        }
        if ($node->left) {
            echo "节点: " . $node->val . " 的左节点为: " . $node->left->val . "\n";
        }
        if ($node->right) {
            echo "节点: " . $node->val . " 的右节点为: " . $node->right->val . "\n";
        }
        self::printTree($node->left);
        self::printTree($node->right);
    }
}

