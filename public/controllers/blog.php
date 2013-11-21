<?php
class Blog extends Controller{
    function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->view->title = 'Новости';
        $this->view->newsList = $this->model->newsList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('blog/index');

    }
    public function text($id){
        $this->view->title = 'Новости';
        $this->view->text = $this->model->newsText($id);
        $this->view->render('blog/text');
    }
}