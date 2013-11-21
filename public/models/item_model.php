<?php
class Item_Model extends Model{
    function __construct(){
        parent::__construct();
    }
    public function itemGetList($id){
        return $this->itemWorksSql($id);
    }
    public function itemCommentList($id){
        $SQL = 'SELECT *
                    FROM item_comments  WHERE fair_id = "'.$id.'" ORDER BY notef_id DESC';
        return $this->db->select($SQL);
    }
    public function commentRun(){
        $data = array();
        $data['author'] = $_POST['author'];
        $data['text'] = $_POST['text'];
        $data['id'] = $_POST['id'];
        $data['sub_com'] = $_POST['sub_com'];
        if(isset($data['sub_com'])){
        $data['note_date'] = date("Y-m-d");

            $this->db->insert('item_comments',array(
                'notef_author' => $data['author'],
                'notef_desc' => $data['text'],
                'fair_id' => $data['id'],
                'notef_date' => $data['note_date']
            ));
            header ('Location:'.URL.'item/view?id='. $data['id']);
        }
    }
    public function itemWorksSql($id){

        $SQL = 'SELECT fair_id,fair_title,fair_desc,
                    fair_view,fair_author,fair_date,catf_name,fair_img,
                    fair_img1,fair_img2,fair_img3,fair_img4,
                    fair_img5,fair_img6,price,current
                    FROM fair  WHERE fair_id = "'.$id.'"';
        $result = $this->db->select($SQL);
        $new = $result[0]['fair_view'] + 1;
        $dataInfo = array(
            'fair_view' => $new
        );
        $this->db->update('fair',$dataInfo,"`fair_id` = '".$id."'");
        return $result;
    }
    public function itemBig(){

    }
}