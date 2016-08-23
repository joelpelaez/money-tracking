<h2>Deleting account</h2>
<form action="<?php echo APP_URL; ?>accounts/delete" method="post">
    <div class="form-group">
        <p class="help-block">Do you want delete the account <b><?php echo $account["name"]; ?></b></p>
        <input type="hidden" name="id" value="<?php echo $account["id"]; ?>">
    </div>
    <input type="submit" value="Delete" class="btn btn-danger">
</form> 