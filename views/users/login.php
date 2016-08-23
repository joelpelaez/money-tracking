<h2>Inicio de sesión</h2>
<form action="<?php echo APP_URL; ?>users/login" method="post">
    <div class="form-group">
        <label for="username">Username: </label>
        <input class="form-control" type="text" name="username">
    </div>
    <div class="form-group">
        <label for="password">Password: </label>
        <input class="form-control" type="password" name="password">
    </div>
    <input type="submit" value="Login" class="btn btn-default">
</form>
