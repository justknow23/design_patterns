<?php
//备忘录模式定义：备忘录模式又叫做快照模式或Token模式，在不破坏封闭的前提下，捕获一个对象的内部状态，并在该对象之外保存这个状态。这样以后就可将该对象恢复到原先保存的状态。
// 角色：
//1.发起人：负责创建一个备忘录，用以记录当前时刻自身的内部状态，并可使用备忘录恢复内部状态。发起人能够依据须要决定备忘录存储自己的哪些内部状态。
//2.备忘录：负责存储发起人对象的内部状态，并能够防止发起人以外的其它对象訪问备忘录。备忘录有两个接口：管理者仅仅能看到备忘录的窄接口，他仅仅能将备忘录传递给其它对象。发起人却可看到备忘录的宽接口。同意它訪问返回到先前状态所须要的全部数据。
//3.管理者:负责存取备忘录，不能对内容进行訪问或者操作。

/**
 * 发起人类
 */
class Sponsor
{
    public $time = 36000;
    public $title = "奋斗者";
    public $money = 0;

    public function subTime()
    {
        $this->time--;
    }

    public function addMoney()
    {
        $this->money += 1000;
    }

    public function changeTitle($title)
    {
        $this->title = $title;
    }

    /**
     * 备份当前的基础数据属性
     * @dateTime 2017-02-13
     */
    public function backup()
    {
        return new Backup($this->time, $this->money, $this->title);
    }

    /**
     * 数据还原
     * @dateTime 2017-02-13
     */
    public function reback(Backup $backup)
    {
        $this->time = $backup->time;
        $this->title = $backup->title;
        $this->money = $backup->money;
    }
}

/**
 * 存储类
 */
class Backup
{
    public $time;
    public $title;
    public $money;

    public function __construct($time, $money, $title)
    {
        $this->time = $time;
        $this->title = $title;
        $this->money = $money;
    }
}

/**
 * 管理者类
 */
class Manager
{
    public $data;
}


//客户端应用
$Sponsor = new Sponsor();
//备份初始状态
$Manager = new Manager();
$Manager->data = $sponsor->backup();
while ($sponsor->time > 0) {
    $sponsor->addMoney();
    $sponsor->subTime();
    if ($sponsor->money >= 1000000) {
        $sponsor->changeTitle("骄傲者");
    }
    if ($sponsor->money >= 10000000) {
        $sponsor->changeTitle("能力者");
    }
    if ($sponsor->money >= 100000000) {
        $sponsor->changeTitle("成功者");
    }
}
var_dump($sponsor);
//还原初始状态
$sponsor->reback($Manager->data);
var_dump($sponsor);