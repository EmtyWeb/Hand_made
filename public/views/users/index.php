<h1>Добавления нового пользователя</h1>
<? //@TODO: form check?>

<form method="post" action="<?php echo URL;?>users/create">
    <div>
        <label for="login">Логин<sup>*</sup></label>
        <input type="text" id="login" name="login"
               placeholder="Логин" value="" required/>
    </div>
    <div>
        <label for="password">Пароль<sup>*</sup></label>
        <input type="text" id="password" name="password"
               placeholder="Пароль" value="" required/>
    </div>
    <div>
    <label for="role">Права</label>
    <select name="role">
        <option value="default">Default</option>
        <option value="admin">Admin</option>
        <option value="developer">Developer</option>
        <option value="owner">Owner</option>
    </select>
    </div>
    <div>
        <label for="email">Email<sup>*</sup></label>
        <input type="email" id="email" name="email"
               placeholder="example@example.com" value="" required/>
    </div>
<input type="submit" value="Добавить"/>
</form>

<hr />

<table border='1'>
    <?php
    foreach($this->userList as $key => $value) {
        echo '<tr>';
      // echo '<td>' . $value['users_id'] . '</td>';
        echo '<td>' . $value['user_login'] . '</td>';
        echo '<td>' . $value['user_role'] . '</td>';
        echo '<td>' . $value['email'] . '</td>';
        echo '<td>
                <a href="'.URL.'users/edit/'.$value['user_id'].'">Edit</a>
                <a href="'.URL.'users/delete/'.$value['user_id'].'">Delete</a></td>';
        echo '</tr>';
    }
    ?>
</table>