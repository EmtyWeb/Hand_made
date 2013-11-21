<div id = 'blog_page'>
<p id = 'last_news'>Последние новости</p>

<?php //print_r($this->newsList)?>
 <?php
 //var_dump($result);
 foreach($this->newsList as $value){
    echo <<<LABEL
                <div class ='blog_item'>
                <div class ='blog_view'><p>{$value['news_view']}</p></div>
                <div class = 'blog_content'>
                    <p><a href='../blog/text/{$value['news_id']}' class='novost_title'>{$value['news_title']}</a></p>
                    <p>{$value['news_desc']}</p>
                </div>

                <div class='blog_img'>
                     <div>
                        <img class = 'blog_pic' src='../../public/images/news/{$value['news_img']}.jpg'>
                     </div>
                </div>

                <div class = 'blog_author'>
                    <p>Автор: {$value['news_author']}</p>
                    <p>Дата: {$value['news_date']}</p>
                </div>
                <div class='blog_button'><a href='../blog/text/{$value['news_id']}'>Подробнее</a></div>
                </div>
LABEL;
 }
 echo "<div id = 'pagination'>$this->paginatorList</div>";
 ?>

</div>