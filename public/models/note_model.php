<?php
class Note_Model extends Model{
    function __construct(){
        parent::__construct();
    }
    public function noteGetList($id){
        return $this->WorksSql($id);
    }
    public function noteCommentList($id){
        $SQL = 'SELECT *
                    FROM note_comments  WHERE work_id = "'.$id.'" ORDER BY note_id DESC';
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

            $this->db->insert('note_comments',array(
                'note_author' => $data['author'],
                'note_desc' => $data['text'],
                'work_id' => $data['id'],
                'note_date' => $data['note_date']
            ));
            header ('Location:'.URL.'note/view?id='. $data['id']);
        }
    }
    public function WorksSql($id){

        $SQL = 'SELECT work_id,work_title,work_desc,
                    work_view,work_author,work_date,cat_name,
                    work_img,work_img1,work_img2,work_img3,
                    work_img4,work_img5,work_img6,work_rating
                    FROM works  WHERE work_id = "'.$id.'"';
        $result = $this->db->select($SQL);
        $new = $result[0]['work_view'] + 1;
        $dataInfo = array(
            'work_view' => $new
        );
        $this->db->update('works',$dataInfo,"`work_id` = '".$id."'");
        return $result;
    }
}