<h2>Deleting user</h2>
<form action="<?php echo APP_URL; ?>users/delete" method="post">
    <div class="form-group">
        <p class="help-block">Do you want delete the user <b><?php echo $user["username"]; ?></b></p>
        <input type="hidden" name="id" value="<?php echo $user["id"]; ?>">
    </div>
    <input type="submit" value="Delete" class="btn btn-danger">
</form> 