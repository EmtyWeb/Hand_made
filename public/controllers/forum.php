<?php
class Forum extends Controller{
    function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->view->title = 'Форум';
        $this->view->render('forum/index');
    }
}