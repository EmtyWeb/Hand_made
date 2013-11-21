<div id = "account_page">
    <div id = "account_main" >
        <hr>
        <?php
        foreach($this->info as $info){

            echo "<div id = 'account_img'>
                <div id = 'account_img_center'>
                    <div>
                        <img  src='".URL."public/images/users/{$info['user_login']}/{$info['user_img']}'>
                    </div>
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
            <p>Работы мастера</p>
            <?php
            if(isset($this->work)){
                $watch = $this->work;
                echo "<div class= 'account_watch_work'>";
                for($i=0; $i<count($watch); $i++){
                 echo "<div class='watch_pic'>
                 <div><a href = '".URL."note/view?id={$watch[$i]['work_id']}'>
                 <img src='".URL."public/images/users/{$watch[$i]['work_author']}/works/{$watch[$i]['work_img']}' class='mini_watch_img'></a></div>
                 <p class='pic_title'><a href='".URL."note/view?id={$watch[$i]['work_id']}'>{$watch[$i]['work_title']}</a></p>
                 <div class='watch_author'>
                 <p>Дата:{$watch[$i]['work_date']}</p>
                 <p>Категория: {$watch[$i]['cat_name']}</p>
                 </div>
             </div> ";
                }
                echo "</div>";
                echo "<div id = 'pagination'>$this->paginatorList</div>";
            }else{
                echo "<div id = 'account_dont'><p>Вам пока не чего не нравиться<p></div>";
            }
            ?>
            <div id = 'banner10'></div>
        </div>
    </div>
</div>





