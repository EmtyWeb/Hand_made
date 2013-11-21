<?php
class Controller {
    function __construct(){
        //создаем вьюху
        $this->view = new View();
    }
    //загружаем модель
    public function loadModel($name){
        $path = 'models/'.$name.'_model.php';
        //если существует то подключаем
        if (file_exists($path)){
            require 'models/'.$name.'_model.php';

            $modelName= $name. '_Model';
            $this->model=new $modelName();
        }
    }
}