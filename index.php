<?php

class SomeClass
{
    public $someProperty = 3;

    public function getDumpObject() :object
    {
        return new class {
            public function echoMessage(String $message)
            {
                echo '<pre>';
                echo $message;
                echo '</pre>';
            }

            public function dumpArray(Array $array)
            {
                echo '<pre>';
                var_dump($array);
                echo '</pre>';
            }
        };
    }
}

$obj = new SomeClass();
$obj->getDumpObject()->echoMessage('anonymous classes');
