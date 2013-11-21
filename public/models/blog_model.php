<?php
class Blog_Model extends Model{
    public $num = 6;
    public $msg = null;
    public $total;
    public $page;
    public $start_loop;
    public $end_loop;
    function __construct(){
        parent::__construct();
    }
    public function newsList(){
        $this->page = $_GET["page"];
        $countSQL = 'SELECT COUNT(*) FROM news';
        $result = $this->db->select($countSQL);
        $count = $result[0]['COUNT(*)'];
        $this->total = intval(($count - 1) / $this->num) + 1;
        $this->page = intval($this->page);
        if(empty($this->page) or $this->page < 0) $this->page = 1;
        if($this->page > $this->total) $this->page = $this->total;
        $start = $this->page * $this->num - $this->num;
        $SQL = 'SELECT news_id,news_title,news_desc,
                       news_view,news_author,
                       news_date,news_img,news_rating
                    FROM news ORDER BY news_date DESC LIMIT '.$start.', '.$this->num;
        return $this->db->select($SQL);

    }
    public function pag(){
        /*Вывод по 7 нумерации*/

        // Проверяем нужны ли стрелки назад
        if ($this->page != 1){
            if($_SERVER['REQUEST_URI'] == '/blog?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/blog'){
                $this->msg .=  '<a href="'.URL.'blog?page=1"><<</a>
                         <a href="'.URL.'blog?page='. ($this->page - 1) .'"><</a> ';
            }
        }else{
            $this->msg .=  '<span><</span> <span><<</span>';
        }
        //$this->total++;
        $this->num++;
        /*Вывод 7 страниц*/

        $this->sevensteps();

        for($i=$this->start_loop; $i<=$this->end_loop; $i++ ){
            if($_SERVER['REQUEST_URI'] == '/blog?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/blog'){
                if($this->page == $i){
                    $this->msg .= "<a id = 'pag_color' href='".URL."blog?page=".$i."'>$i</a>";
                }else{
                    $this->msg .= "<a href='".URL."blog?page=".$i."'>$i</a>";
                }
            }
        }
        //Проверяем нужны ли стрелки вперед
        if ($this->page != $this->total){
            if($_SERVER['REQUEST_URI'] == '/blog?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/blog'){
                $this->msg .=  ' <a href= "'.URL.'blog?page='. ($this->page + 1) .'">></a>
                                   <a href= "'.URL.'blog?page='. ($this->total). '">>></a>';
            }
        } else{
            $this->msg .=  '<span>></span> <span>>></span>';
        }
        return $this->msg;
    }
    /*Вывод только 7 страниц*/
    public function sevensteps(){
        if ($this->page >= 7) {
            $this->start_loop = $this->page - 3;
            if ($this->total > $this->page + 3)
                $this->end_loop = $this->page + 3;
            else if ($this->page <= $this->total && $this->page > $this->total - 6) {
                $this->start_loop = $this->total - 6;
                $this->end_loop = $this->total;

            } else {
                $this->end_loop = $this->total;
            }
        } else {
            $this->start_loop = 1;
            if ($this->total > 7)
                $this->end_loop = 7;
            else
                $this->end_loop = $this->total;
        }
    }


    public function newsText($id){
        $SQL = 'SELECT news_title,news_text,
                       news_view,news_author,
                       news_date,news_img,news_rating
                    FROM news WHERE news_id = '.$id;
        $result = $this->db->select($SQL);
        $new = $result[0]['news_view'] + 1;
        $dataInfo = array(
            'news_view' => $new
        );
        $this->db->update('news',$dataInfo,"`news_id` = '".$id."'");
        return $result;
    }
}