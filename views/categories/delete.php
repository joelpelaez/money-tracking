<h2>Deleting category</h2>
<form action="<?php echo APP_URL; ?>categories/delete" method="post">
    <div class="form-group">
        <p class="help-block">Do you want delete the category <b><?php echo $category["name"]; ?></b></p>
        <input type="hidden" name="id" value="<?php echo $category["id"]; ?>">
    </div>
    <input type="submit" value="Delete" class="btn btn-danger">
</form> 