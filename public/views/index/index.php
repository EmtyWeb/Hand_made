<div id = 'slides'>
    <div class="slides_container">
        <div class="slide">
            <div id = 'slider_picture'><img src = '<?php echo URL?>public/images/open.jpg'/></div>
            <div id = 'slider_content'>
                <p>Мы открылись</p>
                <p>Добро пожаловать к нам на сайт!
                    Клуб для мастеров и мастериц!
                    Добавляйте работы, обменивайтесь опытом,
                    выставляйте на ярмарку свои работы</p>
            </div>
        </div>
        <div class="slide">
            <div id = 'slider_picture'><img src = '<?php echo URL?>public/images/open.jpg'/></div>
            <div id = 'slider_content'>
                <p>Мы открылись</p>
                <p>Добро пожаловать к нам на сайт!
                    Клуб для мастеров и мастериц!
                    Добавляйте работы, обменивайтесь опытом,
                    выставляйте на ярмарку свои работы</p>
            </div>
        </div>
        <div class="slide">
            <div id = 'slider_picture'><img src = '<?php echo URL?>public/images/open.jpg'/></div>
            <div id = 'slider_content'>
                <p>Мы открылись</p>
                <p>Добро пожаловать к нам на сайт!
                    Клуб для мастеров и мастериц!
                    Добавляйте работы, обменивайтесь опытом,
                    выставляйте на ярмарку свои работы</p>
            </div>
        </div>
        <div class="slide">
            <div id = 'slider_picture'><img src = '<?php echo URL?>public/images/open.jpg'/></div>
            <div id = 'slider_content'>
                <p>Мы открылись</p>
                <p>Добро пожаловать к нам на сайт!
                    Клуб для мастеров и мастериц!
                    Добавляйте работы, обменивайтесь опытом,
                    выставляйте на ярмарку свои работы</p>
            </div>
        </div>
        <div class="slide">
            <div id = 'slider_picture'><img src = '<?php echo URL?>public/images/open.jpg'/></div>
            <div id = 'slider_content'>
                <p>Мы открылись</p>
                <p>Добро пожаловать к нам на сайт!
                    Клуб для мастеров и мастериц!
                    Добавляйте работы, обменивайтесь опытом,
                    выставляйте на ярмарку свои работы</p>
            </div>
        </div>
    </div>
    <a href="#" class="prev"></a>
    <a href="#" class="next"></a>
</div>
<div id = 'banner1'>
    <div><img src = '<?php echo URL?>public/images/banner1.fw.png'/> </div>
</div>
<div id = 'pop_item'>Популярные работы
<div id = 'line'>
    <?php
    //print_r($this->AllGetList);
    $i = 0;
    foreach($this->AllGetList as $item){
        $i++;
        echo  "<div class = 'ind_item ind_{$i}'>
            <div>
                    <p class = 'ind_title'><a href='/note/view?id={$item['fair_id']}' class='novost_title'>{$item['fair_title']}</a></p>
                    <div><img class = 'ind_img' src='".URL."public/images/users/{$item['fair_author']}/fair/{$item['fair_img']}' /></div>
                    <p class = 'ind_author'>Автор: <a href='".URL."master/info/{$item['fair_author']}'>{$item['fair_author']}</a></p>

            </div><div img class = 'ind_price'><span>{$item['price']}</span></div>
            <div class='index_view'><img src = '".URL."public/images/view.fw.png'/> {$item['fair_view']}  <img src = '".URL."public/images/like.fw.png'/> {$item['fair_rating']}</div>";
        if(isset($_SESSION['name'])){
         //   echo "<a href='".URL."account/addUser/{$item['fair_author']}'>Следить за мастером</a>";
        }
        echo "<div class = 'ind_read'>
                <a href='/item/view?id={$item['fair_id']}'>Подробнее</a>
              </div>";
        echo "</div>";
    }

    ?>
    </div>
   <div id = 'ind_paginator'> <?php echo $this->paginatorList?></div>
</div>

