<div id="login_page">
    <div id = 'login_content'>
        <p>Вход</p>
        <form  action='login/loginRun' method="POST">
            <table id = 'log_table'>
                <tr>
                    <td><label for="login">Login </label></td>
                    <td><input type="text" id="login" name="login"
                        placeholder="Login" value="" required/></td>
                </tr>
                <tr>
                    <td><label for="password">Password </label></td>
                    <td><input type="text" id="passwordlogin" name="password"
                        placeholder="Password" value="" required/>
                    </td>
                </tr>

            </table>
            <input id = 'log_check' name="autovhod" type="checkbox" value=''>Запомнить пароль
            <div>
                <input type="submit" id="log_b" name="send_form"  value="Вход"/>
            </div>
        </form>

    <a href="<?=URL?>login/forgot">Забыли    пароль?</a>
    </div>
</div>

