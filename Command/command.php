<?php
/**
 * 将一个请求封装为一个对象，从而使用户可用不同的请求对客户进行参数化。对请求排队或记录请求日志，以及支持撤销的操作。
 * 命令模式以松散耦合主题为基础，发送消息、命令和请求，或通过一组处理程序发送任意内容。每个处理程序都会自行判断自己能否处理请求。
 * 如果可以，该请求被处理，进程停止。您可以为系统添加或移除处理程序，而不影响其他处理程序。
 */

interface Command
{ // 命令角色
    public function execute(); // 执行方法
}

class ConcreteCommand implements Command
{ // 具体命令方法
    private $_receiver;

    public function __construct(Receiver $receiver)
    {
        $this->_receiver = $receiver;
    }

    public function execute()
    {
        $this->_receiver->action();
    }
}

class Receiver
{ // 接收者角色
    private $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function action()
    {
        echo 'receive some cmd:' . $this->_name;
    }
}

class Invoker
{ // 请求者角色
    private $_command;

    public function __construct(Command $command)
    {
        $this->_command = $command;
    }

    public function action()
    {
        $this->_command->execute();
    }
}

$receiver = new Receiver('hello world');
$command = new ConcreteCommand($receiver);
$invoker = new Invoker($command);
$invoker->action();

/*********************************************/

interface ICommand
{
    function onCommand($name, $args);
}

class CommandChain
{
    private $_commands = array();

    public function addCommand($cmd)
    {
        $this->_commands [] = $cmd;
    }

    public function runCommand($name, $args)
    {
        foreach ($this->_commands as $cmd) {
            if ($cmd->onCommand($name, $args)) {
                return;
            }
        }
    }
}

class UserCommand implements ICommand
{
    public function onCommand($name, $args)
    {
        if ($name != 'addUser') {
            return false;
        }
        echo("UserCommand handling 'addUser'\n");
        return true;
    }
}

class MailCommand implements ICommand
{
    public function onCommand($name, $args)
    {
        if ($name != 'mail') {
            return false;
        }
        echo("MailCommand handling 'mail'\n");
        return true;
    }
}

$cc = new CommandChain();
$cc->addCommand(new UserCommand());
$cc->addCommand(new MailCommand());
$cc->runCommand('addUser', null);
$cc->runCommand('mail', null);