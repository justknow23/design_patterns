<?php
//1. 迭代器模式，在不需要了解内部实现的前提下，遍历一个聚合对象的内部元素。
//2. 相比传统的编程模式，迭代器模式可以隐藏遍历元素的所需操作。

abstract class IIterator
{
    public abstract function First();

    public abstract function Next();

    public abstract function IsDone();

    public abstract function CurrentItem();
}

//具体迭代器
class ConcreteIterator extends IIterator
{
    private $aggre;
    private $current = 0;

    public function __construct(array $_aggre)
    {
        $this->aggre = $_aggre;
    }

    //返回第一个
    public function First()
    {
        return $this->aggre[0];
    }

    //返回下一个
    public function Next()
    {
        $this->current++;
        if ($this->current < count($this->aggre)) {
            return $this->aggre[$this->current];
        }
        return false;
    }

    //返回是否IsDone
    public function IsDone()
    {
        return $this->current >= count($this->aggre) ? true : false;
    }

    //返回当前聚集对象
    public function CurrentItem()
    {
        return $this->aggre[$this->current];
    }
}

$iterator = new ConcreteIterator(array('hi', 'oo', 'hh'));
$item = $iterator->First();
echo $item . "\n";
while (!$iterator->IsDone()) {
    echo "{$iterator->CurrentItem()}：你好么！\n";
    $iterator->Next();
}