<?php
$stack = new SplStack();

$stack->push('a');
$stack->push('b');
$stack->push('c');
$stack->push('d');
print_r($stack);

echo "Bottom: " . $stack->bottom() . PHP_EOL;   //查看堆栈的 bottom 位置
echo "Top: " . $stack->top() . PHP_EOL; //查看堆栈的 top 位置

$stack->offsetSet(0, 'e');  //根据索引设置新的数据, 0为top位置，这点和双向链表不一样
print_r($stack);

$stack->rewind();   //rewind() 是将指针指向第一个节点，堆栈中第一个节点位置是 top
echo "Current: ". $stack->current() . PHP_EOL;
$stack->next();   //next() 是将指针指向下一个节点，堆栈中是从 top 位置往 bottom 位置
echo "Next: ". $stack->current() . PHP_EOL;

// 遍历堆栈
$stack->rewind(); //先将指针移到初始位置
while($stack->valid()) {    //将指针是否有效作为循环跳出条件
    echo $stack->key() . " => " . $stack->current() . PHP_EOL;
    $stack->next();
}


// 删除堆栈数据
echo "pop: " . $stack->pop() . PHP_EOL; // pop() 方法从堆栈中删除 top 位置元素
print_r($stack);