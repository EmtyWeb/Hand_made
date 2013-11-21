<?php
class Fair extends Controller{
    function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->view->title = 'Ярмарка';
        $this->view->worksMainList = $this->model->mainFairList();
        $this->view->fairList = $this->model->fairList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('fair/index');
    }
    public function accessories(){
        $this->view->fCatList = $this->model->accessories();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('fair/index');
    }
    public function toys(){
        $this->view->fCatList = $this->model->toys();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('fair/index');
    }
    public function amulets(){
        $this->view->fCatList = $this->model->amulets();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('fair/index');
    }
    public function pictures(){
        $this->view->fCatList = $this->model->pictures();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('fair/index');
    }
    public function diferent(){
        $this->view->fCatList = $this->model->diferent();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('fair/index');
    }
    public function for_home(){
        $this->view->fCatList = $this->model->for_home();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('fair/index');
    }
    public function clothes(){
        $this->view->fCatList = $this->model->clothes();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('fair/index');
    }
}