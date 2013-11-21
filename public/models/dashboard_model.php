<?php
class Dashboard_Model extends Model{
    function __construct(){
        parent::__construct();
    }
    public function xhrInsert(){
        $text = $_POST['text'];
        /*  $result = $this->db->insert('data', array('text' => $text, 'id' => $this->db->lastInsertId()));
        echo json_encode($result);*/
       $STH = $this->db->prepare('INSERT INTO data (text) VALUES (:text)');
        $STH->execute(array(':text' => $text));
        $data = array('text' => $text, 'id' => $this->db->lastInsertId());
        echo json_encode($data);
    }
    public function xhrGetLists(){
        $result = $this->db->select('SELECT * FROM data');
         echo json_encode($result);
     /* $STH = $this->db->prepare('SELECT * FROM data');
         $STH->setFetchMode(PDO::FETCH_ASSOC);
         $STH->execute();
         $data = $STH->fetchAll();
         echo json_encode($data);*/

    }
    public function xhrDelete(){
        $id = (int)$_POST['id'];
        $this->db->delete('data','id ='.$id);
        /*$STH = $this->db->prepare('DELETE FROM data WHERE id ='.$id);
        $STH->execute();*/

    }
}