<?php

namespace app\components;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Service
{

    protected static function addLogInfo($name, $msg)
    {
        $log = new Logger($name);
        $log->pushHandler(new StreamHandler(ROOT . '/logs.log', Logger::DEBUG));

        $log->addInfo($msg);
    }

    protected static function addLogError($name, $msg)
    {
        $log = new Logger($name);
        $log->pushHandler(new StreamHandler(ROOT . '/logs.log', Logger::DEBUG));

        $log->addError($msg);
    }

    protected static function isDataSet($post, $arrVar)
    {
        foreach ($arrVar as $item)
            if(!isset($post[$item]))
                return false;

        return true;
    }

}