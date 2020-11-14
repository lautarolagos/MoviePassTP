<?php
    namespace Views;
    include('Nav.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Done!</title>
</head>
<body>
    <section style="margin-top: 3rem;">
        <h2 class="form-title">Purchase Done!</h2>
        <h2 class="form-title" style="font-size: 23px;">Purchase Code: #<?php echo $idPurchase; ?></h2>
        <?php foreach($arrayTickets as $ticket)
        {
        ?>
        <div class="cont-form" style="border-style: inset; color:red;">
            <form class="form">
                <label for="numberTicket" style="color: white;">Ticket Number: <?php echo $ticket->getNumber(); ?></label>
                <hr>
                <label for="numberTicket" style="color: white;">QR Code: <?php echo $ticket->getQRCode(); ?></label>
            </form>
        </div>
<?php   }
        ?>
    </section>
</body>
</html>