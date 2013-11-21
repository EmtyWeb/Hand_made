<?php
class Users_Model extends Model{
    function __construct(){
        parent::__construct();
    }
    public function userList(){
        $SQL = 'SELECT user_id,user_login,user_role,email FROM users';
        return $this->db->select($SQL);

    }
    public function listOneUser($id){
        $SQL = 'SELECT user_id,user_login,user_role,first_name,last_name,email,phone,age,gender,birthday,city,country,favorite_cat,user_desc FROM users WHERE user_id = :user_id';
        return $this->db->select($SQL, array(':user_id' => $id));
    }
    public function create(){
        //принимаем данные из формы для создания юзера
        $data = array();
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];
        $data['email'] = $_POST['email'];
        $this->db->insert('users',array(
            'user_login' => $data['login'],
            'user_password' => trim(stripslashes(htmlspecialchars(Hash::create('md5',$data['password'],HASH_KEY)))),
            'user_role' => $data['role'],
            'email' => $data['email']
        ));
    }
    public function editSave($id){
        $data = array();
        $data['user_id'] = $id;
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];
        $data['email'] = $_POST['email'];
        $data['last_name'] = $_POST['last_name'];
        $data['first_name'] = $_POST['first_name'];
        $data['phone'] = $_POST['phone'];
        $data['age'] = $_POST['age'];
        $data['gender'] = $_POST['gender'];
        $data['birthday'] = $_POST['birthday'];
        $data['city'] = $_POST['city'];
        $data['country'] = $_POST['country'];
        $data['users_desc'] = $_POST['users_desc'];
        $data['favorite_cat'] = $_POST['favorite_cat'];

        if(empty($_POST['password'])){
            $dataInfo = array(
                'user_login' => $data['login'],
                'user_role' => $data['role'],
                'email' => $data['email'],
                'last_name' => $data['last_name'],
                'first_name' => $data['first_name'],
                'phone' => $data['phone'],
                'age' => $data['age'],
                'gender' => $data['gender'],
                'birthday' => $data['birthday'],
                'city' => $data['city'],
                'country' => $data['country'],
                'user_desc' => $data['user_desc'],
                'favorite_cat' => $data['favorite_cat']
            );
        }else{
            $dataInfo = array(
                'user_login' => $data['login'],
                'user_password' => trim(stripslashes(htmlspecialchars(Hash::create('md5',$data['password'],HASH_KEY)))),
                'user_role' => $data['role'],
                'email' => $data['email'],
                'last_name' => $data['last_name'],
                'first_name' => $data['first_name'],
                'phone' => $data['phone'],
                'age' => $data['age'],
                'gender' => $data['gender'],
                'birthday' => $data['birthday'],
                'city' => $data['city'],
                'country' => $data['country'],
                'user_desc' => $data['user_desc'],
                 'favorite_cat' => $data['favorite_cat']
            );
        }


        $this->db->update('users',$dataInfo,"`user_id` = {$data['user_id']}");
    }
    public function delete($id){
        $result = $this->db->select('SELECT user_role FROM users WHERE user_id = :user_id', array(':user_id' => $id));

        if ($result[0]['user_role'] == 'owner')
            return false;

        $this->db->delete('users', "user_id = '$id'");
    }
}