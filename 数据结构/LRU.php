<?php

class LRUCache
{
    private $capacity = 0;
    private $keyList = [];
    private $map = [];

    /**
     * @param Integer $capacity
     */
    function __construct($capacity)
    {
        $this->capacity = $capacity;

    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key)
    {
        if (isset($this->map[$key])) {
            $this->removeKeyFromKeyList($key);
            array_push($this->keyList, $key); // 重新加到末尾队列
            return $this->map[$key];
        }
        return -1;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value)
    {
        if (isset($this->map[$key])) {
            $this->removeKeyFromKeyList($key);
        } else {
            if (count($this->map) == $this->capacity) {
                $out = array_shift($this->keyList);
                unset($this->map[$out]);
            }
        }
        $this->map[$key] = $value;
        array_push($this->keyList, $key);
    }

    private function removeKeyFromKeyList($key)
    {
        $pos = array_search($key, $this->keyList);
        unset($this->keyList[$pos]);
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $obj = new LRUCache(2);
    $obj->put(1, 1);
    $obj->put(2, 2);
    echo $obj->get(1) . "\n";
    $obj->put(3, 3);
    echo $obj->get(2) . "\n";
    $obj->put(4, 4);
    echo $obj->get(1) . "\n";
    echo $obj->get(3) . "\n";
    echo $obj->get(4) . "\n";


    echo "======= test case end =======\n";
}