<?php
class Auth
{
    
    public static function check_login()
    {
        @session_start();
        $logged = $_SESSION['loggedIn'];
        if ($logged == false) {
            session_destroy();
            header('location: ../login');
            exit;
        }
    }
    
}


/*$logged = Session::get('loggedIn');
$role = Session::get('role');
//если не вошли то
if($logged == false || $role != 'owner'){
    Session::destroy();
    header ('Location: ../login');
    exit;
}*/