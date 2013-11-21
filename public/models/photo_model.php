<?php
class Photo_Model extends Model{
   public $files = array();
   // public $result = array();
    public $per_page = 2;
    public $msg = null;
    function __construct(){
        parent::__construct();
    }
    public function photoList(){

        $page = $_POST["page"];
        $cur_page = $page;
        if(!$page) $page = 1; //если нет, то присваеваем 1
        $start = $this->per_page * ($page - 1);
        $finish = $start + $this->per_page;
        $this->files = scandir('public/images/photo',1);
        //print_r($files);
        //выволим изображения
        for ($i = $start; $i < $finish; $i++) {
            if (($this->files[$i] != ".") || ($this->files[$i] != "..")) {
                // проверка чтоб файл заканчивался на:
                if(( $this->getExt($this->files[$i]) == "png") ||
                    ( $this->getExt($this->files[$i]) == "jpeg") ||
                    ( $this->getExt($this->files[$i]) == "jpg") ||
                    ( $this->getExt($this->files[$i]) == "gif"))
                {
                    $this->result[$i]=$this->files[$i];
                }
            }
        }
        //print_r($this->result);
        return $this->result;

    }
    public function getExt($filename) {
        return end(explode(".", $filename));
    }
    public function paginationPhoto(){
         $count_files = count($this->files);//всего файлов
         $no_of_paginations = ceil($count_files /$this->per_page);  //всего страниц
        $page = $_POST["page"];
        if(!$page) $page = 1; //если нет, то присваеваем 1
        $cur_page = $page;
        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
         $last_btn = true;
        //print_r($cur_page);
        if ($cur_page >= 7) {
            $start_loop = $cur_page - 3;
            if ($no_of_paginations > $cur_page + 3)
                $end_loop = $cur_page + 3;
            else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
                $start_loop = $no_of_paginations - 6;
                $end_loop = $no_of_paginations;
            } else {
                $end_loop = $no_of_paginations;
            }
        } else {
            $start_loop = 1;
            if ($no_of_paginations > 7)
                $end_loop = 7;
            else
                $end_loop = $no_of_paginations;
        }
        $this->msg .= "<div class='pagination'><ul>";

// FOR ENABLING THE FIRST BUTTON
        if ($first_btn && $cur_page > 1) {
            $this->msg .= "<li p='1' class='active'>First</li>";
        } else if ($first_btn) {
            $this->msg .= "<li p='1' class='inactive'>First</li>";
        }

// FOR ENABLING THE PREVIOUS BUTTON
        if ($previous_btn && $cur_page > 1) {
            $pre = $cur_page - 1;
            $this->msg .= "<li p='$pre' class='active'>Previous</li>";
        } else if ($previous_btn) {
            $this->msg .= "<li class='inactive'>Previous</li>";
        }
        /*Вывод страниц*/
        for ($i = $start_loop; $i <= $end_loop; $i++) {

            if ($cur_page == $i)

                $this->msg .= "<li p='$i' style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
            else

                 $this->msg .= "<li p='$i' class='active'>{$i}</li>";
        }

// TO ENABLE THE NEXT BUTTON
        if ($next_btn && $cur_page < $no_of_paginations) {
            $nex = $cur_page + 1;
            $this->msg .= "<li p='$nex' class='active'>Next</li>";
        } else if ($next_btn) {
            $this->msg .= "<li class='inactive'>Next</li>";
        }

// TO ENABLE THE END BUTTON
        if ($last_btn && $cur_page < $no_of_paginations) {
            $this->msg .= "<li p='$no_of_paginations' class='active'>Last</li>";
        } else if ($last_btn) {
            $this->msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
        }
        $goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
        $total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
        $msg = $this->msg . "</ul>" . $goto . $total_string . "</div>";  // Content for pagination
        return $msg;

        //return  $count_pages;
    }
}