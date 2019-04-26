<?php
//合成模式或者叫组合模式
//属于设计模式中的结构型模式之一，主要用途就是把多个对象组合成一个树状的结构来表示“整体—部分”的关系。

abstract Class IComposite
{
    protected $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    abstract function Add(IComposite $place);

    abstract function Display($level);
}

/** 组合器类
 *  Composite
 */
Class Composite extends IComposite
{
    private $places = array();

    function __construct($name)
    {
        parent::__construct($name);
    }

    function Add(IComposite $place)
    {
        $this->places[] = $place;
    }

    function Display($level = 1)
    {
        $pre = "";

        for ($i = 0; $i < $level; $i++) {
            $pre .= "->";
        }
        $pre .= $this->name . "\n";
        echo $pre;
        if ($this->places) {
            foreach ($this->places as $v) {
                $v->Display($level + 1);
            }
        }
    }
}

$h = new Composite("河北省");

$d = new Composite("邯郸市");

$s = new Composite("邯山区");
$c = new Composite("丛台区");

$h->Add($d);

$d->Add($s);
$d->Add($c);

$h->Display(); // 显示