<?php
class Fair_Model extends Model{
    public $num = 24;
    public $msg = null;
    public $total;
    public $cat;
    public $page;
    public $start_loop;
    public $end_loop;
    function __construct(){
        parent::__construct();
    }
    public function mainFairList(){
        $SQL = 'SELECT catf_name,catf_desc
                    FROM cat_fair';
        return $this->db->select($SQL);
    }
    public function fairList(){
        $this->page = $_GET["page"];
        $countSQL = 'SELECT COUNT(*) FROM fair';
        $result = $this->db->select($countSQL);
        $count = $result[0]['COUNT(*)'];
        $this->total = intval(($count - 1) / $this->num) + 1;
        $this->page = intval($this->page);
        if(empty($this->page) or $this->page < 0) $this->page = 1;
        if($this->page > $this->total) $this->page = $this->total;
        $start = $this->page * $this->num - $this->num;
        $SQL = 'SELECT fair_id,fair_title,fair_desc,fair_rating,
                       fair_view,fair_author,fair_date,catf_name,fair_img,price,current
                        FROM fair ORDER BY fair_date DESC LIMIT '.$start.', '.$this->num;
        return $this->db->select($SQL);
    }

    public function accessories(){
        return $this->WorksSql('accessories');
    }
    public function toys(){
        return $this->WorksSql('toys');
    }
    public function amulets(){
        return $this->WorksSql('amulets');
    }
    public function pictures(){
        return $this->WorksSql('pictures');
    }
    public function diferent(){
        return $this->WorksSql('diferent');
    }
    public function for_home(){
        return $this->WorksSql('for_home');
    }
    public function clothes(){
        return $this->WorksSql('clothes');
    }



    /*Постраничная навигация*/
    public function pag(){
        /*Вывод по 7 нумерации*/

        // Проверяем нужны ли стрелки назад
        if ($this->page != 1){
            if($_SERVER['REQUEST_URI'] == '/fair?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/categories'){
                $this->msg .=  '<a href="'.URL.'fair?page=1"><<</a>
                         <a href="'.URL.'fair?page='. ($this->page - 1) .'"><</a> ';
            }else{
                $this->msg .=  '<a href="'.URL.'fair/'.$this->cat.'?page=1"><<</a>
                         <a href="'.URL.'fair/'.$this->cat.'?page='. ($this->page - 1) .'"><</a> ';
            }
        }else{
            $this->msg .=  '<span><</span> <span><<</span>';
        }
        //$this->total++;
        $this->num++;
        /*Вывод 7 страниц*/

        $this->sevensteps();
        for($i=$this->start_loop; $i<=$this->end_loop; $i++ ){
            if($_SERVER['REQUEST_URI'] == '/fair?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/fair'){
                if($this->page == $i){
                    $this->msg .= "<a id = 'pag_color' href='".URL."fair?page=".$i."'>$i</a>";
                }else{
                    $this->msg .= "<a href='".URL."fair?page=".$i."'>$i</a>";
                }
            }else{
                if($this->page == $i){
                    $this->msg .= "<a id = 'pag_color' href='".URL."fair/".$this->cat."?page=".$i."'>$i</a>";
                }else{
                    $this->msg .= "<a href='".URL."fair/".$this->cat."?page=".$i."'>$i</a>";
                }
            }
        }
        //Проверяем нужны ли стрелки вперед
        if ($this->page != $this->total){
            if($_SERVER['REQUEST_URI'] == '/fair?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/fair'){
                $this->msg .=  ' <a href= "'.URL.'fair?page='. ($this->page + 1) .'">></a>
                                   <a href= "'.URL.'fair?page='. ($this->total). '">>></a>';
            }else{
                $this->msg .=  ' <a href= "'.URL.'fair/'.$this->cat.'?page='. ($this->page + 1) .'">></a>
                                   <a href= "'.URL.'fair/'.$this->cat.'?page='. ($this->total). '">>></a>';
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
    public function WorksSql($cat){
        $this->cat = $cat;
        $this->page = $_GET["page"];
        $SQL = 'SELECT COUNT(*) FROM fair WHERE catf_name = "'.$cat.'"';
        $result = $this->db->select($SQL);
        $count = $result[0]['COUNT(*)'];
        $this->total = intval(($count - 1) / $this->num) + 1;
        $page = intval($this->page);
        if(empty($this->page) or $this->page < 0) $this->page = 1;
        if($this->page > $this->total) $this->page = $this->total;
        $start = $this->page * $this->num - $this->num;
        $SQL = 'SELECT fair_id,fair_title,fair_desc,fair_rating,
                    fair_view,fair_author,fair_date,catf_name,fair_img
                    FROM fair  WHERE catf_name = "'.$cat.'"
                    ORDER BY fair_date DESC LIMIT '.$start.','.$this->num;
        return $this->db->select($SQL);
    }
}