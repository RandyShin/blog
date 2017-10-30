<?php
    class Person{
        private $name;
        private static $count= 0;
        function __construct($name)
        {
            $this->name = $name;
            self::$count = self::$count+1;
        }
        function enter(){
            echo "<h1>Enter ".$this->name."</h1>";
            echo self::$count;
        }
        function getCount(){
            echo self::$count;
        }
    }


    $p1 = new Person('randy');
    $p1->enter();
    $p2 = new Person('don');
    $p2->enter();
    $p3 = new Person('jay');
    $p3->enter();
    $p4 = new Person('kevin');
    $p4->enter();
    echo $p4->getCount();