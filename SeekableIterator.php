<?php
/**
 * Created by PhpStorm.
 * User: gaffey
 * Date: 19-7-11
 * Time: 下午2:16
 */
class MySeekableIterator implements \SeekableIterator
{
    protected $data;    //存放数据
    protected $index;   //存放指针

    public function seek($position)
    {
        return $this->data[$position];
    }

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

$it = new MySeekableIterator(['a', 'b', 'c']);
//print_r($it);

foreach ($it as $key => $value) {
    echo $key . "=>" . $value . PHP_EOL;
}

echo 'index1 = ' . $it->seek(10) . PHP_EOL;
