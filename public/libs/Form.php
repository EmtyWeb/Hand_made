<?php
require "Form/Val.php";
class Form{
    /**
     *
     * - Fill out a form
     *    - POST to PHP
     *  - Sanitize
     *  - Validate
     *  - Return Data
     *  - Write to Database

     */
    private $error = array();
    private $val = array();
    private $currentItem = null;
    private $postFileArray = array();
    function __construct(){

        $this->val = new Val();
    }
    //пост
    public function post($file){
        $this->postFileArray[$file] = trim(stripslashes(htmlspecialchars($_POST[$file])));
        $this->currentItem = $file;
        return $this;
    }

    public function fetch($fileName = false){
       if($fileName){
           if(isset($this->postFileArray[$fileName])){
               return  $this->postFileArray[$fileName];
           }else{
               return false;
           }

       }else{
           return  $this->postFileArray;
       }
    }
    //валидатор
    public function val($typeOfValidation, $arg = null){

        if ($arg == null){
            $error = $this->val->{$typeOfValidation}($this->postFileArray[$this->currentItem]);
        }else{
            $error = $this->val->{$typeOfValidation}($this->postFileArray[$this->currentItem],$arg);
        }

        if($error){
            $this->error[$this->currentItem] = $error;
        }
        echo $error;
        //$this->val->minlength('dog',$arg);
        return $this;
    }
    public function submit()
    {
        if (empty($this->error))
        {
            return true;
        }
        else
        {
            $str = '';
            foreach ($this->error as $key => $value)
            {
                $str .= $key . ' => ' . $value . "\n";
            }
            throw new Exception($str);
        }
    }
}