<?php
/**
 * 解释器模式 用于分析一个实体的关键元素，并且针对每个元素提供自己的解释或相应动作。
 * 解释器模式非常常用，比如PHP的模板引擎 就是非常常见的一种解释器模。
 */

// 密文接口
Class SecretWord
{
    /**
     * 密文
     * @var string
     */
    public $content;
}

// 解释器抽象类
abstract class Interpreter
{
    /**
     * 解释方法
     * @access public
     * @param  object $secretword 密文内容
     */
    public function Translate(SecretWord $secretword)
    {
        if (empty($secretword->content)) {
            return false;
        }

        $key = mb_substr($secretword->content, 0, 1);

        $secretword->content = mb_substr($secretword->content, 1);

        return $this->Excute($key);
    }

    /**
     * 执行方法
     * @access public
     * @param  string $key 密文
     */
    public abstract function Excute($key);
}

// 英文文法类
Class Grammar1 extends Interpreter
{

    /**
     * 执行方法
     * @access public
     * @param  string $key 密文
     */
    public function Excute($key)
    {
        $letter = "";
        switch ($key) {
            case "A":
                $letter = "Apple";
                break;
            case "B":
                $letter = "Blue";
                break;
            case "C":
                $letter = "China";
                break;
            case "D":
                $letter = "Double";
                break;
            case "E":
                $letter = "Egg";
                break;
            case "F":
                $letter = "France";
                break;

        }
        return $letter;
    }
}

// 中文文法类
Class Grammar2 extends Interpreter
{
    /**
     * 执行方法
     * @access public
     * @param  string $key 密文
     */
    public function Excute($key)
    {
        $letter = "";
        switch ($key) {
            case "A":
                $letter = "苹果";
                break;
            case "B":
                $letter = "蓝色";
                break;
            case "C":
                $letter = "中国";
                break;
            case "D":
                $letter = "双数";
                break;
            case "E":
                $letter = "鸡蛋";
                break;
            case "F":
                $letter = "法兰西";
                break;

        }
        return $letter;
    }
}

$secretword = new SecretWord();
$secretword->content = "A B C D E F";
while (!empty($secretword->content)) {
    // 可以使用两种文法
    $Grammar = new Grammar1();     // 解析英文
    $Grammar = new Grammar2();  // 解析中文

    // 解释
    echo $Grammar->Translate($secretword) . "<br/>";
}
