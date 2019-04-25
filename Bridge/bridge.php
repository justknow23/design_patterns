<?php

abstract class Abstraction
{
    // 抽象化角色，抽象化给出的定义，并保存一个对实现化对象的引用。
    protected $imp;

    public function operation(){}
}

class RefinedAbstraction extends Abstraction
{
    public function __construct(Implementor $imp)
    {
        $this->imp = $imp;
    }
    public function operation()
    {
        $this->imp->operationImp();
    }
}

abstract class Implementor
{
    // 实现化角色, 给出实现化角色的接口，但不给出具体的实现。
    abstract public function operationImp();
}

class ConcreteImplementorA extends Implementor
{ // 具体化角色A
    public function operationImp()
    {
        echo 'ConcreteImplementorA';
    }
}

class ConcreteImplementorB extends Implementor
{ // 具体化角色B
    public function operationImp()
    {
        echo 'ConcreteImplementorB';
    }
}

// client
$abstraction = new RefinedAbstraction(new ConcreteImplementorA());
$abstraction->operation();
$abstraction = new RefinedAbstraction(new ConcreteImplementorB());
$abstraction->operation();