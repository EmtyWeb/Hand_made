<div id = 'edit_page'>
    <div id = 'edit_content'>
        <div id = 'black_line'></div>
        <p>Моя ярмарка</p>
        <?php
        echo "<div class= 'account_watch_work'>";
        foreach($this->myListItem as $listItem){
            echo   "<div class='view_item'>";
            echo "<div><a href = '/item/view?id={$listItem['fair_id']}'>
                  <img src='../../public/images/users/{$listItem['fair_author']}/fair/{$listItem['fair_img']}' class='mini_view_img'>
            </a></div>";
            echo "<p id = 'ac_title'><a href='/item/view?id={$listItem['fair_id']}'>{$listItem['fair_title']}</a></p>";
            echo "<div id = 'ac_price'>Цена: {$listItem['price']}</div>";
            echo "<div class='edit_consol'><img src = '".URL."public/images/edit_view.fw.png'/> {$listItem['fair_view']}  <img src = '".URL."public/images/edit_like.fw.png'/> {$listItem['fair_view']}";
            echo "<a href = '".URL."account/edit_f/".$listItem['fair_id']."'><img src = '".URL."public/images/edit_edit.png'/></a>";
            echo "<a href = '".URL."account/delete_f/".$listItem['fair_id']."'><img src = '".URL."public/images/edit_close.fw.png'/></a></div>";
            echo "</div>";
        }
        echo "</div>"
        ?><div id = 'black_line'></div>
        <div id = 'banner6'></div>
    </div>
</div>