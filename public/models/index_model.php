<?php
class Index_Model extends Model{
    public $num = 9;
    public $msg = null;
    public $total;
    public $cat;
    public $page;
    public $start_loop;
    public $end_loop;
    function __construct(){
        parent::__construct();
    }
    public function AllGetList(){
        /*$SQL = 'SELECT work_title,work_view,work_author,work_img,work_id
        FROM works ORDER BY work_rating DESC LIMIT 1,24';
       // print_r($this->db->select($SQL));
        return $this->db->select($SQL);*/

        $this->page = $_GET["page"];
        $countSQL = 'SELECT COUNT(*) FROM fair';
        $result = $this->db->select($countSQL);
        $count = $result[0]['COUNT(*)'];
        $this->total = intval(($count - 1) / $this->num) + 1;
        $this->page = intval($this->page);
        if(empty($this->page) or $this->page < 0) $this->page = 1;
        if($this->page > $this->total) $this->page = $this->total;
        $start = $this->page * $this->num - $this->num;
        $SQL = 'SELECT fair_title,fair_view,fair_author,
                       fair_img,fair_id,catf_name,fair_rating,price,current
                        FROM fair ORDER BY fair_rating DESC LIMIT '.$start.', '.$this->num;
        return $this->db->select($SQL);
    }
    /*Постраничная навигация*/
    public function pag(){
        /*Вывод по 7 нумерации*/

        // Проверяем нужны ли стрелки назад
        if ($this->page != 1){
            if($_SERVER['REQUEST_URI'] == '/index?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/index'){
                $this->msg .=  '<a href="'.URL.'index?page=1"><<</a>
                         <a href="'.URL.'index?page='. ($this->page - 1) .'"><</a> ';
            }else{
                $this->msg .=  '<a href="'.URL.'index/'.$this->cat.'?page=1"><<</a>
                         <a href="'.URL.'index/'.$this->cat.'?page='. ($this->page - 1) .'"><</a> ';
            }
        }else{
            $this->msg .=  '<span><</span> <span><<</span>';
        }
        //$this->total++;
        $this->num++;
        /*Вывод 7 страниц*/

        $this->sevensteps();
        for($i=$this->start_loop; $i<=$this->end_loop; $i++ ){
            if($_SERVER['REQUEST_URI'] == '/index?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/index'){
                if($this->page == $i){
                    $this->msg .= "<a style='color:#fff;background-color:#006699;' href='".URL."index?page=".$i."'>$i</a>";
                }else{
                    $this->msg .= "<a href='".URL."index?page=".$i."'>$i</a>";
                }
            }else{
                if($this->page == $i){
                    $this->msg .= "<a style='color:#fff;background-color:#006699;' href='".URL."index/".$this->cat."?page=".$i."'>$i</a>";
                }else{
                    $this->msg .= "<a href='".URL."index/".$this->cat."?page=".$i."'>$i</a>";
                }
            }
        }
        //Проверяем нужны ли стрелки вперед
        if ($this->page != $this->total){
            if($_SERVER['REQUEST_URI'] == '/index?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/index'){
                $this->msg .=  ' <a href= "'.URL.'index?page='. ($this->page + 1) .'">></a>
                                   <a href= "'.URL.'index?page='. ($this->total). '">>></a>';
            }else{
                $this->msg .=  ' <a href= "'.URL.'index/'.$this->cat.'?page='. ($this->page + 1) .'">></a>
                                   <a href= "'.URL.'index/'.$this->cat.'?page='. ($this->total). '">>></a>';
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
}