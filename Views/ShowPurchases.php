<?php
    namespace Views;
    require_once('Nav.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Purchases - MoviePass</title>
</head>
<body>
    <div class="table-list" style="margin-top: 100px;">
    <h2 class="table-title" style="font-size: 35px;">My Purchases</h2>
    <table>
    <thead>
    <th>Number #</th>
    <th>Subtotal</th>
    <th>Discount</th>
    <th>Total Price</th>
    <th>Date</th>
    <th>Movie</th>
    </thead>
        <tbody>
        <?php foreach($arrayPurchases as $purchase){ ?>
        <tr>
        <td><?php echo $purchase->getIdPurchase(); ?></td>
        <td><?php echo $purchase->getSubtotal(); ?></td>
        <td><?php echo $purchase->getDiscount(); ?></td>
        <td><?php echo $purchase->getTotalPrice(); ?></td>
        <td><?php echo $purchase->getDatePurchase(); ?></td>
        <td><?php echo $purchase->getProjection()->getMovie()->getTitle(); ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>