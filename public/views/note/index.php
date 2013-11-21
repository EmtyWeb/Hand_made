<div id = 'note_page'>
    <div id = 'black_line'></div>
<?php

foreach($this->noteGetList as $value){
    $big_root = "big_item?id={$value['work_author']}/works/";
echo "<div id = 'note_content'>
            <div class = 'note_img1'>
                 <div><a href = '{$big_root}{$value['work_img']}'><img src='".URL."public/images/users/{$value['work_author']}/works/{$value['work_img']}' ></a></div>
            </div>
                            <p id = 'note_p'>{$value['work_title']}</p>
            <div id = 'note_main'>

                <p>Краткая информация</p>
                <p><span>Автор:</span> {$value['work_author']}</p>
                <p><span>Дата:</span> {$value['work_date']}</p>
                <p><span>Катеогия:</span> {$value['cat_name']}</p>
                <p><span>Просмотров:</span>{$value['work_view']}</p>
                <p><span>Понравилось:</span>{$value['work_rating']}</p>
                <p><span>Материал:</span> {$value['work_desc']}</p>
                <p><span>Краткая описание:</span> {$value['work_desc']}</p>
            </div>";
if(!empty($value['work_img1'])){
    ?>
    <div id = 'banner6'></div>
    <div id = 'black_line'></div>
<?php
    echo "<p>Фотографии работы</p>";
    $img_root = URL."public/images/users/{$value['work_author']}/works/";
if(!empty($value['work_img1'])){echo "<div class = 'note_img'><a href = '{$big_root}{$value['work_img1']}'><img src='{$img_root}/{$value['work_img1']}' ></a></div>";}
if(!empty($value['work_img2'])){echo "<div class = 'note_img'><a href = '{$big_root}{$value['work_img2']}'><img src='{$img_root}/{$value['work_img2']}' ></a></div>";}
if(!empty($value['work_img3'])){echo "<div class = 'note_img'><a href = '{$big_root}{$value['work_img3']}'><img src='{$img_root}/{$value['work_img3']}' ></a></div>";}
if(!empty($value['work_img4'])){echo "<div class = 'note_img'><a href = '{$big_root}{$value['work_img4']}'><img src='{$img_root}/{$value['work_img4']}' ></a></div>";}
if(!empty($value['work_img5'])){echo "<div class = 'note_img'><a href = '{$big_root}{$value['work_img5']}'><img src='{$img_root}/{$value['work_img5']}' ></a></div>";}
if(!empty($value['work_img6'])){echo "<div class = 'note_img'><a href = '{$big_root}{$value['work_img6']}'><img src='{$img_root}/{$value['work_img6']}' ></a></div>";}

    }echo "</div>";
    echo "<p><span>Описание:</span> {$value['work_desc']}</p>";
}
?>
    <div id = 'black_line'></div>
    <div id = 'banner7'></div>

    <?php
if(!empty($this->noteCommentList)){
echo "<div id='note_com'>
            <p>Коментарии:</p>";
    foreach($this->noteCommentList as $value){
        echo <<<LABEL
        <div id='note_comment'>
            <p>От: {$value['note_author']} <span> Дата: {$value['note_date']}</span></p>
            <p> {$value['note_desc']}</p>
        </div>
LABEL;
    }
    echo "</div>";
}
    ?>
    <?php
    if(isset($_SESSION['name'])){
        ?>
        <div id='form_comment'>
            <p>Добавить ваш коментарий</p>
            <form action="../note/commentRun" method="post" name="formcomm">
                <div><input name="author" type="hidden" value = "<?php echo $_SESSION['name']?>" required/></div>
                <div><label>Текст коментария: <br /><textarea name="text" type="text" cols="40" rows="4" required/></textarea> </label></div>
                <input name="id" type="hidden" value="<?php echo   $id =$_GET['id'];?>">
                <div><input type="submit" name="sub_com" value="Коментировать"></div>
            </form>
        </div>
    <?php
    }
    ?>
</div>

