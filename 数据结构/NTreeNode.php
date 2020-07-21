<?php

class NTreeNode
{
    public $val = null;
    public $children = [];

    public function __construct($val, $children = [])
    {
        $this->val = $val;
        $this->children = $children;
    }
}