<?php
//从面向过程的角度来看，首先是观察者向主题注册，注册完之后，主题再通知观察者做出相应的操作，整个事情就完了。
//从面向对象的角度来看，主题提供注册和通知的接口，观察者提供自身操作的接口。（这些观察者拥有一个同一个接口。）观察者利用主题的接口向主题注册，而主题利用观察者接口通知观察者。耦合度相当之低。

// 主题接口
interface Subject
{
    public function register(Observer $observer);

    public function notify();
}

// 观察者接口
interface Observer
{
    public function watch();
}

// 主题
class Action implements Subject
{
    public $_observers = array();

    public function register(Observer $observer)
    {
        $this->_observers[] = $observer;
    }

    public function notify()
    {
        foreach ($this->_observers as $observer) {
            $observer->watch();
        }

    }
}

// 观察者
class Cat implements Observer
{
    public function watch()
    {
        echo "Cat watches TV<hr/>";
    }
}

class Dog implements Observer
{
    public function watch()
    {
        echo "Dog watches TV<hr/>";
    }
}

class People implements Observer
{
    public function watch()
    {
        echo "People watches TV<hr/>";
    }
}


// 应用实例
$action = new Action();
$action->register(new Cat());
$action->register(new People());
$action->register(new Dog());
$action->notify();