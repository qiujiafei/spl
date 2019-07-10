<?php
$idIterator = new ArrayIterator([1, 2, 3]);
$nameIterator = new ArrayIterator(['张三', '李四', '王五']);
$ageIterator = new ArrayIterator([25, 26, 27]);

/**
 * 将多个 数组迭代器组合为一个整体
 */
$mit = new MultipleIterator(MultipleIterator::MIT_KEYS_ASSOC);
$mit->attachIterator($idIterator, 'id');
$mit->attachIterator($nameIterator, 'name');
$mit->attachIterator($ageIterator, 'age');

foreach ($mit as $val) {    //这里 $key => $val $key是无效的
    print_r($val);
}