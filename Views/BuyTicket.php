<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Tickets - MoviePass</title>
</head>
<body>
    <div>
            <h1>M<span>OVIE</span> P<span>ASS</span></h1>
    </div>
    <div class="cont-form">
            <form class="form" action="<?php echo FRONT_ROOT ?>Purchase/ShowConfirmBuy" method="POST">
                    <div>
                        <h2 class="form-title"><?php echo $movieTitle;?></h2>
                    </div>
                    <div>
                    <label for="quantity">How many tickets do you want?</label>
                        <input class="form-input" type="number" min="1" name="quantity" placeholder="Quantity" required>
                    </div>
                    <!-- <div>
                    <label for="creditCard">Payment information:</label> <?php // Esto deberia auto completarse si el usuario ya tiene registrada una tarjeta de credito ?>
                        <input class="form-input"type="text" id="creditCard" name="creditCard" placeholder="XXXX-XXXX-XXXX" readonly>
                    </div> -->
                    <input type="hidden" name="movieTitle" value="<?php echo $movieTitle; ?>">
                    <input type="hidden" name="idProjection" value="<?php echo $idProjection; ?>">
                    <center><button class="btn-submit" type="submit">Next Step</button></center>
            </form>
            <form class="form" action="#" method="POST">
            <button class="btn-submit" type="submit">Go Back</button>
            </form>
        </div>
    </body>
</html>
