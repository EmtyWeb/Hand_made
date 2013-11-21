<?php
class Note extends Controller{
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
        $this->view->title = 'Работа';
        $this->view->noteGetList = $this->model->noteGetList($id);
        $this->view->noteCommentList = $this->model->noteCommentList($id);
        $this->view->render('note/index');
    }
    public function big_item(){
        $this->view->title = 'Работа';
        $this->view->render('note/big_item');
    }
    public function commentRun(){
        $this->model->commentRun();
    }
}