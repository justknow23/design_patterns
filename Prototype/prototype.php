<?php
//原型模式
/*
 * 原型模式：通过复制已经存在的对象来创建新对象。
 * 通过原型实例指定创建对象的种类，并且通过copy这些原型创建信的对象
 * 是创建型模式
 * 有的时候创建一个对象有很多步骤才算是完成一个完整的创建过程，我要再创建一个的话，还得从头开始，不如复制，使用原型模式实现。
 * 原型模式还可以某个对象在运行中的状态
 */

interface Potrotype
{
    public function copy();
}

//通过在原型类中加一个copy方法，使得这个原型类的实例可以被复制
class Demo implements Potrotype
{
    private $state;

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function copy()
    {
        return clone $this;
    }
}

class Client
{
    public static function main()
    {
        $obj1 = new Demo();
        $obj1->setState(23);
        $obj2 = $obj1->copy();
        $res = $obj2->getState();
        echo $res;
    }
}