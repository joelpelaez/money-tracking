<form action="<?php echo APP_URL; ?>accounts/add" method="post">
    <div class="form-group">
        <label for="user_id">User: </label>
        <select class="form-control" name="user_id">
            <?php foreach ($users as $user): ?>
                <option value="<?php echo $user["id"]; ?>"><?php echo $user["username"]; ?></option>
          <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="name">Name: </label>
        <input class="form-control" type="text" name="name">
    </div>
    <input class="btn btn-default" type="submit" value="Save">
</form>