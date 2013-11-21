<? //@TODO check empty and default ?>
<div id = 'profile_page'>
    <div id = 'profile_content'>
    <p>Редактировать информацию</p>
<form method="post" action="<?php echo URL;?>account/profileEdit/"  enctype="multipart/form-data">
    <table id = 'profile_table'>
        <tr>
            <td><label for="first_name">Имя</label></td>
            <td><input type="text" id="first_name" name="first_name"
                       placeholder="Имя" value="<?php echo $this->infoProfileList[0]['first_name']; ?>" />
            </td>
        </tr>
        <tr>
            <td><label for="last-name">Фамилия</label></td>
            <td><input type="text" id="last-name" name="last_name"
                       placeholder="Фамилия" value="<?php echo $this->infoProfileList[0]['last_name']; ?>" />
            </td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td><input type="email" id="email" name="email"
                       placeholder="example@example.com" value="<?php echo $this->infoProfileList[0]['email']; ?>" />
            </td>
        </tr>
        <tr>
            <td><label for="phone">Телефон</label></td>
            <td><input type="phone" id="phone" name="phone"
                       placeholder="0684141572" value="<?php echo $this->infoProfileList[0]['phone']; ?>" />
            </td>
        </tr>
        <tr>
            <td><label for="age">Возраст</label></td>
            <td><input type="age" id="age" name="age"
                       placeholder="18" value="<?php echo $this->infoProfileList[0]['age']; ?>" />
            </td>
        </tr>
        <tr>
            <td><label for="gender">Пол</label></td>
            <td><select name="gender">
                    <option value="male" <?php if($this->infoProfileList[0]['gender'] == 'male') echo 'selected'; ?>>male</option>
                    <option value="female" <?php if($this->infoProfileList[0]['gender'] == 'female') echo 'selected'; ?>>female</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="birthday">День Рождения</label></td>
            <td><input type="birthday" id="birthday" name="birthday"
                       placeholder="birthday" value="<?php echo $this->infoProfileList[0]['birthday']; ?>" />
            </td>
        </tr>
        <tr>
            <td><label for="city">Город</label></td>
            <td><input type="city" id="city" name="city"
                       placeholder="city" value="<?php echo $this->infoProfileList[0]['city']; ?>" />
            </td>
        </tr>
        <tr>
            <td><label for="country">Страна</label></td>
            <td><input type="country" id="country" name="country"
                       placeholder="country" value="<?php echo $this->infoProfileList[0]['country']; ?>" />
            </td>
        </tr>
        <tr>
            <td><label for="favorite_cat">Увличения</label></td>
            <td><input type="favorite_cat" id="favorite_cat" name="favorite_cat"
                       placeholder="Футбол" value="<?php echo $this->infoProfileList[0]['favorite_cat']; ?>" />
            </td>
        </tr>
    </table>
    <div id = 'user_desc'><p>О себе</p>
        <textarea ><?php echo $this->infoProfileList[0]['user_desc']; ?></textarea>
    </div>
    <div>
        <p>Фотография:</p>  <input type="file" name="picture" value="<?php echo $this->infoProfileList[0]['user_img']; ?>" />
    </div>
    <input id = 'profile_b' type="submit" value="Редактировать"/>
</form>
        </div>
    <div id = 'banner4'></div>
</div>
