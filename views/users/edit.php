<form action="<?php echo APP_URL; ?>users/edit" method="post">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    <div class="form-group">
        <label for="username">Username: </label>
        <input class="form-control" type="text" name="username" value="<?php echo $user['username']; ?>">
    </div>
    <div class="form-group">
        <label for="new_password">Password: </label>
        <input class="form-control" type="password" name="new_password">
    </div>
    <div class="form-group">
        <label for="rol">Rol: </label>
        <input class="form-control" type="text" name="rol" value="<?php echo $user["rol"]; ?>">
    </div>
    <input type="submit" value="Update" class="btn btn-default">
</form>