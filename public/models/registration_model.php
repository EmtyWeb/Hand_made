<?php

class Registration_Model extends Model{

    public function __construct(){
        parent:: __construct();
    }
    public function registrationRun(){
        //print_r($data);
      //  if(isset($_REQUEST['post'])){
        //    try{     echo 1;

               /* $form = new Form();
                $form   ->post('login')
                       // ->val('minlength',4)
                        //->val('maxlength',12)
                        ->post('password')
                       // ->val('minlength',6)

                    ->post('first_name')
                   // ->val('minlength',2)
                    ->post('last_name')
                   // ->val('minlength',2)
                    ->post('email')
                    //->val('minlength',6)
                    ->post('phone')
                   // ->val('minlength',6)
                    ->post('age')
                   // ->val('minlength',6)
                    ->post('general')
                   // ->val('minlength',6)
if    (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email)) //проверка    е-mail адреса регулярными выражениями на корректность
            {exit    ("Неверно введен е-mail!");}


                ;
                $form  ->submit();
                echo 'The form passed!';
               // $data = $form->fetch();

               // echo '<pre>';
               // print_r($data);
               // echo '</pre>';



           // }catch (Exception $e){
              //  echo $e->getMessage();
           // }
*/

        $data = array();
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];
        $data['email'] = $_POST['email'];
        $data['phone'] = $_POST['phone'];
        $data['gender'] = $_POST['gender'];
        $data['reg_date'] = date("Y-m-d H:i:s");

            $this->db->insert('users',array(
                'user_login' => $data['login'],
                'user_password' => trim(stripslashes(htmlspecialchars(Hash::create('md5',$data['password'],HASH_KEY)))),
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'gender' => $data['gender'],
                'reg_date' => $data['reg_date'],
            ));


        $SQL = 'SELECT user_id
                    FROM users  WHERE user_login="'.$data['login'].'"';
        $our_id = $this->db->select($SQL);
        //@TODO change this
        $activation    = md5($our_id['user_id']).(Hash::create('md5',$data['login'],HASH_KEY));//код активации аккаунта.
        $subject    = "Подтверждение регистрации";//тема сообщения
        $message    = "Здравствуйте! Спасибо за регистрацию на citename.ru\nВаш логин:    ".$data['login']."\n
            Перейдите    по ссылке, чтобы активировать ваш    аккаунт:\nhttp://innamarya/registration/activation?login=".$data['login']."&code=".$activation."\nС    уважением,\n
            Администрация    citename.ru";//содержание сообщение
        mail($data['email'],    $subject, $message, "Content-type:text/plane;    Charset=windows-1251\r\n");//отправляем сообщение

        echo    "Вам на E-mail выслано письмо с cсылкой, для подтверждения регистрации.    Внимание! Ссылка действительна 1 час. <a href='".URL."'>Главная    страница</a>"; //говорим о    отправленном письме пользователю
    }
    public function activation(){
        $SQL = 'SELECT user_id
                    FROM users  WHERE activation="0" AND    UNIX_TIMESTAMP()    - UNIX_TIMESTAMP(reg_date)    > 3600';
        $active = $this->db->select($SQL);
       // print_r($active);
        //echo count($active);
        if    (count($active)> 0) {
            $this->db->delete('users', "activation = '0' AND UNIX_TIMESTAMP() -    UNIX_TIMESTAMP(reg_date) > 3600");//удаляем пользователей из базы
        }
        if    (isset($_GET['code'])) {$code =$_GET['code']; } //код подтверждения
        else
        {    exit("Вы    зашли на страницу без кода подтверждения!");} //если не указали code,    то выдаем ошибку
        if (isset($_GET['login'])) {$login=$_GET['login'];    } //логин,который    нужно активировать

        else
        {    exit("Вы    зашли на страницу без логина!");} //если не указали логин, то выдаем ошибку
        $usrSQL = 'SELECT user_id
                    FROM users  WHERE user_login = "'.$login.'"';  //извлекаем    идентификатор пользователя с данным логином
        $usr = $this->db->select($usrSQL);
        $activation    = md5($usr['user_id']).(Hash::create('md5',$login,HASH_KEY));//создаем такой же код подтверждения
        if ($activation == $code) {//сравниваем полученный из url и сгенерированный код
        $dataInfo = array('activation'=>'1');
        //echo "`user_login` = '$login'";
            $this->db->update('users',$dataInfo,"`user_login` = '$login'");//если равны, то активируем пользователя
        echo "Ваш Е-мейл подтвержден! Теперь вы можете    зайти на сайт под своим логином! <a href='index.php'>Главная    страница</a>";
    }else {echo "Ошибка! Ваш Е-мейл не    подтвержден! <a    href='index.php'>Главная    страница</a>";
            //если    же полученный из url и    сгенерированный код не равны, то выдаем ошибку
        }
    }
}


