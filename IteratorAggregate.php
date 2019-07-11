<?php
/**
 * Created by PhpStorm.
 * User: gaffey
 * Date: 19-7-11
 * Time: 下午2:21
 */
require_once "Iterator.php";

/**
 * 这个接口有点绕， 要在内部返回一个 Iterator 接口对象才能迭代
 * 其中 ArrayIterator 是预定义好的实现 Iterator 的接口，可以直接使用
 * Class MyIteratorAggregate
 */
class MyIteratorAggregate implements \IteratorAggregate
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * IteratorAggregate 需要返回一个实现了 Iterator 接口的对象
     * @return MyIterator|Traversable
     */
    public function getIterator()
    {
        return new ArrayIterator($this->data);
        //return new MyIterator($this->data);
    }
}


$iteratorAggregate = new MyIteratorAggregate(['A', 'B', 'C']);
foreach ($iteratorAggregate as $key => $value) {
    echo "$key => $value" . PHP_EOL;
}