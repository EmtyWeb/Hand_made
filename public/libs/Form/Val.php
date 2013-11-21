<?php
class Val{

    function __construct(){}

    public function minlength($data, $arg){
        if(strlen($data) < $arg){
            return "Минимальное колличество символов $arg";
        }
    }
    public function maxlength($data, $arg){
        if(strlen($data) > $arg){
            return "Максимальное колличество символов $arg";
        }
    }
    public function digit($data){
        if(ctype_digit($data)== false){
            return "Только число";
        }
    }
    public function __call($name, $arguments)
    {
        throw new Exception("$name does not exist inside of: " . __CLASS__);
    }
}