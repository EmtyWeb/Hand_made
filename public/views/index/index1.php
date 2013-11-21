<div id = 'slides'>
    <div class="slides_container">
        <div class="slide">
            <h1>Мы открылись</h1>
            <p id="picture">Добро пожаловать к нам на сайт!
                Клуб для мастеров и мастериц!
                Добавляйте работы, обменивайтесь опытом,
                выставляйте на ярморку свои работы

            <p><a href="#" class="link"></a></p>
        </div>
        <div class="slide">
            <h1>Ярмарка</h1>
            <p>Регестрируйтесь, добавляйте свои работы,
                продавайте и наслаждайтесь</p>>
            <p><a href="#" class="link"></a></p>
        </div>
        <div class="slide">
            <h1>Лучшая работа недели</h1>
            <p>Фортуна<br/>
        </div>
        <div class="slide">
            <h1>Вскоре</h1>
            <p>Скоро откроется форум где вы сможете обсудить работы<br/>
        </div>
        <div class="slide">
            <h1>Статьи</h1>
            <p>Найдите материал который вам нужен</p>
        </div>
    </div>
    <a href="#" class="prev"></a>
    <a href="#" class="next"></a>
</div>
<div id = 'banner1'></div>
<div id = 'line'>
    <?php
    //print_r($this->AllGetList);
    $i = 0;
    foreach($this->AllGetList as $item){
        $i++;
        echo  "<div class = 'ind_item ind_{$i}'>
                    <p class = 'ind_title'><a href='/note/view?id={$item['work_id']}' class='novost_title'>{$item['work_title']}</a></p>
                    <div ><img class = 'ind_img' src='".URL."public/images/elena/{$item['work_img']}.jpg'/></div>
                    <p class = 'ind_author'>Автор: <a href='".URL."master/info/{$item['work_author']}'>{$item['work_author']}</a> | Просмотров: {$item['work_view']}</p>";
        if(isset($_SESSION['name'])){
            echo "<a href='".URL."account/addUser/{$item['work_author']}'>Следить за мастером</a>";
        }
        echo "<div class = 'ind_read'>
                <a class = 'ind_read_a' href='/note/view?id={$item['work_id']}'>1</a>
            </div>";
        echo "</div>";
    }
    //echo "<div id = 'ind_paginator'>{$this->paginatorList}</div>";
    ?>
</div>

