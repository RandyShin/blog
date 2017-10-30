<?php
class Animal{
    function run(){
        print('running...<br>');
    }
    function  breathe(){
        print('breathe...<br>');
    }
}

class human extends Animal {
    function thinking(){
        print('thinking...<br>');
    }
    function talking(){
        print('talking...<br>');
    }
    function run(){
        print('walk<br>');
    }
}


$ani = new Animal();
$human = new human();

$ani->run();

$ani->breathe();

$human->run();
$human->breathe();
$human->talking();
$human->thinking();