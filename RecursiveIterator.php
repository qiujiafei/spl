<?php
/**
 * Created by PhpStorm.
 * User: gaffey
 * Date: 19-7-11
 * Time: 下午3:23
 */

class MyRecursiveIterator implements \RecursiveIterator
{
    protected $data;

    protected $index;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function valid()
    {
        return isset($this->data[$this->index]);
    }

    public function rewind()
    {
        $this->index = 0;
    }

    public function next()
    {
        $this->index++;
    }

    public function current()
    {
        return $this->data[$this->index];
    }

    public function key()
    {
        return $this->index;
    }

    public function getChildren()
    {
        return new self($this->data[$this->index]);
    }

    public function hasChildren()
    {
        return is_array($this->data[$this->index]);
    }
}

function recursive(MyRecursiveIterator $recur, $deep = 1)
{
    foreach ($recur as $key => $value) {
        if ($recur->hasChildren()) {
            echo "第{$deep}层 第 {$key} 个元素含有子元素\n";
            recursive($recur->getChildren(), $deep+1);
        } else {
            echo "第{$deep}层 第 {$key} 个元素: {$value}\n";
        }
    }
}

$arr = [
    1, 'a', [
        '3-1', '3-2', [
            '3-3-1',
            '3-3-2'
        ],
        '3-4'
    ],
    'asdsadasd'
];

$recur = new MyRecursiveIterator($arr);
recursive($recur);