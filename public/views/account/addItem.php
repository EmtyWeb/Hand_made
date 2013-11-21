<div id = 'create_page'>
    <div id = 'create_content'>
        <p>Редактировать работу</p>
<?php// print_r($this->thisItem);?>
<form method="post" action="<?php echo URL;?>account/updateItem/<?php echo $this->thisItem[0]['work_id']; ?>" enctype="multipart/form-data">
    <table id = 'create_table'>
    <tr>
        <td><label for="title">Название работы</label></td>
        <td><input type="text" id="title" name="title"
               placeholder="Ваше название" value="<?php echo $this->thisItem[0]['work_title'];?>" /></td>
    </tr>
        <tr>
            <td><label for="categories">Категория работы </label></td>
            <td><select name="categories">
                    <?php
                    foreach($this->cat as $categories){
                        //@TODO //echo "<option value='".$categories['cat_name']."' selected>". $this->thisItem[0]['cat_name']."</option>";
                        echo "<option value='".$categories['cat_name']."'>".$categories['cat_desc']."</option>";
                    }
                    ?>
                </select></td>
        </tr>
    <tr>
        <td><label for="desc">Краткое оисание работы</label></td>
        <td><input type="text" name="desc"
                       placeholder="Описание работы" value="<?php echo $this->thisItem[0]['work_short'];?>"/></td>
    </tr>
    <tr>
        <td><label for="description">Описание работы</label></td>
        <td><input type="text" id="description" name="description"
               placeholder="Описание работы" value="<?php echo $this->thisItem[0]['work_desc'];?>"/></td>
    </tr>
    <tr>
        <td><label for="mat">Материалл</label></td>
        <td><input type="text" name="mat"
                    placeholder="нитки" value="<?php echo $this->thisItem[0]['work_mat'];?>"/></td>
    </tr>
        </table>
    <p>Главное изображение работы</p>
    <?php
    $root = URL."public/images/users/{$this->thisItem[0]['work_author']}/works/";
    ?>
    <div id = 'edit_main_img'><img src = '<?=$root.$this->thisItem[0]['work_img']?>' ><input type='file' name='picture'/></div>

    <p>Изображения работы</p>
    <?php
    if(!empty($this->thisItem[0]['work_img1']))
    { echo "<div class = 'edit_view_img'>
                        <div><img src='".$root.$this->thisItem[0]['work_img1']."'></div>
                        <input type='file' name='picture1' />
                    </div>";}elseif(!empty($this->thisItem[0]['work_img'])){echo  "<div class = 'pic_b'>Добавить фотографию:<input type='file' name='picture1' class = 'pic_b'/></div>";}
    if(!empty($this->thisItem[0]['work_img2']))
    { echo "<div class = 'edit_view_img'>
                        <div><img src='".$root.$this->thisItem[0]['work_img2']."'></div>
                        <input type='file' name='picture2' />
                    </div> ";}elseif(!empty($this->thisItem[0]['work_img1'])){echo  "<div class = 'pic_b'>Добавить фотографию:<input type='file' name='picture2' class = 'pic_b'/></div>";}
    if(!empty($this->thisItem[0]['work_img3']))
    { echo "<div class = 'edit_view_img'>
                        <div><img src='".$root.$this->thisItem[0]['work_img3']."'></div>
                        <input type='file' name='picture3' />
                    </div>";}elseif(!empty($this->thisItem[0]['work_img2'])){echo  "<div class = 'pic_b'>Добавить фотографию:<input type='file' name='picture3' /></div>";}
    if(!empty($this->thisItem[0]['work_img4']))
    { echo "<div class = 'edit_view_img'>
                        <div><img src='".$root.$this->thisItem[0]['work_img4']."'></div>
                        <input type='file' name='picture4' />
                    </div>";}elseif(!empty($this->thisItem[0]['work_img3'])){echo  "<div class = 'pic_b'>Добавить фотографию:<input type='file' name='picture4' class = 'pic_b'/></div>";}
    if(!empty($this->thisItem[0]['work_img5']))
    { echo "<div class = 'edit_view_img'>
                        <div><img src='".$root.$this->thisItem[0]['work_img5']."'></div>
                        <input type='file' name='picture5' />
                    </div>";}elseif(!empty($this->thisItem[0]['work_img4'])){echo  "<div class = 'pic_b'>Добавить фотографию:<input type='file' name='picture5' class = 'pic_b'/></div>";}
    if(!empty($this->thisItem[0]['v_img6']))
    { echo "<div class = 'edit_view_img'>
                        <div><img src='".$root.$this->thisItem[0]['work_img6']."'></div>
                        <input type='file' name='picture6' />
                    </div>";}elseif(!empty($this->thisItem[0]['work_img5'])){echo "<div class = 'pic_b'>Добавить фотографию:<input type='file' name='picture6' class = 'pic_b'/></div>";}
    ?>
    <div id = 'create_b'><input  type="submit" value="Редактировать"/></div>
</form>
    </div>
    <div id = 'banner4'></div>
</div>