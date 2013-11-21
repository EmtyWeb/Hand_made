<h1>Редактирование информации</h1>
<? //@TODO check empty and default ?>
<?php // print_r($this->user); ?>
<form method="post" action="<?php echo URL;?>users/editSave/<?php echo $this->user[0]['user_id']; ?>">
    <div>
        <label for="login">Логин</label>
        <input type="text" id="login" name="login"
               placeholder="Логин" value="<?php echo $this->user[0]['user_login']; ?>" />
    </div>
    <div>
        <label for="password">Пароль</label>
        <input type="text" id="password" name="password"
               placeholder="Пароль" value="" />
    </div>
    <div>
        <label for="role">Права</label>
        <select name="role">
            <option value="default" <?php if($this->user[0]['user_role'] == 'default') echo 'selected'; ?>>Default</option>
            <option value="admin" <?php if($this->user[0]['user_role'] == 'admin') echo 'selected'; ?>>Admin</option>
            <option value="developer" <?php if($this->user[0]['user_role'] == 'developer') echo 'selected'; ?>>Developer</option>
            <option value="owner" <?php if($this->user[0]['user_role'] == 'owner') echo 'selected'; ?>>Owner</option>
        </select>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email"
               placeholder="example@example.com" value="<?php echo $this->user[0]['email']; ?>" />
    </div>
    <div>
        <label for="first_name">Имя</label>
        <input type="text" id="first_name" name="first_name"
               placeholder="Имя" value="<?php echo $this->user[0]['first_name']; ?>" />
    </div>
    <div>
        <label for="last-name">Фамилия</label>
        <input type="text" id="last-name" name="last_name"
               placeholder="Фамилия" value="<?php echo $this->user[0]['last_name']; ?>" />
    </div>
    <div>
        <label for="phone">Телефон</label>
        <input type="phone" id="phone" name="phone"
               placeholder="0684141572" value="<?php echo $this->user[0]['phone']; ?>" />
    </div>
    <div>
        <label for="age">Возраст</label>
        <input type="age" id="age" name="age"
               placeholder="18" value="<?php echo $this->user[0]['age']; ?>" />
    </div>
    <div>
        <label for="gender">Пол</label>
        <select name="gender">
            <option value="male" <?php if($this->user[0]['gender'] == 'male') echo 'selected'; ?>>male</option>
            <option value="female" <?php if($this->user[0]['gender'] == 'female') echo 'selected'; ?>>female</option>
        </select>
    </div>
    <div>
        <label for="birthday">День Рождения</label>
        <input type="birthday" id="birthday" name="birthday"
               placeholder="birthday" value="<?php echo $this->user[0]['birthday']; ?>" />
    </div>
    <div>
        <label for="city">Город</label>
        <input type="city" id="city" name="city"
               placeholder="city" value="<?php echo $this->user[0]['city']; ?>" />
    </div>
    <div>
        <label for="country">Страна</label>
        <input type="country" id="country" name="country"
               placeholder="country" value="<?php echo $this->user[0]['country']; ?>" />
    </div>
    <div>
        <label for="favorite_cat">Любимые категории</label>
        <input type="favorite_cat" id="favorite_cat" name="favorite_cat"
               placeholder="Футбол" value="<?php echo $this->user[0]['favorite_cat']; ?>" />
    </div>
    <div>
        <label for="user_desc">О себе</label>
        <input type="user_desc" id="user_desc" name="user_desc"
               placeholder="О себе" value="<?php echo $this->user[0]['user_desc']; ?>" />
    </div>
    <input type="submit" value="Редактировать"/>
</form>