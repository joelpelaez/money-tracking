<form action="<?php echo APP_URL; ?>accounts/edit" method="post">
    <input type="hidden" name="id" value="<?php echo $account['id']; ?>">
    <div class="form-group">
        <label for="user_id">User: </label>
        <select class="form-control" name="user_id">
            <?php foreach ($users as $user):
                if ($user["id"] == $account["user_id"]): ?>
                    <option value="<?php echo $user["id"]; ?>" selected><?php echo $user["username"]; ?></option>
                <?php
                else: ?>
                    <option value="<?php echo $user["id"]; ?>"><?php echo $user["username"]; ?></option>
                <?php endif;
            endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="name">Name: </label>
        <input class="form-control" type="text" name="name" value="<?php echo $account["name"]; ?>">
    </div>
    <input type="submit" value="Update" class="btn btn-default">
</form>