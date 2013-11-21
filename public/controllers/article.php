<?php
class Article extends Controller{
    function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->view->title = 'Статьи';
        $this->view->MenuList = $this->model->articleMenuList();
        $this->view->render('article/index');
    }
    public function knitting(){
        $this->view->title = 'Про вязание';
        //$this->view->MenuList = $this->model->articleMenuList();
        $this->view->render('article/index');
    }
    public function embroidery(){
        $this->view->title = 'Про вышивку';
        //$this->view->MenuList = $this->model->articleMenuList();
        $this->view->render('article/index');
    }
    public function costume(){
        $this->view->title = 'Про бижутерию';
        //$this->view->MenuList = $this->model->articleMenuList();
        $this->view->render('article/index');
    }
    public function toys(){
        $this->view->title = 'Про игрушки';
        //$this->view->MenuList = $this->model->articleMenuList();
        $this->view->render('article/index');
    }
    public function lace(){
        $this->view->title = 'Про кружевоплетение';
        //$this->view->MenuList = $this->model->articleMenuList();
        $this->view->render('article/index');
    }
    public function origami(){
        $this->view->title = 'Про оригами';
        //$this->view->MenuList = $this->model->articleMenuList();
        $this->view->render('article/index');
    }
    public function cooking(){
        $this->view->title = 'Про кулинарию';
        //$this->view->MenuList = $this->model->articleMenuList();
        $this->view->render('article/index');
    }
    public function book(){
        $this->view->title = 'Для декаративно-прикладного исскуства';
        //$this->view->MenuList = $this->model->articleMenuList();
        $this->view->render('article/index');
    }
    public function sewing(){
        $this->view->title = 'Про шитье';
        //$this->view->MenuList = $this->model->articleMenuList();
        $this->view->render('article/index');
    }
    public function other(){
        $this->view->title = 'Про другое';
        //$this->view->MenuList = $this->model->articleMenuList();
        $this->view->render('article/index');
    }
}