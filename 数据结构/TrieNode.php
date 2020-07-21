<?php
/**
 * Created by PhpStorm.
 * User: tengyunlong
 * Date: 2020-04-16
 * Time: 20:12
 */

class TrieNode
{
    public $isWord;
    public $next;

    public function __construct($isWord = false)
    {
        $this->isWord = $isWord;
        $this->next = null;
    }
}