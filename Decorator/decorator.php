<?php

interface Component
{
    public function operation();
}

abstract class Decorator implements Component
{
    // 装饰角色
    protected $component;

    public function __construct(Component $component)
    {
        $this->component = $component;
    }

    public function operation()
    {
        $this->component->operation();
    }
}

class ConcreteDecorator1 extends Decorator
{
    // 具体装饰类
    public function __construct(Component $component)
    {
        parent::__construct($component);
    }

    public function operation()
    {
        parent::operation();    //  调用装饰类的操作
        $this->addedOperation1();   //  新增加的操作
    }

    public function addedOperation1()
    {
        echo '增加点操作1';
    }
}

class ConcreteComponent implements Component
{
    public function operation()
    {
        echo '实现接口啦啦啦';
    }
}

// clients
$component = new ConcreteComponent();
$decorator1 = new ConcreteDecorator1($component);
$decorator1->operation();
