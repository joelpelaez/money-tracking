<form action="<?php echo APP_URL; ?>users/add" method="post">
    <input type="hidden" name="add">
    <div class="form-group">
        <label for="username">Username: </label>
        <input class="form-control" type="text" name="username">
    </div>
    <div class="form-group">
        <label for="password">Password: </label>
        <input class="form-control" type="password" name="password">
    </div>
    <div class="form-group">
        <label for="rol">Rol: </label>
        <input class="form-control" type="text" name="rol">
    </div>
    <input type="submit" value="Save" class="btn btn-default">
</form>