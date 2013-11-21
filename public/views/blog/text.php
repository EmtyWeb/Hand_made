<div id = 'text_page'>
    <div id = 'black_line'></div>
    <?php
    foreach($this->text as $value){
    echo <<<LABEL
    <p id = 'last_news'>{$value['news_title']}</p>
        <div id = 'text_content'>
            <div><img id = 'text_pic' src='../../public/images/news/{$value['news_img']}.jpg'></div>
            <p>{$value['news_text']}</p>
            <p>Автор: {$value['news_author']} | Просмотров: {$value['news_view']} | Дата: {$value['news_date']}</p>
        </div>

LABEL;
    }
    //<div class ='blog_view'><p>{$value['news_view']}</p></div>
?>
    <div id = 'black_line'></div>
    <div id='banner6'></div>
</div>
