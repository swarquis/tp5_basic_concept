<?php
namespace app\common;

class Test1{
    private $name;
    public function __construct($name="Sean"){
        $this->name = $name;
    }
    public function setname($name){
        $this->name = $name;
    }
    public function getname(){
        return __METHOD__." name:".$this->name;
    }
}