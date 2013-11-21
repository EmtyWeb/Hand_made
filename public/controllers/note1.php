<?php
class Note extends Controller{
    public function __construct(){
        parent::__construct();
        Auth::check_login();
    }
    public function index(){
        $this->view->userList = $this->model->noteList();
        $this->view->render('note/index');
    }
    public function create(){
        //принимаем данные из формы для создания юзера
        $data = array();
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];

        //@TODO: error check
        //вызываем model c нашими данными
        $this->model->create($data);
        header ('Location:'.URL.'users');
    }
    public function edit($id){
        //fetch invidual user
        $this->view->user = $this->model->notelistOneUser($id);
        $this->view->render('users/edit');
    }
    public function editSave($id){
        $data = array();
        $data['id'] = $id;
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];

        //@TODO: error check
        //вызываем model c нашими данными
        $this->model->editSave($data);
        header ('Location:'.URL.'users');
    }
    public function delete($id){
        $this->model->delete($id);
        header ('Location:'.URL.'users');
    }
}