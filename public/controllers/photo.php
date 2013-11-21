<?php
class Photo extends Controller{
    function __construct(){
        parent::__construct();
        //$this->view->js = array('photo/js/photo.js');
    }
    public function index(){
        $this->view->title = 'Фотографии';

        $this->view->photoList = $this->model->photoList();
        $this->view->photoPagination = $this->model->paginationPhoto();
        $this->view->render('photo/index');
    }
}