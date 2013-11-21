<div id = 'edit_page'>
    <div id = 'edit_content'>
        <div id = 'black_line'></div>
    <p>Все мои работы</p>
    <?php
    echo "<div class= 'account_watch_work'>";
    foreach($this->myListItem as $listItem){
        echo   "<div class='view_item'>";
        echo "<div><a href = '/note/view?id={$listItem['work_id']}'>
                <img src='".URL."public/images/users/{$listItem['work_author']}/works/{$listItem['work_img']}' class='mini_view_img'>
            </a></div>";
        echo "<p><a href='/note/view?id={$listItem['work_id']}'>{$listItem['work_title']}</a></p>";
        echo "<div class='edit_consol'><img src = '".URL."public/images/edit_view.fw.png'/> {$listItem['work_view']}  <img src = '".URL."public/images/edit_like.fw.png'/> {$listItem['work_view']}";
        echo "<a href = '".URL."account/edit/".$listItem['work_id']."'><img src = '".URL."public/images/edit_edit.png'/></a>";
        echo "<a href = '".URL."account/delete/".$listItem['work_id']."'><img src = '".URL."public/images/edit_close.fw.png'/></a></div>";
        echo "</div>";
    }
    echo "</div>"
    ?><div id = 'black_line'></div>
        <div id = 'banner4'></div>
    </div>

</div>