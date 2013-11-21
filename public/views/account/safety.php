<div id = 'forgot_page'>
    <div id = 'forgot_content'>
    <div id = 'content_center'>
        <p>Cменить пароль</p>
<form method="post" action="<?php echo URL;?>account/safety/<?php echo $this->infoProfileList[0]['user_id']; ?>">
    <table id = 'forgot_table'>
        <tr>
            <td><label for="password">Старый пароль</label></td>
            <td><input type="password" id="password" name="password"
                       placeholder="Старый пароль" value="<?php echo $this->infoProfileList[0]['password']; ?>" />
            </td>
        </tr>
        <tr>
            <td><label for="new_password">Новый пароль</label></td>
            <td><input type="password" id="new_password" name="new_password"
                       placeholder="Новый пароль" value="" />
            </td>
        </tr>
        <tr>
            <td><label for="repeat_password">Повторите пароль</label></td>
            <td><input type="password" id="repeat_password" name="repeat_password"
                       placeholder="Повторите пароль" value="" />
            </td>
        </tr>
    </table>
    <div id = 'forgot_b'><input  type="submit" value="Редактировать"/></div>
</form>
</div>
    </div>
    <div id = 'banner4'></div>
</div>