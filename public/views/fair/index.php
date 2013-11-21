<div id = 'fair_page'>
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
                    echo '<td><a href="'.URL.'categories/'.$this->worksMainList[$i]['catf_name'].'">'.$this->worksMainList[$i]['catf_desc'].'</a></td>';
                else
                    echo '<td></td>';

                if(($i+1)%$column_count == 0)
                    echo '</tr>';
            }

            echo '</table>';
            ?>
        </div>

    </div>
<?php

    echo "<div id = 'fair_main_item'>";
if(isset($this->fairList)){
        /*Вывод послених работ*/
        foreach($this->fairList as $item){
            echo  "<div class='work_item'>
           <div class = 'work_item_content'>
                <p><a href='/item/view?id={$item['fair_id']}'>{$item['fair_title']}</a></p>
                <div><a href='/item/view?id={$item['fair_id']}'>
                <img class='work_img' src='".URL."public/images/users/{$item['fair_author']}/fair/{$item['fair_img']}'></a></div>
               <p class='work_price'>Цена: <span>{$item['price']} {$item['current']}</span></p>
               <p class='work_author'>
                Автор: <a href='".URL."master/info/{$item['fair_author']}'>{$item['fair_author']}</a></p>

           </div>
           <div class='work_view'><img src = '".URL."public/images/view.fw.png' alt = 'Просмотров'/> {$item['fair_view']}  <img src = '".URL."public/images/like.fw.png'  alt = 'Понравилось'/> {$item['fair_rating']}</div>
           <div class = 'work_b'>
                <a href='/item/view?id={$item['fair_id']}'>Подробнее</a>
           </div>
       </div>";



        }
}elseif(isset($this->fCatList)){
    /*Вывод послених работ*/
    foreach($this->fCatList as $item){
        echo  "<div class='work_item'>
           <div class = 'work_item_content'>
                <p><a href='/item/view?id={$item['fair_id']}'>{$item['fair_title']}</a></p>
                <div><a href='/item/view?id={$item['fair_id']}'>
                    <img class='work_img' src='".URL."public/images/users/{$item['fair_author']}/fair/{$item['fair_img']}'></a></div>

                <p class='work_author'>Автор: <a href='".URL."master/info/{$item['fair_author']}'>{$item['fair_author']}</a></p>

           </div>
           <p class='work_view'><img src = '".URL."public/images/view.fw.png'/> {$item['fair_view']}  <img src = '".URL."public/images/like.fw.png'/> {$item['fair_rating']}</p>
           <div class = 'work_b'>
                <a href='/item/view?id={$item['fair_id']}'>Подробнее</a>
           </div>
       </div>";

    }

}
    echo "<div id = 'pagination'>$this->paginatorList</div>";
echo "</div>";
?>
</div>