<div id = 'work_page'>
    <div id = 'work_cat'>
        <div id = 'work_cat_over'>
<?php
        echo "<table id = 'work_table'>";
            $all_count = count($this->worksMainList);
            $column_count = 5;

            if($all_count%$column_count)
            $all_count = $all_count-(count($this->worksMainList)%$column_count)+$column_count;

            for($i=0; $i<$all_count; $i++)
            {
            if($i%$column_count == 0)
            echo "<tr id = 'table_tr'>";

                if($i<count($this->worksMainList))
                echo '<td><a href="'.URL.'categories/'.$this->worksMainList[$i]['cat_name'].'">'.$this->worksMainList[$i]['cat_desc'].'</a></td>';
                else
                echo '<td></td>';

                if(($i+1)%$column_count == 0)
                echo '</tr>';
            }

            echo '</table>';
?>
            </div>

    </div>
    <div id = 'works_main_item'>
<?php
//print_r($this->worksList);
if(isset($this->AllGetList)){
        /*Вывод послених работ*/
        foreach($this->AllGetList as $item){
echo  "<div class='work_item'>
           <div class = 'work_item_content'>
                <p><a href='/note/view?id={$item['work_id']}'>{$item['work_title']}</a></p>
                <div><a href='/note/view?id={$item['work_id']}'>
                    <img class='work_img' src='".URL."public/images/users/{$item['work_author']}/works/{$item['work_img']}'>
                </a></div>
                <p class='work_author'>Автор: <a href='".URL."master/info/{$item['work_author']}'>{$item['work_author']}</a></p>
                </div>
           <div class='work_view'><img src = '".URL."public/images/view.fw.png'/> {$item['work_view']}  <img src = '".URL."public/images/like.fw.png'/> {$item['work_rating']}</div>
           <div class = 'work_b'><a href='/note/view?id={$item['work_id']}'>Подробнее</a></div>
       </div>";
        } //Категория:{$item['cat_name']}                <div class='work_date'> Дата: {$item['work_date']}</div>
    echo "<div id = 'pagination'>$this->paginatorList</div>";
}elseif (isset($this->worksList)){
    foreach($this->worksList as $item){
        echo  "<div class='work_item'>
           <div class = 'work_item_content'>
                <p><a href='/note/view?id={$item['work_id']}'>{$item['work_title']}</a></p>
                <div><img src='".URL."public/images/users/{$item['work_author']}/works/{$item['work_img']}'  class='work_img'></div>
                <p class='work_author'>Автор: <a href='".URL."master/info/{$item['work_author']}'>{$item['work_author']}</a></p>
           </div>
           <div class='work_view'><img src = '".URL."public/images/view.fw.png'/> {$item['work_view']}  <img src = '".URL."public/images/like.fw.png'/> {$item['work_rating']}</div>
           <div class = 'work_b'> <a href='/note/view?id={$item['work_id']}'>Подробнее</a></div>
       </div>";
    }
    echo "<div id = 'pagination'>$this->paginatorList</div>";
}else{
    echo 'Произошла ошибка';
}

?>
    </div>
</div>