<div id = 'create_page'>
    <div id = 'create_content'>
        <p>Добавить работу на ярморку</p>
        <form method="post" action="<?php echo URL;?>account/create_fair" enctype="multipart/form-data">
            <table id = 'create_table'>
                <tr>
                    <td><label for="title">Название работы<sup>*</sup></label></td>
                    <td><input type="text" id="title" name="title"
                               placeholder="Ваше название" value="" required/>
                    </td>
                </tr>
                <tr>
                    <td><label for="categories">Категория работы </label></td>
                    <td><select name="categories" style = "width:145px">
                            <?php
                            foreach($this->cat as $categories){
                                echo "<option value='{$categories['catf_name']}'>{$categories['catf_desc']}</option>";
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
                    <td><label for="price">Цена<sup>*</sup></label></td>
                    <td><input type="text" pattern="[0-9]{1,5}" id="price" name="price"
                               placeholder="100" value="" required/>
                    </td>
                    <td>
                        <select name="current">
                            <option value="руб">руб</option>
                            <option value="грн" selected>грн</option>
                            <option value="€">€</option>
                            <option value="$">$</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="mat">Материал<sup>*</sup></label></td>
                    <td><input type="text" id="mat" name="mat"
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