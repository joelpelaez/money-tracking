<form action="<?php echo APP_URL; ?>categories/edit" method="post">
    <input type="hidden" name="id" value="<?php echo $category["id"]; ?>">
    <div class="form-group">
        <label for="name">Name: </label>
        <input class="form-control" type="text" name="name" value="<?php echo $category["name"]; ?>">
    </div>
    <input class="btn btn-default" type="submit" value="Update">
</form>