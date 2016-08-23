<form action="<?php echo APP_URL; ?>transactions/edit" method="post">
    <input type="hidden" name="id" value="<?php echo $transaction['id']; ?>">
    <div class="form-group">
        <label for="account_id">Account: </label>
        <select class="form-control" name="account_id">
            <?php foreach ($accounts as $account):
                if ($account["id"] == $transaction["account_id"]): ?>
                    <option value="<?php echo $account["id"]; ?>" selected><?php echo $account["name"]; ?></option>
                <?php
                else: ?>
                    <option value="<?php echo $account["id"]; ?>"><?php echo $account["name"]; ?></option>
                <?php endif;
            endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="category_id">Category: </label>
        <select class="form-control" name="category_id">
            <?php foreach ($categories as $category):
                if ($category["id"] == $transaction["category_id"]): ?>
                    <option value="<?php echo $category["id"]; ?>" selected><?php echo $category["name"]; ?></option>
                <?php
                else: ?>
                    <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>
                <?php endif;
            endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="amount">Amount: </label>
        <input class="form-control" type="number" name="amount" step="any" value="<?php echo $transaction["amount"]; ?>">
    </div>
    <div class="form-group">
        <label for="date">Date: </label>
        <input class="form-control" type="date" name="date" value="<?php echo $transaction["date"]; ?>">
    </div>
    <div class="form-group">
        <label for="description">Description: </label>
        <input type="text" class="form-control" name="description" value="<?php echo $transaction["description"]; ?>">
    </div>
    <input type="submit" value="Update" class="btn btn-default">
</form>