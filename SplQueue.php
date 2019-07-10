<?php
$queue = new SplQueue();
$queue->enqueue('a');   //从队列中添加元素用 enqueue 方法
$queue->enqueue('b');
$queue->enqueue('c');
$queue->enqueue('d');
print_r($queue);

echo "Bottom: " . $queue->bottom() . PHP_EOL;   //查看队列的 bottom 位置
echo "Top: " . $queue->top() . PHP_EOL; //查看队列的 top 位置

$queue->offsetSet(0, 'e');  //根据索引设置新的数据, 0为 bottom 位置
print_r($queue);

$queue->rewind();   //rewind() 是将指针指向第一个节点，队列中第一个节点位置是 bottom
echo "Current: ". $queue->current() . PHP_EOL;
$queue->next();   //next() 是将指针指向下一个节点，队列中是从 bottom 位置往 top 位置方向
echo "Next: ". $queue->current() . PHP_EOL;

// 遍历队列
$queue->rewind(); //先将指针移到初始位置
while($queue->valid()) {    //将指针是否有效作为循环跳出条件
    echo $queue->key() . " => " . $queue->current() . PHP_EOL;
    $queue->next();
}


// 删除队列数据
echo "dequeue: " . $queue->dequeue() . PHP_EOL; // dequeue() 方法从队列中删除 bottom 位置元素
print_r($queue);