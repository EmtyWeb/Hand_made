<div id = 'note_page'>
    <div id = 'black_line'></div>
    <?php

    foreach($this->itemGetList as $value){
        $big_root = "big_item?id={$value['fair_author']}/fair/";
        echo "<div id = 'note_content'>
            <div class = 'note_img1'>
                 <div><a href = '{$big_root}{$value['fair_img']}'>
                    <img src='".URL."public/images/users/{$value['fair_author']}/fair/{$value['fair_img']}'>
                 </a></div>
            </div>
                            <p id = 'note_p'>{$value['fair_title']}</p>
            <div id = 'note_main'>
                <p><span>Автор:</span> <a href = '".URL."master/info/{$value['fair_author']}'>{$value['fair_author']}</a></p>
                <p><span>Дата:</span> {$value['fair_date']}</p>
                <p><span>Цена:</span> <span id = 'fair_price'>{$value['price']} {$value['current']}</span></p>
                <p><span>Катеогия:</span> {$value['catf_name']}</p>
                <p><span>Просмотров:</span>{$value['fair_view']}</p>
                <p><span>Понравилось:</span>{$value['fair_rating']}</p>
                <p><span>Материал:</span> {$value['fair_mat']}</p>
                <p><span>Краткая описание:</span> {$value['fair_short']}</p>
            </div>";
        if(!empty($value['fair_img1'])){
            ?>
            <div id = 'banner6'></div>
            <div id = 'black_line'></div>
            <?php
            echo "<p>Фотографии работы</p>";
            $root = URL."public/images/users/{$value['fair_author']}/fair/";
            if(!empty($value['fair_img1'])){echo "<div class = 'note_img'><a href = '{$big_root}{$value['fair_img1']}'><img src='{$root}{$value['fair_img1']}'></a></div>";}
            if(!empty($value['fair_img2'])){echo "<div class = 'note_img'><a href = '{$big_root}{$value['fair_img2']}'><img src='{$root}{$value['fair_img2']}'></a></div>";}
            if(!empty($value['fair_img3'])){echo "<div class = 'note_img'><a href = '{$big_root}{$value['fair_img3']}'><img src='{$root}{$value['fair_img3']}'></a></div>";}
            if(!empty($value['fair_img4'])){echo "<div class = 'note_img'><a href = '{$big_root}{$value['fair_img4']}'><img src='{$root}{$value['fair_img4']}'></a></div>";}
            if(!empty($value['fair_img5'])){echo "<div class = 'note_img'><a href = '{$big_root}{$value['fair_img5']}'><img src='{$root}{$value['fair_img5']}'></a></div>";}
            if(!empty($value['fair_img6'])){echo "<div class = 'note_img'><a href = '{$big_root}{$value['fair_img6']}'><img src='{$root}{$value['fair_img6']}'></a></div>";}

        }echo "</div>";
        echo "<p><span>Описание:</span> {$value['fair_desc']}</p>";
    }
    ?>
    <div id = 'black_line'></div>
    <div id = 'banner7'></div>

    <?php
    if(!empty($this->itemCommentList)){
        echo "<div id='note_com'>
            <p>Коментарии:</p>";
        foreach($this->itemCommentList as $value){
            echo <<<LABEL
        <div id='note_comment'>
            <p>От: {$value['notef_author']} <span> Дата: {$value['notef_date']}</span></p>
            <p> {$value['notef_desc']}</p>
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
            <form action="../item/commentRun" method="post" name="formcomm">
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

