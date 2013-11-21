<div id = "account_page">

    <div id = "account_main" >
        <div id = 'black_line'></div>
        <?php
        print_r($this->infoProfileList);
        foreach($this->infoUser as $info){

            echo "<div id = 'account_img'>
                <div id ='account_img_center'>
                    <div><img  src='".URL."public/images/users/{$info['user_login']}/{$info['user_img']}'></div>
                </div>
            </div>";
            echo "<div id = 'account_info'>";
                echo "<div> Логин: {$info['user_login']}</div>";
                echo "<div>E-mail: {$info['email']} </div>";
                if(!empty($info['phone'])) echo  "<div>Мой телефон: {$info['phone']} </div>";
                if(!empty($info['first_name'])) echo  "<div>Имя: {$info['first_name']} </div>";
                if(!empty($info['last_name'])) echo  "<div>Фамилия: {$info['last_name']} </div>";
                if(!empty($info['birthday'])) echo  "<div>День рождения: {$info['birthday']} </div>";
                if(!empty($info['age'])) echo  "<div>Возраст: {$info['age']} </div>";
                if(!empty($info['country'])) echo  "<div>Страна: {$info['country']} </div>";
                if(!empty($info['city'])) echo  "<div>Город: {$info['city']} </div>";
                if(!empty($info['user_desc'])) echo  "<div>Обо мне: {$info['user_desc']} </div>";
            echo "</div>";

        }
        ?>
        <div id = 'account_like'>

            <p>Работы которые мне понравились</p>
<?php
    if(isset($this->infoWorkWatch)){
        $watch = $this->infoWorkWatch;
        echo "<div class= 'account_watch_work'>";
        for($i=0; $i<count($watch); $i++){
            echo "<div class='watch_pic'>
                 <div><a href = '".URL."note/view?id={$watch[$i][0]['work_id']}'>
                 <img src='../../public/images/users/{$watch[$i][0]['work_author']}/works/{$watch[$i][0]['work_img']}' class='mini_watch_img'></a></div>
                 <p ><a class='watch_author' href='".URL."note/view?id={$watch[$i][0]['work_id']}'>{$watch[$i][0]['work_title']}</a></p>
                 <div class='watch_author'>
                 <p>Автор:<a href = '".URL."master/info/{$watch[$i][0]['work_author']}'>{$watch[$i][0]['work_author']}</a></p>
                 <p>Категория: {$watch[$i][0]['cat_name']}</p>
                 </div>
             </div> ";
        }
        echo "</div>";
    }else{
        echo "<div id = 'account_dont'><p>Вам пока не чего не нравиться<p></div>";
    }
?>
            <div id = 'black_line'></div>
            <div id = 'banner10'></div>

            <p>Мастера за которыми я слежу</p>
<?php
if(isset($this->infoWatch)){
    //print_r($this->infoWatch);
    foreach($this->infoWatch as $user){
        echo "<div class= 'account_watch'>";
        echo "<p><a href = '".URL."master/info/{$user[0]['work_author']}'>{$user[0]['work_author']}</a></p>";
        for($i=0;$i<count($user[0]); $i++){
            if(!empty($user[$i]['work_title'])){
                echo   "<div class='watch_pic'>
                            <div><a href = '".URL."note/view?id={$user[$i]['work_id']}'>
                                <img src='".URL."public/images/users/{$user[$i]['work_author']}/works/{$user[$i]['work_img']}' class='mini_watch_img'></a></div>
                            <p><a href='".URL."note/view?id={$user[$i]['work_id']}'>{$user[$i]['work_title']}</a></p>
                            <div class='watch_author'>
                            <p>Категория: {$user[$i]['cat_name']}</p>
                            <p>Дата: {$user[$i]['work_date']}</p>
                            </div>
             </div> ";
            }
        }//| Просмотров:{$user[$i]['work_view']}
        echo "</div><div id = 'black_line'></div>";
    }
}else{
   echo "<div id = 'account_dont'><p>Вы пока не за кем не следите<p></div>";
}
?>
        </div>
    </div>
</div>





