<?php
class Ali
{
    function buy()
    {
        echo "阿里支付<br/>";
    }

    function sell()
    {
        echo "阿里卖出<br/>";
    }
}

class QQ
{
    function buy()
    {
        echo "QQ支付<br/>";
    }

    function sell()
    {
        echo "QQ卖出<br/>";
    }
}

class Jingdong
{
    function buy()
    {
        echo "京东支付<br/>";
    }

    function sell()
    {
        echo "京东卖出<br/>";
    }
}

/**门面模式核心角色
 * Class FacadeCompany
 */
class FacadeCompany
{
    private $ali;

    private $qq;

    private $jingdong;

    function __construct()
    {
        $this->ali=new Ali();
        $this->jingdong=new Jingdong();
        $this->qq=new QQ();
    }

    function buy()
    {
        $this->qq->buy();
        $this->ali->buy();
    }

    function sell()
    {
        $this->jingdong->sell();
    }
}

$a=new FacadeCompany();
$a->buy();
$a->sell();