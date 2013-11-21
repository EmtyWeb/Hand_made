<div id="registration_page">
        <p>Регистрация</p>
        <form action='registration/registrationRun' method="POST">
                <table id = 'reg_table'>
                    <tr>
                        <td><label for="login">Логин<sup>*</sup></label></td>
                        <td><input type="text" id="login" name="login"
                             placeholder="Логин" value="" required/></td>
                    </tr>
                    <tr>
                        <td><label for="password">Пароль<sup>*</sup></label></td>
                        <td><input type="text" id="password" name="password"
                             placeholder="Пароль" value="" required/></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email<sup>*</sup></label></td>
                        <td><input type="email" id="email" name="email"
                             placeholder="e@example.com" value="" required/></td>
                    </tr>
                    <tr>
                        <td><label for="first_name">Имя</label></td>
                        <td><input type="text" id="first_name" name="first_name"
                             placeholder="Имя" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td><label for="last-name">Фамилия</label></td>
                        <td><input type="text" id="last-name" name="last_name"
                             placeholder="Фамилия" value="" /></td>
                    </tr>
                    <tr>
                        <td><label for="phone">Телефон</label></td>
                        <td><input type="phone" id="phone" name="phone"
                                   placeholder="0684141572" value="" /></td>
                    </tr>
                    <tr>
                        <td><label for="gender">Пол</label></td>
                        <td><select name="gender">
                                <option value="male">male</option>
                                <option value="female" selected>female</option>
                            </select></td>
                    </tr>
                </table>
            <div>
                <input type="submit" id="reg_b" name="send_form"  value="Зарегистрироваться"/>
            </div>
                </form>
    <div id = "banner4"></div>
</div>
