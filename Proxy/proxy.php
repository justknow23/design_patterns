<?php

//代理模式为其他对象提供一种代理以控制对这个对象的访问。在某些情况下，一个对象不适合或者不能直接引用另一个对象，而代理对象可以在客户端和目标对象之间起到中介的作用。
interface IGiveGift
{
    function giveRose();

    function giveChocolate();
}

/**追求者
 * Class Follower
 */
class Follower implements IGiveGift
{
    private $girlName;

    function __construct($name = '李天霸')
    {
        $this->girlName = $name;
    }

    function giveRose()
    {
        echo "{$this->girlName}:这是我送你的玫瑰，望你能喜欢。<br/>";
    }

    function giveChocolate()
    {
        echo "{$this->girlName}:这是我送你的巧克力，望你能收下。<br/>";
    }
}

//代理者
class Proxy implements IGiveGift
{
    private $follower;

    function __construct($name = '李天霸')
    {
        $this->follower = new Follower($name);
    }

    function giveRose()
    {
        $this->follower->giveRose();
    }

    function giveChocolate()
    {
        $this->follower->giveChocolate();
    }
}

$proxy = new Proxy('周坦一');
$proxy->giveRose();
$proxy->giveChocolate();