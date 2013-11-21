<?php
class Dashboard extends Controller{
    function __construct(){
        parent::__construct();
        Auth::check_login();
        $this->view->js = array('dashboard/js/dashboard.js');
    }
    public function index(){
        $this->view->title = 'dashboard';
        $this->view->render('dashboard/index');
    }
    public function logout(){
        Session::destroy();
        header ('Location:'.URL);
        exit;
    }
    public function xhrInsert(){
        $this->model->xhrInsert();
    }
    public function xhrGetLists(){
        $this->model->xhrGetLists();
    }
    public function xhrDelete(){
        $this->model->xhrDelete();
    }
}