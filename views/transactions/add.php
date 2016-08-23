<form action="<?php echo APP_URL; ?>transactions/add" method="post">
    <div class="form-group">
        <label for="account_id">Account: </label>
        <select class="form-control" name="account_id">
            <?php foreach ($accounts as $account): ?>
                <option value="<?php echo $account["id"]; ?>"><?php echo $account["name"]; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="category_id">Category: </label>
        <select class="form-control" name="category_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="amount">Amount: </label>
        <input type="number" name="amount" class="form-control" step="any" value="0">
    </div>
    <div class="form-group">
        <label for="date">Date: </label>
        <input class="form-control" type="date" name="date" value="<?php echo date('Y-m-d'); ?>">
    </div>
    <div class="form-group">
        <label for="description">Description: </label>
        <input type="text" class="form-control" name="description">
    </div>
    <input type="submit" value="Add" class="btn btn-default">
</form>