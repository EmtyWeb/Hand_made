<?php
class Photo_Model extends Model{
    public $count=null;
    public $id=null;
    public $img_root=null;
    public $start=null;
    public $finish=null;
    public $files=null;
    public $path=null;
    public $result = array();
    function __construct(){
        parent::__construct();
    }
    public function photoList(){
        $this->data=array();
        $this->count = 5; // Количество изображений на странице
        $this->id = 1; //если нет, то присваеваем 1
        $this->img_root = 'public/images/photo/';
        $this->start = $this->count * ($this->id - 1);
        $this->finish = $this->start + $this->count;
        $this->files = scandir($this->img_root,1); //в массив с конца
        //выволим изображения
        for ($i = $this->start; $i < $this->finish; $i++) {
            if (($this->files[$i] != ".") || ($this->files[$i] != "..")) {
                // проверка чтоб файл заканчивался на:
                if(( $this->getExt($this->files[$i]) == "png") ||
                    ( $this->getExt($this->files[$i]) == "jpeg") ||
                    ( $this->getExt($this->files[$i]) == "jpg") ||
                    ( $this->getExt($this->files[$i]) == "gif"))
                {
                    $this->result[$i] = $this->img_root.$this->files[$i];
                }
            }
        }
        return $this->result;

    }
    public function getExt($filename) {
        return end(explode(".", $filename));
    }
    public function paginationPhoto(){
        $count_files = count($this->files);//всего файлов
        $count_pages = ceil($count_files / $this->count);  //всего страниц
        //$first =  $count_pages-($count_pages-1);
        for($i = 0; $i < $count_pages; $i++) {
             $s[$i] = $i + 1;
        }
        return $s;
    }
}