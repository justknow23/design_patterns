<?php
//状态模式
interface IState
{
    /**
     * 显示等级接口函数  子类必须执行
     * @access public
     * @param  object $A
     */
    public function Grade(State $A);
}

// 等级黄金
Class Golden implements IState
{
    /**
     * 显示等级
     * @access public
     * @param  object $A
     */
    public function Grade(State $A)
    {
        if ($A->score > 0 && $A->score < 1000) {
            echo "{$A->score}点积分，黄金会员<br/>";
        } else {
            // 超出等级 进入下级
            $A->SetState(new Platinum());
            $A->Grade();
        }
    }
}

// 等级铂金
Class Platinum implements IState
{
    /**
     * 显示等级
     * @access public
     * @param  object $A
     */
    public function Grade(State $A)
    {
        if ($A->score < 10000 && $A->score >= 1000) {
            echo "{$A->score}点积分，铂金会员<br/>";
        } else {
            // 超出等级 进入下级
            $A->SetState(new Diamond());
            $A->Grade();
        }
    }
}

// 等级钻石
Class Diamond implements IState
{
    /**
     * 显示等级
     * @access public
     * @param  object $A
     */
    public function Grade(State $A)
    {
        if ($A->score >= 10000) {
            echo "{$A->score}点积分，铂金会员<br/>";
        }
    }
}

Class State
{
    /**
     * 初始化对象
     * @var object
     */
    private $first;

    /**
     * 积分值
     * @var int
     */
    public $score;

    /**
     * 构造函数 初始化
     * @access public
     */
    function __construct()
    {
        $this->first = new Golden();
    }

    /**
     * 设置下级等级
     * @access public
     * @param  object $s
     */
    function SetState(IState $s)
    {
        $this->first = $s;
    }

    /**
     * 显示等级
     * @access public
     */
    function Grade()
    {
        $this->first->Grade($this);
    }
}