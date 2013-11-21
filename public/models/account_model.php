<?php
class Account_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    /*Инормация о пользователе*/
    public function infoUser()
    {
        $SQL = 'SELECT user_login,first_name,
                       last_name,email,phone,user_img,
                       first_name,last_name,age,city,
                       country,user_desc,birthday
                FROM users WHERE user_login = "' . $_SESSION["name"] . '"';;
        return $this->db->select($SQL);
    }
    /*Ввывод работ которые понравились с их автором*/
    public function infoWatch()
    {
        $SQL = 'SELECT watch_user
                FROM user_watch WHERE watch_name = "' . $_SESSION["name"] . '"';
        $result = $this->db->select($SQL);
        foreach($result as $user){
            for($i=0;$i<count($user); $i++){
                $SQLi = 'SELECT work_id,work_title,work_img,work_author,work_date,cat_name
            FROM works WHERE work_author ="'.$user['watch_user'].'" LIMIT 1,4';
             //
               $my_result = $this->db->select($SQLi);
                if(!empty($my_result )){
                  $arr[] = $my_result;
                }
            }
        }
        return $arr;
    }
    /*Ввывод работ которые понравились с их автором*/
    public function infoWorkWatch()
    {
        $SQL = 'SELECT watch_work
                FROM user_watch_work WHERE watch_w_name = "' . $_SESSION["name"] . '" ORDER BY watch_date DESC';
        $result = $this->db->select($SQL);
        foreach($result as $item){
            $SQLi = 'SELECT work_title,work_img,work_author,cat_name
            FROM works WHERE work_title ="'.$item['watch_work'].'"';
            $result_array[] = $this->db->select($SQLi);
        }
   // print_r($result_array);
       return $result_array;

    }
    public function infoProfileList()
    {
        $SQL = 'SELECT user_id,user_login,user_role,first_name,last_name,email,
                       phone,age,gender,birthday,city,country, user_img,
                       favorite_cat,user_desc FROM users WHERE user_login = :user_login';
        return $this->db->select($SQL, array(':user_login' => $_SESSION["name"]));
    }
    /*Новый пароль*/
    public function passSafety()
    {
        $SQL = 'SELECT user_password FROM users WHERE user_login = "' . $_SESSION['name'] . '"';
        $our_pass = $this->db->select($SQL);
        // print_r($our_pass);
        if ($our_pass[0]['user_password'] == (Hash::create('md5', $_POST['password'], HASH_KEY))) {
            if (!empty($_POST['new_password']) and !empty($_POST['repeat_password'])) {
                if ($_POST['new_password'] == $_POST['repeat_password']) {
                    $passInfo = array(
                        'user_password' => trim(stripslashes(htmlspecialchars(Hash::create('md5', $_POST['new_password'], HASH_KEY))))
                    );
                    $this->db->update('users', $passInfo, "`user_login` = '" . $_SESSION['name'] . "'");
                }
            }
        }
    }
    /*Обновление профиля пользователя*/
    public function profileEditSafety()
    {
       // print_r($_FILES["picture"]);
        $img = $this->check_photo($_FILES["picture"]);
        if(empty($img['name'])) $img['name'] = '';

        $data = array();
        $data['login'] = $_SESSION['name'];
        $data['email'] = $_POST['email'];
        $data['last_name'] = $_POST['last_name'];
        $data['first_name'] = $_POST['first_name'];
        $data['phone'] = $_POST['phone'];
        $data['age'] = $_POST['age'];
        $data['gender'] = $_POST['gender'];
        $data['birthday'] = $_POST['birthday'];
        $data['city'] = $_POST['city'];
        $data['country'] = $_POST['country'];
        $data['user_desc'] = $_POST['user_desc'];
        $data['favorite_cat'] = $_POST['favorite_cat'];
        $data['user_img'] = $img['name'];

        $dataInfo = array(
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
            'favorite_cat' => $data['favorite_cat'],
            'user_img' => $data['user_img']
        );
        $this->db->update('users', $dataInfo, "`user_login` = '" . $_SESSION['name'] . "'");
        //путь к дериктории хранения фото работ
        $img_root = 'public/images/users/'.$_SESSION['name'].'/';
        //проверка на наличие директории
        if(!is_dir($img_root)){mkdir("public/images/users/".$_SESSION['name'], 0700);}
        move_uploaded_file($img['tmp_name'], $img_root.$img['name']);
    }
    /*Работы пользователя*/
    public function listItem()
    {
        $SQL = 'SELECT work_id,work_view,work_rating,work_title,work_img,work_author FROM works WHERE work_author ="' . $_SESSION['name'] . '"';
        return $this->db->select($SQL);
    }
    /*Работы пользователя Ярмарка*/
    public function listFairItem(){
        $SQL = 'SELECT fair_id,fair_view,fair_rating,fair_title,fair_img,fair_author,price,catf_name FROM fair WHERE fair_author ="' . $_SESSION['name'] . '"';
        return $this->db->select($SQL);
    }
    /*вывод категорий работ*/
    public function viewCatItem()
    {
        $SQL = 'SELECT cat_desc, cat_name FROM cat_work';
        return $this->db->select($SQL);
    }
    /*вывод категорий работ Ярмарка*/
    public function viewCatFair()
    {
        $SQL = 'SELECT catf_desc, catf_name FROM cat_fair';
        return $this->db->select($SQL);
    }
    /*создание работы*/
    public function createItem()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $img = $this->check_photo($_FILES["picture"]);
        $img1 = $this->check_photo($_FILES["picture1"]);
        $img2 = $this->check_photo($_FILES["picture2"]);
        $img3 = $this->check_photo($_FILES["picture3"]);
        $img4 = $this->check_photo($_FILES["picture4"]);
        $img5 = $this->check_photo($_FILES["picture5"]);
        $img6 = $this->check_photo($_FILES["picture6"]);
        //проверка на название работы
        $SQL = 'SELECT work_title,work_img FROM works';
        $work_title = $this->db->select($SQL);

        foreach ($work_title as $result) {
            if ($_POST['title'] != $result['work_title']) {
                $resultTitle = $_POST['title'];
            } else {
                echo "Имя занято!Такой файл существует";
                exit;
            }
        }
        if (isset($resultTitle)) {

            if(empty($img1['name'])) $img1['name'] = '';
            if(empty($img2['name'])) $img2['name'] = '';
            if(empty($img3['name'])) $img3['name'] = '';
            if(empty($img4['name'])) $img4['name'] = '';
            if(empty($img5['name'])) $img5['name'] = '';
            if(empty($img6['name'])) $img6['name'] = '';

                $this->db->insert('works', array(
                    'work_desc' => $_POST['description'],
                    'cat_name' => $_POST['categories'],
                    'work_img' => $img['name'],
                    'work_img1' =>  $img1['name'],
                    'work_img2' =>  $img2['name'],
                    'work_img3' =>  $img3['name'],
                    'work_img4' =>  $img4['name'],
                    'work_img5' =>  $img5['name'],
                    'work_img6' =>  $img6['name'],
                    'work_title' => $resultTitle,
                    'work_author' => $_SESSION['name'],
                    'work_date' => date('Y-m-d')
                ));
                //echo 'Добавлено';
                //путь к дериктории хранения фото работ
                $img_root = 'public/images/users/'.$_SESSION['name'].'/works/';
                //проверка на наличие директории
            if(!is_dir("public/images/users/".$_SESSION['name'])){mkdir("public/images/users/".$_SESSION['name'], 0700);}
            if(!is_dir($img_root)){mkdir("public/images/users/".$_SESSION['name']."/works/", 0700);}
                    move_uploaded_file($img['tmp_name'], $img_root.$img['name']);
                    move_uploaded_file($img1['tmp_name'], $img_root.$img1['name']);
                    move_uploaded_file($img2['tmp_name'], $img_root.$img2['name']);
                    move_uploaded_file($img3['tmp_name'], $img_root.$img3['name']);
                    move_uploaded_file($img4['tmp_name'], $img_root.$img4['name']);
                    move_uploaded_file($img5['tmp_name'], $img_root.$img5['name']);
                    move_uploaded_file($img6['tmp_name'], $img_root.$img6['name']);
            }
        }
    }
    /*создание работы - Ярморка*/
    public function createFair()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $img = $this->check_photo($_FILES["picture"]);
            $img1 = $this->check_photo($_FILES["picture1"]);
            $img2 = $this->check_photo($_FILES["picture2"]);
            $img3 = $this->check_photo($_FILES["picture3"]);
            $img4 = $this->check_photo($_FILES["picture4"]);
            $img5 = $this->check_photo($_FILES["picture5"]);
            $img6 = $this->check_photo($_FILES["picture6"]);

        $SQL = 'SELECT fair_title,fair_img FROM fair';
        $fair_title = $this->db->select($SQL);
        foreach ($fair_title as $result) {

            if ($_POST['title'] != $result['fair_title']) {
                $resultTitle = $_POST['title'];
            } else {
                echo "Имя занято!";
                exit;
            }
        }
      //  print_r($resultTitle) ;

        if (isset($resultTitle)) {
            if(empty($img1['name'])) $img1['name'] = '';
            if(empty($img2['name'])) $img2['name'] = '';
            if(empty($img3['name'])) $img3['name'] = '';
            if(empty($img4['name'])) $img4['name'] = '';
            if(empty($img5['name'])) $img5['name'] = '';
            if(empty($img6['name'])) $img6['name'] = '';


                $this->db->insert('fair', array(
                    'fair_desc' => $_POST['description'],
                    'catf_name' => $_POST['categories'],
                    'fair_img'  => $img['name'],
                    'fair_img1' => $img1['name'],
                    'fair_img2' => $img2['name'],
                    'fair_img3' => $img3['name'],
                    'fair_img4' => $img4['name'],
                    'fair_img5' => $img5['name'],
                    'fair_img6' => $img6['name'],
                    'fair_title' => $resultTitle,
                    'fair_author' => $_SESSION['name'],
                    'fair_date' => date('Y-m-d'),
                    'current' => $_POST['current'] ,
                    'price' => $_POST['price']
                ));

               //  echo 'Добавлено';
                $img_root = 'public/images/users/'.$_SESSION['name'].'/fair/';
                //проверка на наличие директории
                if(!is_dir($img_root)){mkdir("public/images/users/".$_SESSION['name'], 0700);}
                if(!is_dir($img_root)){mkdir("public/images/users/".$_SESSION['name']."/fair/", 0700);}
                    move_uploaded_file($img['tmp_name'], $img_root.$img['name']);
                    move_uploaded_file($img1['tmp_name'], $img_root.$img1['name']);
                    move_uploaded_file($img2['tmp_name'], $img_root.$img2['name']);
                    move_uploaded_file($img3['tmp_name'], $img_root.$img3['name']);
                    move_uploaded_file($img4['tmp_name'], $img_root.$img4['name']);
                    move_uploaded_file($img5['tmp_name'], $img_root.$img5['name']);
                    move_uploaded_file($img6['tmp_name'], $img_root.$img6['name']);
            }
        }

    }
    /*Вывод материалла для редактирования*/
    public function editItem($id){
        $SQL = 'SELECT work_id,work_desc,cat_name,work_img,work_img1,work_img2,work_img3,work_img4,work_img5,work_img6,
                       work_mat,work_short,work_title,work_author
                    FROM works WHERE work_id = :work_id';
        return $this->db->select($SQL, array(':work_id' => $id));
    }
    /*Вывод материалла - Ярморка для редактирования*/
    public function editFairItem($id){
        $SQL = 'SELECT fair_id,fair_desc,catf_name,fair_img,fair_title,fair_author,price,current,fair_mat,
                        fair_short,fair_img,fair_img1,fair_img2,fair_img3,fair_img4,fair_img5,fair_img6
                FROM fair WHERE fair_id = :fair_id';
        return $this->db->select($SQL, array(':fair_id' => $id));
    }

    /*Обновление материалла*/
    public function updateItem($id){
        $SQL = 'SELECT work_img,work_img1,work_img2,work_img3,work_img4,work_img5,work_img6
                    FROM works WHERE work_id = :work_id';
        $result_img = $this->db->select($SQL, array(':work_id' => $id));

        $data = array();
        $data['work_id'] = $id;
        $data['work_title'] = $_POST['title'];
        $data['work_desc'] = $_POST['description'];
        $data['work_author'] = $_SESSION['name'];
        $data['cat_name'] = $_POST['categories'];
        if(!empty($_FILES['picture']['name']))
        {$data['work_img'] = $_FILES['picture']['name'];}else{$data['work_img'] = $result_img[0]['work_img']; }
        if(!empty($_FILES['picture1']['name']))
        {$data['work_img1'] = $_FILES['picture1']['name'];}else{$data['work_img1'] = $result_img[0]['work_img1']; }
        if(!empty($_FILES['picture2']['name']))
        {$data['work_img2'] = $_FILES['picture2']['name'];}else{$data['work_img2'] = $result_img[0]['work_img2']; }
        if(!empty($_FILES['picture3']['name']))
        {$data['work_img3'] = $_FILES['picture3']['name'];}else{$data['work_img3'] = $result_img[0]['work_img3']; }
        if(!empty($_FILES['picture4']['name']))
        {$data['work_img4'] = $_FILES['picture4']['name'];}else{$data['work_img4'] = $result_img[0]['work_img4']; }
        if(!empty($_FILES['picture5']['name']))
        {$data['work_img5'] = $_FILES['picture5']['name'];}else{$data['work_img5'] = $result_img[0]['work_img5']; }
        if(!empty($_FILES['picture6']['name']))
        {$data['work_img6'] = $_FILES['picture6']['name'];}else{$data['work_img6'] = $result_img[0]['work_img6']; }
        $data['mat'] = $_POST['mat'];
        $data['desc'] = $_POST['desc'];


        $dataInfo = array(
                'work_title' => $data['work_title'],
                'work_desc' => $data['work_desc'],
                'work_author' => $data['work_author'],
                'cat_name' => $data['cat_name'],
                'work_img' => $data['work_img'],
                'work_img1' => $data['work_img1'],
                'work_img2' => $data['work_img2'],
                'work_img3' => $data['work_img3'],
                'work_img4' => $data['work_img4'],
                'work_img5' => $data['work_img5'],
                'work_img6' => $data['work_img6'],
                'work_mat' => $data['mat'],
                'work_short' => $data['desc']
            );

        $this->db->update('works',$dataInfo,"`work_id` = {$data['work_id']}");

        $img = $this->check_photo($_FILES["picture"]);
        $img1 = $this->check_photo($_FILES["picture1"]);
        $img2 = $this->check_photo($_FILES["picture2"]);
        $img3 = $this->check_photo($_FILES["picture3"]);
        $img4 = $this->check_photo($_FILES["picture4"]);
        $img5 = $this->check_photo($_FILES["picture5"]);
        $img6 = $this->check_photo($_FILES["picture6"]);

        $img_root = 'public/images/users/'.$_SESSION['name'].'/works/';
        if(!is_dir($img_root)){mkdir("public/images/users/".$_SESSION['name'], 0700);}
        if(!is_dir($img_root)){mkdir("public/images/users/".$_SESSION['name']."/works/", 0700);}
        move_uploaded_file($img['tmp_name'], $img_root.$img['name']);
        move_uploaded_file($img1['tmp_name'], $img_root.$img1['name']);
        move_uploaded_file($img2['tmp_name'], $img_root.$img2['name']);
        move_uploaded_file($img3['tmp_name'], $img_root.$img3['name']);
        move_uploaded_file($img4['tmp_name'], $img_root.$img4['name']);
        move_uploaded_file($img5['tmp_name'], $img_root.$img5['name']);
        move_uploaded_file($img6['tmp_name'], $img_root.$img6['name']);
    }
    /*Удаление материалла*/
    public function deleteItem($id){
        $this->db->delete('`user_watch_work`', "work_id = '$id'");
        $this->db->delete('`note_comments`', "work_id = '$id'");
        $this->db->delete('works', "work_id = '$id'");
    }
    /*Обновление материалла Ярмарка*/
    public function updateFairItem($id){
        $SQL = 'SELECT fair_img,fair_img1,fair_img2,fair_img3,fair_img4,fair_img5,fair_img6
                FROM fair WHERE fair_id = :fair_id';
        $result_img = $this->db->select($SQL, array(':fair_id' => $id));

        $data = array();
        $data['fair_id'] = $id;
        $data['fair_title'] = $_POST['title'];
        $data['fair_desc'] = $_POST['description'];
        $data['fair_author'] = $_SESSION['name'];
        $data['catf_name'] = $_POST['categories'];
        if(!empty($_FILES['picture']['name']))
            {$data['fair_img'] = $_FILES['picture']['name'];}else{$data['fair_img'] = $result_img[0]['fair_img']; }
        if(!empty($_FILES['picture1']['name']))
            {$data['fair_img1'] = $_FILES['picture1']['name'];}else{$data['fair_img1'] = $result_img[0]['fair_img1']; }
        if(!empty($_FILES['picture2']['name']))
            {$data['fair_img2'] = $_FILES['picture2']['name'];}else{$data['fair_img2'] = $result_img[0]['fair_img2']; }
        if(!empty($_FILES['picture3']['name']))
            {$data['fair_img3'] = $_FILES['picture3']['name'];}else{$data['fair_img3'] = $result_img[0]['fair_img3']; }
        if(!empty($_FILES['picture4']['name']))
            {$data['fair_img4'] = $_FILES['picture4']['name'];}else{$data['fair_img4'] = $result_img[0]['fair_img4']; }
        if(!empty($_FILES['picture5']['name']))
            {$data['fair_img5'] = $_FILES['picture5']['name'];}else{$data['fair_img5'] = $result_img[0]['fair_img5']; }
        if(!empty($_FILES['picture6']['name']))
            {$data['fair_img6'] = $_FILES['picture6']['name'];}else{$data['fair_img6'] = $result_img[0]['fair_img6']; }
        $data['mat'] = $_POST['mat'];
        $data['desc'] = $_POST['desc'];
        $data['current'] = $_POST['current'];
        $data['price'] = $_POST['price'];

        $dataInfo = array(
            'fair_title' => $data['fair_title'],
           'fair_desc' => $data['fair_desc'],
            'fair_author' => $data['fair_author'],
            'fair_img' => $data['fair_img'],
            'fair_img1' => $data['fair_img1'],
            'fair_img2' => $data['fair_img2'],
            'fair_img3' => $data['fair_img3'],
            'fair_img4' => $data['fair_img4'],
            'fair_img5' => $data['fair_img5'],
            'fair_img6' => $data['fair_img6'],
            'fair_mat' => $data['mat'],
            'fair_short' => $data['desc'],
            'current' => $data['current'],
            'price' => $data['price'],
        );
        $this->db->update('fair',$dataInfo, "fair_id = {$data['fair_id']}");

        $img = $this->check_photo($_FILES["picture"]);
        $img1 = $this->check_photo($_FILES["picture1"]);
        $img2 = $this->check_photo($_FILES["picture2"]);
        $img3 = $this->check_photo($_FILES["picture3"]);
        $img4 = $this->check_photo($_FILES["picture4"]);
        $img5 = $this->check_photo($_FILES["picture5"]);
        $img6 = $this->check_photo($_FILES["picture6"]);

        $img_root = 'public/images/users/'.$_SESSION['name'].'/fair/';
        if(!is_dir($img_root)){mkdir("public/images/users/".$_SESSION['name'], 0700);}
        if(!is_dir($img_root)){mkdir("public/images/users/".$_SESSION['name']."/fair/", 0700);}
        move_uploaded_file($img['tmp_name'], $img_root.$img['name']);
        move_uploaded_file($img1['tmp_name'], $img_root.$img1['name']);
        move_uploaded_file($img2['tmp_name'], $img_root.$img2['name']);
        move_uploaded_file($img3['tmp_name'], $img_root.$img3['name']);
        move_uploaded_file($img4['tmp_name'], $img_root.$img4['name']);
        move_uploaded_file($img5['tmp_name'], $img_root.$img5['name']);
        move_uploaded_file($img6['tmp_name'], $img_root.$img6['name']);
    }
    /*Удаление материалла Ярмарка*/
    public function deleteFairItem($id){
        $this->db->delete('`item_comments`', "fair_id = '$id'");
        $this->db->delete('`fair`', "`fair_id` = '$id'");
    }
    /*Вывод пользователей за которыми следят*/
    public function addUserLook($id){
        $SQL = 'SELECT watch_user FROM user_watch WHERE watch_name = "'.$_SESSION['name'].'"';
        $result = $this->db->select($SQL);
        for($i=0;$i<4;$i++){
            if($result[$i]['watch_user'] == $id OR  $id == $_SESSION['name']){
                header ('Location:'.URL.'index');
                exit;
            }
        }
                $this->db->insert('user_watch', array(
                    'watch_name' => $_SESSION['name'],
                    'watch_user' => $id
                ));
    }
    public function check_photo($pic){
        if($pic["error"] == 0){

            /*проверка на размер файла*/
            if($pic["size"] > 500000 && $pic["size"] < 20000)
            {
                echo ("Размер файла должен быть не меньше 50кб и не больше 500кб");
                exit;
            }

            $tmp_name = $pic["tmp_name"];
            $name_result = $pic["name"];
            /*проверка на фото jpg,png,jpeg,gif*/
            if(preg_match("/^([A-Za-z0-9-_]+)[.](jpg)|(png)|(jpeg)|(gif)$/i", $name_result)){
                  return  array('name' => $name_result,'tmp_name' => $tmp_name);
            }
        }
    }

}


