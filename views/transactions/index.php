<h2>Transactions list</h2>
<div class="table-responsive">
    <table class="table">
        <tr>
            <th>Description</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Account</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
    <?php foreach ($transactions as $transaction): ?>
        <tr>
            <td><?php echo $transaction["description"]; ?></td>
            <td class="<?php if ($transaction["amount"] >= 0) echo "amount-green"; else echo "amount-red"; ?>">$ <?php echo number_format($transaction["amount"], 2, '.', ''); ?></td>
            <td><?php echo date_create($transaction["date"])->format('d/m/Y'); ?></td>
            <td><?php echo $transaction["account_id"]; ?></td>
            <td><?php echo $transaction["category_id"]; ?></td>
            <td>
                <a href="<?php echo APP_URL; ?>transactions/edit/<?php echo $transaction['id']; ?>">Edit</a>
                <a href="<?php echo APP_URL; ?>transactions/delete/<?php echo $transaction['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>
<a href="<?php echo APP_URL; ?>transactions/add" class="btn btn-default" role="button">Add New Transaction</a>