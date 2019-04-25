<?php

interface Target
{
    public function read();

    public function write();
}

class Adaptee
{
    public function read()
    {
        echo '被适配者需要适配一下喽';
    }
}

class Adapter implements Target
{
    private $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function read()
    {
        $this->adaptee->read();
    }

    public function write()
    {
        echo '我爱北京天安门';
    }
}

$adapter = new Adapter(new Adaptee());
$adapter->read();
$adapter->write();

#也可以把适配器这样弄一下
class Adapter1
{
    private $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }
    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->adaptee, $name), $arguments);
    }
}
