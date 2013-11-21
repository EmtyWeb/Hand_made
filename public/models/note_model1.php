<?php
class Note_Model extends Model{
    function __construct(){
        parent::__construct();
    }
    public function noteList(){
        return $this->db->select('SELECT * FROM note WHERE userid = :userid',
            array('userid' => $_SESSION['id']));

    }
    public function noteListOneUser($id){
        $SQL = 'SELECT * FROM note WHERE id = :id';
        return $this->db->select($SQL, array(':id' => $id));

    }
    public function create($data){

        $this->db->insert('note',array(
            'login' => $data['login'],
            'title' => $data['title'],
            'description' => $data['description']
        ));

    /*$STH = $this->db->prepare('INSERT INTO users(`login`,
                                                     `password`,
                                                     `role`)
                                                VALUES (:login, :password, :role)');
        $STH->execute(array(
            ':login' => $data['login'],
            ':password' => trim(stripslashes(htmlspecialchars(Hash::create('md5',$data['password'],HASH_KEY)))),
            ':role' => $data['role']
        ));*/
    }
    public function editSave($data){

        $dataInfo = array(
            'login' => $data['login'],
            'title' => $data['title'],
            'description' => $data['description']
        );

        $this->db->update('note',$dataInfo,"`id` = {$data['id']}");

        /*$STH = $this->db->prepare('UPDATE users
                                   SET `login` = :login,
                                       `password` = :password,
                                       `role` = :role WHERE id = :id ');

        $STH->execute(array(
            ':id' => $data['id'],
            ':login' => $data['login'],
            ':password' =>  trim(stripslashes(htmlspecialchars(Hash::create('md5',$data['password'],HASH_KEY)))),
            ':role' => $data['role']
        ));*/
    }
    public function delete($id){
        $result = $this->db->select('SELECT role FROM users WHERE id = :id', array(':id' => $id));

        if ($result[0]['role'] == 'owner')
            return false;

        $this->db->delete('users', "id = '$id'");
    }
}