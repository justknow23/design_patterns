<?php

/**责任链（chain of responsibility）模式很像异常的捕获和处理，当一个问题发生的时候，
 * 当前对象看一下自己是否能够处理，不能的话将问题抛给自己的上级去处理，
 * 但是要注意这里的上级不一定指的是继承关系的父类，这点和异常的处理是不一样的。
 * 所以可以这样说，当问题不能解决的时候，将问题交给另一个对象去处理，
 * 就这样一直传递下去直至当前对象找不到下线了，处理结束。如下图所示，处于同等层次的类都继承自Support类，
 * 当当前对象不能处理的时候，会根据预先设定好的传递关系将问题交给下一个人，可以说是“近水楼台先得月”，
 * 就看有没有能力了。我们也可以看作是大家在玩一个传谜语猜谜底的小游戏，按照座位的次序以及规定的顺序传递，
 * 如果一个人能回答的上来游戏就结束，否则继续向下传，如果所有人都回答不出来也会结束。这样或许才是责任链的本质，
 * 体现出了同等级的概念。
 */
abstract class Responsibility
{ // 抽象责任角色
    protected $next; // 下一个责任角色

    public function setNext(Responsibility $l)
    {
        $this->next = $l;
        return $this;
    }

    abstract public function operate(); // 操作方法
}

class ResponsibilityA extends Responsibility
{
    public function __construct()
    {
    }

    public function operate()
    {
        if (false == is_null($this->next)) {
            $this->next->operate();
            echo 'Res_A start' . "<br>";
        }
    }
}

class ResponsibilityB extends Responsibility
{
    public function __construct()
    {
    }

    public function operate()
    {
        if (false == is_null($this->next)) {
            $this->next->operate();
            echo 'Res_B start';
        }
    }
}

$res_a = new ResponsibilityA();
$res_b = new ResponsibilityB();
$res_a->setNext($res_b);
$res_a->operate();