<?php
$fruits = [
    'apple' => 'apple value',
    'orange' => 'orange value',
    'grape' => 'grape value',   //葡萄
    'plum' => 'plum value',   //李子
];

//正常用 foreach 循环
//数组中的 foreach 最终会变为下面的形式
//先实例化一个 ArrayObject 对象后， 使用 getIterator() 去 foreach
foreach($fruits as $key => $value){
    echo $key . " => " . $value . PHP_EOL;
}

//使用 arrayIterator 遍历
echo "===========================\n";
$obj = new ArrayObject($fruits);
$iterator = $obj->getIterator();    //获取对象的迭代器

echo "===foreach 循环===\n";
foreach ($iterator as $key => $value) {
    echo $key . " => " . $value . PHP_EOL;
}

echo PHP_EOL;
echo "===while 循环===\n";    //和遍历链表差不多

$iterator->rewind();    //刚开始这里忘写了， 调用 current 之前一定要初始化指针位置
while($iterator->valid()) {
    echo $iterator->key() . " => " . $iterator->current() . PHP_EOL;
    $iterator->next();
}

echo PHP_EOL;
echo "===seek跳过元素===\n";
$iterator->rewind();

if ($iterator->valid()) {
    $iterator->seek(1); //从索引为1的位置开始打印
    while($iterator->valid()) {
        echo $iterator->key() . " => " . $iterator->current() . PHP_EOL;
        $iterator->next();

    }
}

echo PHP_EOL;
echo "===ksort 排序===\n";
$iterator->ksort(); //将 key 按照从小到大排序 还有一个 asort 是用 value 来排序
print_r($iterator);
