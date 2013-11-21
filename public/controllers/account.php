<?php
class Account extends Controller{
    function __construct(){
        parent::__construct();
        Auth::check_login();
    }
    public function index(){
        $this->view->title = 'Личный кабинет';
        $this->view->infoUser = $this->model->infoUser();
        $this->view->infoWatch = $this->model->infoWatch();
        $this->view->infoWorkWatch = $this->model->infoWorkWatch();
        $this->view->render('account/index');
    }
    public function profile(){
        $this->view->title = 'Личный данные';
        $this->view->infoProfileList = $this->model->infoProfileList();
        $this->view->render('account/profile');
    }
    public function profileEdit(){
        $this->model->profileEditSafety();
        header ('Location:'.URL.'account/index');

    }
    public function safety(){
        $this->view->title = 'Пароль и безопасномть';
        $this->model->passSafety();
        $this->view->render('account/safety');
    }
    public function view(){
    $this->view->title = 'Все работы';
    $this->view->myListItem = $this->model->listItem();
    $this->view->render('account/viewItem');
}
    public function fair(){
        $this->view->title = 'Моя ярмарка';
        $this->view->myListItem = $this->model->listFairItem();
        $this->view->render('account/fairItem');
    }
    public function create(){
        $this->view->title = 'Добавление работы';
        $this->view->cat = $this->model->viewCatItem();
        $this->view->render('account/createItem');
    }
    public function createItem(){
        $this->model->createItem();
        header ('Location:'.URL.'account/view');
    }
    public function create_f(){
        $this->view->title = 'Добавление работы';
        $this->view->cat = $this->model->viewCatFair();
        $this->view->render('account/createFair');
    }
    public function create_fair(){
        $this->model->createFair();
        header ('Location:'.URL.'account/fair');
    }
    public function edit($id){
        $this->view->title = 'Редактирование работы';
        $this->view->thisItem = $this->model->editItem($id);
        $this->view->cat = $this->model->viewCatItem();
        $this->view->render('account/addItem');
    }
    public function edit_f($id){
        $this->view->title = 'Редактирование работы';
        $this->view->thisItem = $this->model->editFairItem($id);
        $this->view->cat = $this->model->viewCatFair();
        $this->view->render('account/editFair');
    }
    public function update_f($id){
        $this->model->updateFairItem($id);
        header ('Location:'.URL.'account/fair');
    }
    public function delete_f($id){
        $this->model->deleteFairItem($id);
        header ('Location:'.URL.'account/fair');
    }
    public function updateItem($id){
        $this->model->updateItem($id);
        header ('Location:'.URL.'account/view');
    }

    public function delete($id){
        $this->model->deleteItem($id);
        header ('Location:'.URL.'account/view');
    }
    public function addUser($id){
            $this->model->addUserLook($id);
            header ('Location:'.URL.'index');
    }
}