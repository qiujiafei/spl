<?php
/**
 * Created by PhpStorm.
 * User: gaffey
 * Date: 19-7-11
 * Time: 上午11:14
 */
class CountMe implements \Countable
{
    protected $_myCount = 3;

    public function count()
    {
        return $this->_myCount;
    }
}

$obj = new CountMe();
echo count($obj) . PHP_EOL;