<div id = 'master_page'>
    <div id = 'black_line'></div>
    <p>Популярные пользователи</p>

    <div id = 'old_user'>
        <?php
        /*популярные пользователи*/
            foreach($this->goodMaster as $g_master){

                echo "<div class = 'masters'>
                        <div class = 'master_img'>
                            <div>
                                <a href = '".URL."master/info/{$g_master['user_login']}'><img src='".URL."public/images/users/{$g_master['user_login']}/{$g_master['user_img']}' /></a>
                            </div>
                        </div>
                        <div class = 'master_log'><a class = 'center_img' href = '".URL."master/info/{$g_master['user_login']}'>{$g_master['user_login']}</a></div>
                     </div>";
            }
        echo "<div id = 'pagination'>$this->paginatorList</div>";
        ?>
        <div id = 'black_line'></div>
    </div>

    <div id = 'new_user'><p>Новые пользователи</p>
        <?php
            /*новые пользователи*/
            foreach($this->newMaster as $n_master){
                echo "<div class = 'masters'>
                        <div class = 'master_img'>
                            <div>
                                <img src='".URL."public/images/users/{$n_master['user_login']}/{$n_master['user_img']}' />
                            </div>
                        </div>
                        <div class = 'master_log'><a class = 'center_img' href = '".URL."master/info/{$n_master['user_login']}'>{$n_master['user_login']}</a></div>
                     </div>";
            }
        ?>
    </div>
    <div id = 'black_line'></div>
</div>
