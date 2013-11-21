<div id = 'create_page'>
    <div id = 'create_content'>
        <p>Добавить работу</p>
<form method="post" action="<?php echo URL;?>account/createItem" enctype="multipart/form-data">
    <table id = 'create_table'>
        <tr>
            <td><label for="title">Название работы<sup>*</sup></label></td>
            <td><input type="text" id="title" name="title"
                       placeholder="Ваше название" value="" required/>
            </td>
        </tr>
        <tr>
            <td><label for="categories">Категория работы </label></td>
            <td><select name="categories">
                    <?php
                    foreach($this->cat as $categories){
                        echo "<option value='{$categories['cat_name']}'>{$categories['cat_desc']}</option>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td><label for="description">Краткое описание работы<sup>*</sup></label></td>
            <td><input type="text" id="description" name="description"
                       placeholder="Описание работы" value="" required/>
            </td>
        </tr>
        <tr>
            <td><label for="description">Полное описание работы<sup>*</sup></label></td>
            <td><input type="text" id="description" name="description"
                       placeholder="Описание работы" value="" required/>
            </td>
        </tr>
        <tr>
            <td><label for="description">Материал<sup>*</sup></label></td>
            <td><input type="text" id="description" name="description"
                       placeholder="Описание работы" value="" required/>
            </td>
        </tr>
    </table>
    <p>Картинка работы<sup>*</sup></p>
            <div>
                <input type="file" name="picture" required/>
            </div>
            <div>
                <input type="file" name="picture1" />
            </div>
            <div>
                <input type="file" name="picture2" />
            </div>
            <div>
                <input type="file" name="picture3" />
            </div>
            <div>
                <input type="file" name="picture4" />
            </div>
            <div>
                <input type="file" name="picture5" />
            </div>
            <div>
                <input type="file" name="picture6" />
            </div>
    <div id = 'create_b'><input type="submit" value="Добавить"/></div>
</form>
    </div>
    <div id = 'banner4'></div>
</div>