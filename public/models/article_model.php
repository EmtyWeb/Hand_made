<?php
class Article_Model extends Model{
    function __construct(){
        parent::__construct();
    }
    public function articleMenuList(){
        $SQL = 'SELECT cat_art_name,cat_art_desc
                    FROM cat_article';
        return $this->db->select($SQL);

    }
}