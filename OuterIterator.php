<?php
/**
 * Created by PhpStorm.
 * User: gaffey
 * Date: 19-7-11
 * Time: 下午2:30
 */
class MyOuterIterator implements \OuterIterator
{
    protected $iterators = [];
    protected $index;

    /**
     * 返回当前正在遍历的迭代器
     * @return Iterator|mixed
     */
    public function getInnerIterator()
    {
        return $this->iterators[$this->index];
    }

    public function __construct(array $data)
    {
        echo __METHOD__,PHP_EOL;
        $this->iterators = $data;
    }

    public function current()
    {
        echo __METHOD__,PHP_EOL;
        return $this->getInnerIterator()->current();
    }

    public function next()
    {
        echo __METHOD__,PHP_EOL;
        $this->getInnerIterator()->next();
        if (!$this->getInnerIterator()->valid()) {
            ++$this->index < count($this->iterators)  && $this->getInnerIterator()->rewind();
        }
    }

    public function key()
    {
        echo __METHOD__,PHP_EOL;

        $key = $this->getInnerIterator()->key();
        //为避免不同MyIterator迭代器实例有相同的key值，拼上前缀(迭代器存放位置下标)
        return $this->index . '-' . $key;
    }

    public function valid()
    {
        echo __METHOD__,PHP_EOL;

        return $this->index < count($this->iterators);
    }

    public function rewind()
    {
        echo __METHOD__,PHP_EOL;
        $this->index = 0;
        $this->getInnerIterator()->rewind();
    }
}

$arr1=array(1,2);
$arr2=array(3,4);
$iterators = array(new ArrayIterator($arr1),new ArrayIterator($arr2));
//实例化一个MyOuterIterator迭代器
$container = new MyOuterIterator($iterators);
//使用MyOuterIterator迭代器
foreach($container as $key => $val) {
    echo $key . '=>' . $val . PHP_EOL;
}