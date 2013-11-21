<?php
class Index extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->js = array('index/js/index.js');
    }
    public function index(){
        $this->view->AllGetList = $this->model->AllGetList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('index/index');

    }
}