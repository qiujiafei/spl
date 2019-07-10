<?php
/**
 * Created by PhpStorm.
 * User: gaffey
 * Date: 19-7-10
 * Time: 下午5:14
 */
$obj = new SplDoublyLinkedList();
$obj->push(1);  //把新的节点数据添加到链表的顶部(top 位置)
$obj->push(2);
$obj->push(3);

$obj->unshift(10);  //把新的节点数据添加到链表的底部(bottom 位置)
print_r($obj);

$obj->rewind(); // rewind() 用于把节点指针指向 bottom 节点
echo "current node: " . $obj->current() . PHP_EOL;  // current() 获取节点指针指向的节点

$obj->next(); // next() 用于把节点指针指向当前节点的下一个节点 (靠近 top 方向)
echo "node index: " . $obj->key() . PHP_EOL;  // key() 获取当前节点索引
echo "next node: " . $obj->current() . PHP_EOL;

$obj->prev(); // prev() 用于把节点指针指向当前节点的上一个节点 (靠近 bootom 方向)
echo "prev node: " . $obj->current() . PHP_EOL;

$obj->next();
$obj->next();
$obj->next();
$obj->next();
echo "node index: " . $obj->key() . PHP_EOL;  // key() 获取当前节点索引, 索引可以指向一个不存在的值

if ($obj->valid()) {    // valid() 方法验证是否是一个有效的节点, 返回 bool 值
    echo "Valid Node" . PHP_EOL;
} else {
    echo "Invalid Node" . PHP_EOL;
}

/**
 * 如果当前指针在移除的节点话， current 会失效
 */
echo "pop node: " . $obj->pop() . PHP_EOL;  //将链表顶部节点移除 （top位置）
echo "shift node: " . $obj->shift() . PHP_EOL;  //将链表底部节点移除 （bootom位置）

print_r($obj);

/**
 * 序列化和反序列化
 */
$serialize = serialize($obj);
echo "Serialize Double Link : " . $serialize .PHP_EOL;
print_r(unserialize($serialize));

echo "###########################################\n";

/**
 * 设置迭代模式
 * - 迭代的顺序 (先进先出、后进先出)
 *  - SplDoublyLnkedList::IT_MODE_LIFO (堆栈 后进先出)
 *  - SplDoublyLnkedList::IT_MODE_FIFO (队列 先进先出)
 *
 * - 迭代过程中迭代器的行为
 *  - SplDoublyLnkedList::IT_MODE_DELETE (删除已迭代的节点元素)
 *  - SplDoublyLnkedList::IT_MODE_KEEP   (保留已迭代的节点元素)
 *
 * 默认的模式是 0 : SplDoublyLnkedList::IT_MODE_FIFO | SplDoublyLnkedList::IT_MODE_KEEP
 *
 */

$doubly = new SPLDoublyLinkedList();
$doubly->push('a');
$doubly->push('b');
$doubly->push('c');
$doubly->push('d');
echo "初始链表\n";
var_dump($doubly);

/**
 * 设置迭代模式为 先进先出 迭代一个节点删除一个节点
 */
$doubly->setIteratorMode(SplDoublyLinkedList::IT_MODE_FIFO | SplDoublyLinkedList::IT_MODE_DELETE);
$mode = $doubly->getIteratorMode(); #int(1)  这里是用数字来表示迭代模型，每种不同的组合有对应的数字表示, 个人理解是定义的常量相加的值
echo "当前迭代模式是[{$mode}] : 先进先出 并且 迭代一个节点删除一个节点\n";
$doubly->rewind();  //将指针挪到底部
foreach($doubly as $key => $value)
{
    echo "key: {$key}, value: {$value}\n";
}
echo "迭代完成\n";
var_dump($doubly);

/**
 * 设置迭代模式为 后进先出 迭代后保留节点
 */
$doubly2 = new SPLDoublyLinkedList();
$doubly2->push('a');
$doubly2->push('b');
$doubly2->push('c');
$doubly2->push('d');
echo "初始链表\n";
var_dump($doubly2);

$doubly2->setIteratorMode(SplDoublyLinkedList::IT_MODE_LIFO | SplDoublyLinkedList::IT_MODE_KEEP);
$mode2 = $doubly2->getIteratorMode();
echo "当前迭代模式是[{$mode2}] : 后进先出 迭代后保留节点\n";
$doubly2->rewind();  //将指针挪到底部
foreach($doubly2 as $key => $value)
{
    echo "key: {$key}, value: {$value}\n";
}
echo "迭代完成\n";
var_dump($doubly2);
