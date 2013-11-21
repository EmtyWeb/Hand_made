<?php
class Login_Model extends Model{
    function __construct(){
        parent:: __construct();
    }
    public function Run(){
        //проверка данных которые пришли
        $login = trim(stripslashes(htmlspecialchars($_POST['login'])));
        $password = trim(stripslashes(htmlspecialchars(Hash::create('md5',$_POST['password'],HASH_KEY))));
        $STH=$this->db->prepare("SELECT user_id,user_role,activation FROM users WHERE
                           user_login = :login AND user_password = :password AND activation = '1'");//MD5('$password')");
        $STH->execute(array(
            ':login'=> $login,
            ':password'=> $password,
        ));
        $data = $STH->fetch();
        //print_r($data);
        $count = $STH->rowCount();
        if($count > 0){
            //login
            Session::initiation();
            Session::set('role',$data['user_role']);
            Session::set('user_id',$data['user_id']);
            Session::set('loggedIn',true);
            $_SESSION['name'] = $login;
            //@TODO change
            header('Location: ../account/index');
        }else{
            header('Location: ../login');
        }
    }
    public function forgotRuning(){
        if    (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);}    } //заносим введенный пользователем логин в переменную $login, если он пустой,    то уничтожаем переменную
        if    (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') {    unset($email);} } //заносим введенный пользователем e-mail, если он    пустой, то уничтожаем переменную
        if    (isset($login) or isset($email)) {//если существуют необходимые переменные
            echo $SQL = "SELECT user_id FROM users WHERE user_login='$login' OR    email='$email' AND activation='1'";
            $usrId = $this->db->select($SQL);
        }
        if    (empty($usrId) or $usrId=='') {
            exit ("Пользователя с    таким e-mail адресом не обнаружено ни в одной базе ЦРУ :) <a    href='".URL."'>Главная страница</a>");
        }  //если активированного пользователя с таким логином и е-mail    адресом нет
        //если пользователь с таким логином и е-мейлом найден,    то необходимо сгенерировать для него случайный пароль, обновить его в базе и    отправить на е-мейл


     $data = date('ymdhis');
     $now_pass = (Hash::create('md5',$data,HASH_KEY));
     $new_password =    strrev(md5($now_pass));//зашифровали
     $new_pass = substr($new_password,    5, 10);   //извлекаем из шифра 10 символов начиная со второй
     $my_pass =  (Hash::create('md5',$new_pass,HASH_KEY));
     $passInfo = array('user_password'=>$my_pass);
       echo "`user_login` = '$login'";
     $this->db->update('users',$passInfo,"`user_login` = '$login'");// обновили в базе
     //формируем сообщение
        $message = "Здравствуйте,    ".$login."! Мы сгененриоровали для Вас пароль, теперь Вы сможете    войти на сайт citename.ru, используя его. После входа желательно его сменить.    Пароль:\n".$new_pass;//текст сообщения
        mail($email,    "Восстановление пароля", $message, "Content-type:text/plane;    Charset=windows-1251\r\n");//отправляем сообщение

        echo    "<html><head><meta http-equiv='Refresh' content='5;    URL=index.php'></head><body>На Ваш e-mail отправлено письмо с паролем. Вы    будете перемещены через 5 сек. Если не хотите ждать, то <a    href='index.php'>нажмите сюда.</a></body></html>";//перенаправляем    пользователя

    }
}
