<?php
class Master extends Controller{
    function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->view->newMaster = $this->model->newMasterList();
        $this->view->goodMaster = $this->model->goodMasterList();
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('master/index');
    }
    public function info($id){
        $this->view->work = $this->model->allWork($id);
        $this->view->info = $this->model->masterInfo($id);
        $this->view->paginatorList = $this->model->pag();
        $this->view->render('master/info');
    }
}