<?php
class Error extends Controller{
    function __construct(){
        parent::__construct();
        //echo 'This page doesnt exists';
    }
    public function index(){
        $this->view->title = '404 error';
        $this->view->msg = 'This page doesnt exists';
        $this->view->render('error/index');
    }
}