<?php
class Login extends Controller{
    function __construct(){
        parent::__construct();
    }
    public function index(){
       //echo trim(stripslashes(htmlspecialchars(Hash::create('md5','',HASH_KEY))));
        $this->view->render('login/index');
    }
    public function loginRun(){
        $this->model->Run();
    }
    public function forgot(){
        //$this->model->forgotRun();
        $this->view->render('login/forgot');
    }
    public function forgotRun(){
        $this->model->forgotRuning();
        //$this->view->render('login/forgot');
    }
}