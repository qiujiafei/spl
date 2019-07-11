<?php
/**
 * Created by PhpStorm.
 * User: gaffey
 * Date: 19-7-11
 * Time: 上午11:41
 */

/**
 * 实现 Iterator 接口能让你的对象可以用 foreach 进行迭代
 * Class MyIterator
 */
class MyIterator implements \Iterator
{
    protected $data;    //存放数据
    protected $index;   //存放指针

    public function __construct(array $data)
    {
        echo __METHOD__,PHP_EOL;
        $this->data = $data;
    }

    public function current()
    {
        echo __METHOD__,PHP_EOL;
        return $this->data[$this->index];
    }

    public function next()
    {
        echo __METHOD__,PHP_EOL;
        $this->index ++;
    }

    public function key()
    {
        echo __METHOD__,PHP_EOL;
        return $this->index;
    }

    public function valid()
    {
        echo __METHOD__,PHP_EOL;
        if (null === $this->index) {
            return false;
        }
        return isset($this->data[$this->index]);
    }

    public function rewind()
    {
        echo __METHOD__,PHP_EOL;
        $this->index = 0;
    }
}

//$it = new MyIterator(['a', 'b', 'c']);
////print_r($it);
//
//foreach ($it as $key => $value) {
//    echo $key . "=>" . $value . PHP_EOL;
//}

//$it->rewind();
//echo "current:" . $it->current() . PHP_EOL;
//$it->next();
//echo "next:" . $it->current() . PHP_EOL;
