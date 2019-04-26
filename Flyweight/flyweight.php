<?php
//享元模式
//享元模式使用共享物件，用来尽可能减少内存使用量以及分享资讯给尽可能多的相似物件；
//它适合用于只是因重复而导致使用无法令人接受的大量内存的大量物件。通常物件中的部分状态是可以分享。
//常见做法是把它们放在外部数据结构，当需要使用时再将它们传递给享元。

interface IBlogModel
{
    function showTime();

    function showColor();
}

class JobsBlog implements IBlogModel
{
    function showTime()
    {
        echo "纽约时间：5点整\n";
    }

    function showColor()
    {
        echo "白色\n";
    }
}

class LeiJunBlog implements IBlogModel
{
    function showTime()
    {
        echo "北京时间：17点整\n";
    }

    function showColor()
    {
        echo "黄色\n";
    }
}

class BlogFactory
{
    private $model = array();

    function getBlogModel($name)
    {
        if (isset($this->model[$name])) {
            echo "我是缓存里的\n";
            return $this->model[$name];
        } else {
            try {
                echo "我是新创建的\n";
                $class = new ReflectionClass($name);
                $this->model[$name] = $class->newInstance();
                return $this->model[$name];
            } catch (ReflectionException $e) {
                echo "你要求的对象我不能创建哦。\n";
                return null;
            }
        }
    }
}

$factory = new BlogFactory();
$jobs = $factory->getBlogModel("JobsBlog");
if ($jobs) {
    $jobs->showTime();
    $jobs->showColor();
}

$jobs1 = $factory->getBlogModel("JobsBlog");
if ($jobs1) {
    $jobs1->showTime();
    $jobs1->showColor();
}

$leijun = $factory->getBlogModel("LeiJunBlog");
if ($leijun) {
    $leijun->showTime();
    $leijun->showColor();
}

$leijun1 = $factory->getBlogModel("LeiJunBlog");
if ($leijun1) {
    $leijun1->showTime();
    $leijun1->showColor();
}

$aFanda = $factory->getBlogModel("aFanda");
if ($aFanda) {
    $aFanda->showTime();
    $aFanda->showColor();
}