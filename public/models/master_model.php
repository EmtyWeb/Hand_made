<?php
class Master_Model extends Model{
    public $num = 16;
    public $msg = null;
    public $total;
    public $page;
    public $start_loop;
    public $end_loop;
    public $work_author;
    function __construct(){
        parent::__construct();
    }
    public function newMasterList(){
        $SQL = 'SELECT user_login,user_img,user_id
                    FROM users ORDER BY reg_date DESC LIMIT 1,8';
        return $this->db->select($SQL);
    }
    public function goodMasterList(){
        $this->page = $_GET["page"];
        $countSQL = 'SELECT COUNT(*) FROM users';
        $result = $this->db->select($countSQL);
        $count = $result[0]['COUNT(*)'];
        $this->total = intval(($count - 1) / $this->num) + 1;
        $this->page = intval($this->page);
        if(empty($this->page) or $this->page < 0) $this->page = 1;
        if($this->page > $this->total) $this->page = $this->total;
        $start = $this->page * $this->num - $this->num;
        $SQL = 'SELECT user_login,user_img,user_id
                    FROM users ORDER BY reg_date DESC LIMIT '.$start.', '.$this->num;
      // print_r($this->db->select($SQL));
        return $this->db->select($SQL);
    }
    public function pag(){
        // Проверяем нужны ли стрелки назад
        if ($this->page != 1){
            if($_SERVER['REQUEST_URI'] == '/master?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/master'){
                $this->msg .=  '<a href="'.URL.'master?page=1"><<</a>
                         <a href="'.URL.'master?page='. ($this->page - 1) .'"><</a> ';
            }elseif($_SERVER['REQUEST_URI'] == '/master/info/'.$this->work_author.'?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/master/info/'.$this->work_author.''){
                $this->msg .=  '<a href="'.URL.'master/info/'.$this->work_author.'?page=1"><<</a>
                         <a href="'.URL.'master/info/'.$this->work_author.'?page='. ($this->page - 1) .'"><</a> ';
            }
        }else{
            $this->msg .=  '<span><</span> <span><<</span>';
        }
        //$this->total++;
        $this->num++;
        /*Вывод 7 страниц*/

        $this->sevensteps();

        for($i=$this->start_loop; $i<=$this->end_loop; $i++ ){
            if($_SERVER['REQUEST_URI'] == '/master?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/master'){
                if($this->page == $i){
                    $this->msg .= "<a id = 'pag_color' href='".URL."master?page=".$i."'>$i</a>";
                }else{
                    $this->msg .= "<a href='".URL."master?page=".$i."'>$i</a>";
                }
            }elseif($_SERVER['REQUEST_URI'] == '/master/info/'.$this->work_author.'?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/master/info/'.$this->work_author.''){
                if($this->page == $i){
                    $this->msg .= "<a id = 'pag_color' href='".URL."master/info/'.$this->work_author.'?page=".$i."'>$i</a>";
                }else{
                    $this->msg .= "<a href='".URL."master/info/'.$this->work_author.'?page=".$i."'>$i</a>";
                }
            }
        }
        //Проверяем нужны ли стрелки вперед
        if ($this->page != $this->total){
            if($_SERVER['REQUEST_URI'] == '/master?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/master'){
                $this->msg .=  ' <a href= "'.URL.'master?page='. ($this->page + 1) .'">></a>
                                   <a href= "'.URL.'master?page='. ($this->total). '">>></a>';
            }elseif($_SERVER['REQUEST_URI'] == '/master/info/'.$this->work_author.'?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/master/info/'.$this->work_author.''){
                $this->msg .=  ' <a href= "'.URL.'master/info/'.$this->work_author.'?page='. ($this->page + 1) .'">></a>
                                   <a href= "'.URL.'master/info/'.$this->work_author.'?page='. ($this->total). '">>></a>';
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


    public function masterInfo($id){
        $SQL = 'SELECT user_login,first_name,last_name,
                       email,age,phone,gender,birthday,city,
                       country,user_desc,favorite_cat,
                       user_like,user_img,reg_date
                  FROM users WHERE user_login ="'.$id.'"';
        return $this->db->select($SQL);
    }
    public function allWork($id){
        $this->work_author = $id;
        $this->page = $_GET["page"];
        $countSQL = 'SELECT COUNT(*) FROM works WHERE work_author ="'.$id.'"';
        $result = $this->db->select($countSQL);
        $count = $result[0]['COUNT(*)'];
        $this->total = intval(($count - 1) / $this->num) + 1;
        $this->page = intval($this->page);
        if(empty($this->page) or $this->page < 0) $this->page = 1;
        if($this->page > $this->total) $this->page = $this->total;
        $start = $this->page * $this->num - $this->num;
        $SQL = 'SELECT *
                  FROM works WHERE work_author ="'.$id.'" LIMIT '.$start.', '.$this->num;
        return $this->db->select($SQL);

    }
}