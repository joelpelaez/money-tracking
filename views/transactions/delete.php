<h2>Deleting transaction</h2>
<form action="<?php echo APP_URL; ?>transactions/delete" method="post">
    <div class="form-group">
        <p class="help-block">Do you want delete the transaction <b><?php echo $transaction["name"]; ?></b></p>
        <input type="hidden" name="id" value="<?php echo $transaction["id"]; ?>">
    </div>
    <input type="submit" value="Delete" class="btn btn-danger">
</form> 