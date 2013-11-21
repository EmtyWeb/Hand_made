<?php
class Registration extends Controller{
    function __construct(){
        parent::__construct();
        //echo "We are in registration";
    }
    public function index(){
        $this->view->title = 'Registration';
        $this->view->render('registration/index');
    }
    public function registrationRun(){
        $this->model->registrationRun();
    }
    public function activation(){
        $this->model->activation();
    }
}