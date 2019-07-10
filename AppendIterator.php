<?php
//初始化两个数组迭代器
$iteratorA = new ArrayIterator(['a', 'b', 'c']);
$iteratorB = new ArrayIterator(['A', 'B', 'C']);

//初始化一个 append 迭代器，他能将两个 ArrayIterator 组合到一起操作
$it = new AppendIterator();
$it->append($iteratorA);    //将一个 ArrayIterator 添加到组合迭代器中
$it->append($iteratorB);

foreach ($it as $key => $value) {
    echo $key . " => " . $value . PHP_EOL;
}