<?php

/**
 * Class UnionFind
 *
 * 并查集的特性
 * 1、自反性，节点p和节点p是连通的
 * 2、可逆性，节点p和节点q连通，那么节点q和节点p也是连通
 * 3、传递行，节点p和节点r连通，节点r和节点q连通，那么节点p和节点q连通
 */

class UnionFind
{
    private $count;

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    private $size;
    private $parent = [];

    public function __construct($n)
    {
        $this->count = $n;
        for ($i = 0; $i < $n; $i++) {
            $this->parent[$i] = $i;
            $this->size[$i] = $i;
        }
    }

    // 返回根节点
    public function find($x)
    {
        while ($this->parent[$x] != $x) {
            // 节点压缩
            $this->parent[$x] = $this->parent[$this->parent[$x]];
            $x = $this->parent[$x];
        }
        return $x;
    }

    public function union($a, $b)
    {
        $rootA = $this->find($a);
        $rootB = $this->find($b);
        if ($rootB == $rootA) {
            return;
        }
        if ($rootB >= $rootA) {
            $this->parent[$rootA] = $rootB;
            $this->size[$rootB] += $this->size[$rootA];
        } else {
            $this->parent[$rootB] = $rootA;
            $this->size[$rootA] += $this->size[$rootB];
        }
        $this->count--;
    }

    // 验证根节点是否是同一个
    public function connected($a, $b)
    {
        $rootA = $this->find($a);
        $rootB = $this->find($b);
        return $rootA == $rootB;
    }
}