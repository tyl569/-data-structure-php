<?php

/**
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/lru-cache
 *
 *
 * 运用你所掌握的数据结构，设计和实现一个  LRU (最近最少使用) 缓存机制。它应该支持以下操作： 获取数据 get 和 写入数据 put 。
 * 获取数据 get(key) - 如果关键字 (key) 存在于缓存中，则获取关键字的值（总是正数），否则返回 -1。
 * 写入数据 put(key, value) - 如果关键字已经存在，则变更其数据值；如果关键字不存在，则插入该组「关键字/值」。
 * 当缓存容量达到上限时，它应该在写入新数据之前删除最久未使用的数据值，从而为新的数据值留出空间。
 *
 * 进阶:
 * 你是否可以在 O(1) 时间复杂度内完成这两种操作？
 *
 * 示例:
 *
 * LRUCache cache = new LRUCache(2);
 * cache.put(1, 1);
 * cache.put(2, 2);
 * cache.get(1);       // 返回  1
 * cache.put(3, 3);    // 该操作会使得关键字 2 作废
 * cache.get(2);       // 返回 -1 (未找到)
 * cache.put(4, 4);    // 该操作会使得关键字 1 作废
 * cache.get(1);       // 返回 -1 (未找到)
 * cache.get(3);       // 返回  3
 * cache.get(4);       // 返回  4
 *
 *
 * 想法：
 *
 * 每次get的时候，表示该key的缓存命中率更高，需要重新调整到结尾
 *
 * 当put的时候，如果容量已经满了，则把开头的值弹出来，把新put的值追加到结尾
 */

class LRUCache
{
    public $keyList = [];
    public $capacity = [];
    public $keyMap = [];

    function __construct($capacity)
    {
        $this->capacity = $capacity;
    }

    function get($key)
    {
        if (!isset($this->keyMap[$key])) {
            return -1;
        }
        $this->rePush($key, $this->keyMap[$key]);
        return $this->keyMap[$key];
    }

    private function rePush($key, $value)
    {
        $this->move($key);
        $this->push($key, $value);
    }

    private function move($key)
    {
        $kepPos = array_search($key, $this->keyList);
        unset($this->keyList[$kepPos]);
    }

    private function push($key, $value)
    {
        array_push($this->keyList, $key);
        $this->keyMap[$key] = $value;
    }

    function put($key, $value)
    {
        if (isset($this->keyMap[$key])) {
            $this->rePush($key, $value);
            return;
        }
        if (count($this->keyList) >= $this->capacity) {
            $outKey = array_shift($this->keyList);
            unset($this->keyMap[$outKey]);
        }
        $this->push($key, $value);
    }
}


echo "======= test case start =======\n";
$lruCache = new LRUCache(2);
$lruCache->put(1, 1);
$lruCache->put(2, 2);
echo $lruCache->get(1) . "\n";
$lruCache->put(3, 3);
echo $lruCache->get(2) . "\n";
$lruCache->put(4, 4);
echo $lruCache->get(1) . "\n";
echo $lruCache->get(3) . "\n";
echo $lruCache->get(4) . "\n";
echo "======= test case end =======\n";
