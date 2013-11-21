<?php
class Users extends Controller{
    public function __construct(){
        parent::__construct();
        Auth::check_login();
    }
    public function index(){
        $this->view->userList = $this->model->userList();
        $this->view->render('users/index');
    }
    public function create(){
        //@TODO: error check
        //вызываем model c нашими данными
        $this->model->create();
        header ('Location:'.URL.'users');
    }
    public function edit($id){
       //fetch invidual user
        $this->view->user = $this->model->listOneUser($id);
        $this->view->render('users/edit');
    }
    public function editSave($id){
        //@TODO: error check
        //вызываем model c нашими данными
        $this->model->editSave($id);
        header ('Location:'.URL.'users');
    }
    public function delete($id){
        $this->model->delete($id);
        header ('Location:'.URL.'users');
    }
}