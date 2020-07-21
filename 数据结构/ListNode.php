<?php

class ListNode
{
    public $val;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }

    static function printListNode($node)
    {
        if ($node == null) {
            return;
        }
        echo " {$node->val} \n";

        self::printListNode($node->next);
    }
}