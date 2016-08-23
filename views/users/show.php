<?php
$income = 0;
$expenditure = 0;
$balance = 0;
?>
<h2>User transactions</h2>
<div class="table-responsive">
    <table class="table">
        <tr>
            <th>Description</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Account</th>
            <th>Category</th>
        </tr>
    <?php foreach ($transactions as $transaction): 
    if ($transaction["amount"] < 0) $expenditure += $transaction["amount"];
    else $income += $transaction["amount"];
    ?>
        <tr>
            <td><?php echo $transaction["description"]; ?></td>
            <td class="<?php if ($transaction["amount"] >= 0) echo "amount-green"; else echo "amount-red"; ?>">$ <?php echo number_format($transaction["amount"], 2, '.', ''); ?></td>
            <td><?php echo date_create($transaction["date"])->format('d/m/Y'); ?></td>
            <td><?php echo $transaction["account_id"]; ?></td>
            <td><?php echo $transaction["category_id"]; ?></td>
        </tr>
    <?php endforeach; 
    $balance = $income + $expenditure;
    ?>
    </table>
</div>
<h2>Summary</h2>
<div class="table-responsive">
    <table class="table">
        <tr>
            <td>Income</td>
            <td class="amount-green">$ <?php echo number_format($income, 2, '.', ''); ?></td>
        </tr>
        <tr>
            <td>Expenditure</td>
            <td class="amount-red">$ <?php echo number_format($expenditure, 2, '.', ''); ?></td>
        </tr>
        <tr>
            <td>Balance</td>
            <td>$ <?php echo number_format($balance, 2, '.', ''); ?></td>
        </tr>
    </table>
</div>