<?php
/* 在模板模式（Template Pattern）中，一个抽象类公开定义了执行它的方法的方式/模板。
 * 它的子类可以按需要重写方法实现，但调用将以抽象类中定义的方式进行。这种类型的设计模式属于行为型模式。
 * 定义一个操作中的算法的骨架，而将一些步骤延迟到子类中。模板方法使得子类可以不改变一个算法的结构即可重定义该算法的某些特定步骤。
 */
abstract class Game
{
    abstract function initialize();
    abstract function startPlay();
    abstract function endPlay();

    public final function play()
    {
        //初始化游戏
        $this->initialize();

        //开始游戏
        $this->startPlay();

        //结束游戏
        $this->endPlay();
    }
}

class Cricket extends Game
{
    public function initialize()
    {
        echo "Cricket Game Initialized! Start playing.";
        echo '<br/>';
    }

    public function startPlay()
    {
        echo "Cricket Game Started. Enjoy the game!";
        echo '<br/>';
    }

    public function endPlay()
    {
        echo "Cricket Game Finished!";
        echo '<br/>';
    }
}
class Football extends Game
{
    public function initialize()
    {
        echo "Football Game Initialized! Start playing.";
        echo '<br/>';
    }

    public function startPlay()
    {
        echo "Football Game Started. Enjoy the game!";
        echo '<br/>';
    }

    public function endPlay()
    {
        echo "Football Game Finished!";
        echo '<br/>';
    }
}

$game = new Cricket();
$game->play();

$game2 = new Football();
$game2->play();