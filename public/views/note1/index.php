<h1>Note</h1>
<? //@TODO: form check?>

<form method="post" action="<?php echo URL;?>note/create">
    <label>Login</label><input type="text" name="login" /><br />
    <label>&nbsp;</label><input type="submit" value="Добавить"/>
</form>

<hr />

<table>
    <?php
    /*  foreach($this->userList as $key => $value) {
 /*       echo '<tr>';
        // echo '<td>' . $value['users_id'] . '</td>';
         echo '<td>' . $value['login'] . '</td>';
         echo '<td>' . $value['role'] . '</td>';
         echo '<td>
                 <a href="'.URL.'users/edit/'.$value['id'].'">Edit</a>
                 <a href="'.URL.'users/delete/'.$value['id'].'">Delete</a></td>';
         echo '</tr>';
    }*/
    ?>
</table>