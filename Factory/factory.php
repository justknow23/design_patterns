<?php

abstract class Button
{
    public function color(){}
}

class WinButton extends Button
{
    public function color()
    {
        // TODO: Implement color() method.
        echo 'win color';
    }
}

class MacButton extends Button
{
    public function color()
    {
        // TODO: Implement color() method.
        echo 'mac color';
    }
}

interface ButtonFactory
{
    public function createButton($type);
}

class MyButtonFactory implements ButtonFactory
{
    // 实现工厂方法
    public function createButton($type)
    {
        switch ($type) {
            case 'Mac':
                return new MacButton();
            case 'Win':
                return new WinButton();
        }
    }
}

$button_obj = new MyButtonFactory();
print_r($button_obj->createButton('Mac'));
print_r($button_obj->createButton('Win'));