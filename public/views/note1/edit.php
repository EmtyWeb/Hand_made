<h1>User: Edit</h1>
<? //@TODO check empty and default ?>
<?php //print_r($this->user); ?>
<form method="post" action="<?php echo URL;?>users/editSave/<?php echo $this->user[0]['id']; ?>">
    <label>Login</label><input type="text" name="login" value="<?php echo $this->user[0]['login']; ?>" /><br />
    <label>Password</label><input type="text" name="password" /><br />
    <label>Role</label>
    <select name="role">
        <option value="admin" <?php if($this->user[0]['role'] == 'admin') echo 'selected'; ?>>Admin</option>
        <option value="owner" <?php if($this->user[0]['role'] == 'owner') echo 'selected'; ?>>Owner</option>
        <option value="default" <?php if($this->user[0]['role'] == 'default') echo 'selected'; ?>>Default</option>
    </select><br />
    <label>&nbsp;</label><input type="submit" />
</form>