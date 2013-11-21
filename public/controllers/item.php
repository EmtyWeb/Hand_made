<?php
class Item extends Controller{
    function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->view->title = '404 error';
        $this->view->msg = 'This page doesnt exists';
        $this->view->render('error/index');
    }

    public function view(){
        $id=$_GET['id'];
        $this->view->title = 'Ярморка';
        $this->view->itemGetList = $this->model->itemGetList($id);
        $this->view->itemCommentList = $this->model->itemCommentList($id);
        $this->view->render('item/index');
    }
    public function big_item(){
        $this->view->title = 'Работа';
        $this->view->render('item/big_item');
    }
    public function commentRun(){
        $this->model->commentRun();
    }
}