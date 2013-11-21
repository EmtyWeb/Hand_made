<?php
class Categories_Model extends Model{
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
    public function mainWorksList(){
        $SQL = 'SELECT cat_name,cat_desc
                    FROM cat_work';
        return $this->db->select($SQL);
    }
    public function AllGetList(){
        $this->page = $_GET["page"];
        $countSQL = 'SELECT COUNT(*) FROM works';
        $result = $this->db->select($countSQL);
        $count = $result[0]['COUNT(*)'];
        $this->total = intval(($count - 1) / $this->num) + 1;
        $this->page = intval($this->page);
        if(empty($this->page) or $this->page < 0) $this->page = 1;
        if($this->page > $this->total) $this->page = $this->total;
        $start = $this->page * $this->num - $this->num;
        $SQL = 'SELECT work_id,work_title,work_desc,
                       work_view,work_author,work_date,cat_name,work_img,work_rating
                        FROM works ORDER BY work_date DESC LIMIT '.$start.', '.$this->num;
        return $this->db->select($SQL);
    }

    public function oneWorkList(){
        return $this->WorksSql('Sewing');
    }
    public function twoWorkList(){
        return $this->WorksSql('Knitting');
    }
    public function threeWorkList(){
        return $this->WorksSql('Embroidery');
    }
    public function fourWorkList(){
        return $this->WorksSql('Macrame');
    }
    public function fiveWorkList(){
        return $this->WorksSql('Toys');
    }
	public function sixWorkList(){
        return $this->WorksSql('Origami');
    }
	public function sevenWorkList(){
        return $this->WorksSql('Patchwork');
    }
	public function eightWorkList(){
        return $this->WorksSql('Tapestry');
    }
	public function nineWorkList(){
        return $this->WorksSql('Carving');
    }
	public function tenWorkList(){
        return $this->WorksSql('Felting');
    }
	public function elevenWorkList(){
        return $this->WorksSql('Decoratioт_of_lightning');
    }
	public function twelveWorkList(){
        return $this->WorksSql('Lace');
    }
	public function thirteenWorkList(){
        return $this->WorksSql('Costume');
    }
	public function fourteenWorkList(){
        return $this->WorksSql('Modeling');
    }
	public function fifteenWorkList(){
        return $this->WorksSql('Decoupage');
    }
	public function sixteenWorkList(){
        return $this->WorksSql('Painting_items');
    }
	public function seventeenWorkList(){
        return $this->WorksSql('Mosaic');
    }
	public function eighteenWorkList(){
        return $this->WorksSql('Working_with_glass');
    }
	public function nineteenWorkList(){
        return $this->WorksSql('Leather_processing');
    }
	public function twentyWorkList(){
        return $this->WorksSql('Postcards');
    }
	public function twentyOneWorkList(){
        return $this->WorksSql('Fitodesign');
    }
	public function twentyTwoWorkList(){
        return $this->WorksSql('Decoration_of_the_tapes');
    }
	public function twentyThreeWorkList(){
        return $this->WorksSql('Ceramics');
    }
	public function twentyFourWorkList(){
        return $this->WorksSql('Painting');
    }
	public function twentyFiveWorkList(){
        return $this->WorksSql('Picture');
    }
	public function twentySixWorkList(){
        return $this->WorksSql('Batik');
    }
	public function twentySevenWorkList(){
        return $this->WorksSql('Beading');
    }
	public function twentyEightWorkList(){
        return $this->WorksSql('Thread');
    }
	public function twentyNineWorkList(){
        return $this->WorksSql('Forging');
    }
	public function thirtyWorkList(){
        return $this->WorksSql('Pyrography');
    }
    public function thirtyOneWorkList(){
        return $this->WorksSql('Landscape');
    }
    public function thirtyTwoWorkList(){
        return $this->WorksSql('Cooking');
    }
	public function thirtyThreeWorkList(){
        return $this->WorksSql('Makeup');
    }
	public function thirtyFourWorkList(){
        return $this->WorksSql('Tattooing');
    }
    public function thirtyFiveWorkList(){
        return $this->WorksSql('Charms');
    }
	
    public function WorksSql($cat){
        $this->cat = $cat;
        $this->page = $_GET["page"];
        $SQL = 'SELECT COUNT(*) FROM works WHERE cat_name = "'.$cat.'"';
        $result = $this->db->select($SQL);
        $count = $result[0]['COUNT(*)'];
        $this->total = intval(($count - 1) / $this->num) + 1;
        $page = intval($this->page);
        if(empty($this->page) or $this->page < 0) $this->page = 1;
        if($this->page > $this->total) $this->page = $this->total;
        $start = $this->page * $this->num - $this->num;
        $SQL = 'SELECT work_id,work_title,work_desc,
                    work_view,work_author,work_date,cat_name,work_img,work_rating
                    FROM works  WHERE cat_name = "'.$cat.'"
                    ORDER BY work_date DESC LIMIT '.$start.','.$this->num;
        return $this->db->select($SQL);
    }
    /*Постраничная навигация*/
    public function pag(){
        /*Вывод по 7 нумерации*/

        // Проверяем нужны ли стрелки назад
        if ($this->page != 1){
           if($_SERVER['REQUEST_URI'] == '/categories?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/categories'){
               $this->msg .=  '<a href="'.URL.'categories?page=1"><<</a>
                         <a href="'.URL.'categories?page='. ($this->page - 1) .'"><</a> ';
           }else{
               $this->msg .=  '<a href="'.URL.'categories/'.$this->cat.'?page=1"><<</a>
                         <a href="'.URL.'categories/'.$this->cat.'?page='. ($this->page - 1) .'"><</a> ';
           }
        }else{
            $this->msg .=  '<span><</span> <span><<</span>';
        }
        //$this->total++;
        $this->num++;
        /*Вывод 7 страниц*/

        $this->sevensteps();
        for($i=$this->start_loop; $i<=$this->end_loop; $i++ ){
            if($_SERVER['REQUEST_URI'] == '/categories?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/categories'){
                if($this->page == $i){
                    $this->msg .= "<a id = 'pag_color' href='".URL."categories?page=".$i."'>$i</a>";
                }else{
                    $this->msg .= "<a href='".URL."categories?page=".$i."'>$i</a>";
                }
            }else{
                if($this->page == $i){
                    $this->msg .= "<a id = 'pag_color' href='".URL."categories/".$this->cat."?page=".$i."'>$i</a>";
                }else{
                    $this->msg .= "<a href='".URL."categories/".$this->cat."?page=".$i."'>$i</a>";
                }
            }
        }
        //Проверяем нужны ли стрелки вперед
        if ($this->page != $this->total){
            if($_SERVER['REQUEST_URI'] == '/categories?page='.$this->page OR $_SERVER['REQUEST_URI'] == '/categories'){
                $this->msg .=  ' <a href= "'.URL.'categories?page='. ($this->page + 1) .'">></a>
                                   <a href= "'.URL.'categories?page='. ($this->total). '">>></a>';
            }else{
                $this->msg .=  ' <a href= "'.URL.'categories/'.$this->cat.'?page='. ($this->page + 1) .'">></a>
                                   <a href= "'.URL.'categories/'.$this->cat.'?page='. ($this->total). '">>></a>';
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