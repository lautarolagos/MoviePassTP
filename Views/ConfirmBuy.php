<?php
    include('Nav.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Tickets - MoviePass</title>
</head>
<body>
    <div class="cont-form">
            <form class="form">
                <div>
                    <h2 class="form-title">Verify if everything is correct!</h2>
                </div>
                <div>
                <label for="movie">Movie:</label>
                    <input class="form-input" type="text" id="movie" name="movie" class="" placeholder="<?php echo $movieTitle ?>" readonly>
                </div>
                <div>
                <label for="ticketQuantity">Tickets:</label>
                    <input class="form-input" type="text" id="ticketQuantity" name="ticketQuantity" class="" placeholder="<?php echo $quantity; ?>" readonly>
                </div>
                <div>
                <div>
                <label for="adress">Adress:</label>
                    <input class="form-input" type="text" id="adress" name="adress" class="" placeholder="<?php echo $projection->getAuditorium()->getCinema()->getAdress(); ?>" readonly>
                </div>
                <label for="cinema">Cinema:</label>
                    <input class="form-input" type="text" id="cinema" name="cinema" class="" placeholder="<?php echo $projection->getAuditorium()->getCinema()->getName(); ?>" readonly>
                </div>
                <div>
                <label for="auditorium">Auditorium:</label>
                    <input class="form-input" type="text" id="auditorium" name="auditorium" class="" placeholder="<?php echo $projection->getAuditorium()->getNameAuditorium(); ?>" readonly>
                </div>
                <div>
                <label for="dateTime">Date and Time:</label>
                    <input class="form-input" type="text" id="dateTime" name="dateTime" class="" placeholder="<?php echo $projection->getDate(); echo " at " .$projection->getStartTime();?>" readonly>
                </div>
                <div>
                <label for="totalPrice">Subtotal: <?php echo "$". $subtotal ?></label>
                <div>
                <?php if($discount!=0){
                    ?>
                    <label for="" style="padding-top:5px;">Discount applied! ($-<?php echo $discount; ?>)</label>
                <?php }
                ?> 
                </div>
                <label for="totalPrice">Total Price:</label>
                    <input class="form-input" type="text" id="totalPrice" name="totalPrice" class="" placeholder="<?php echo "$ $totalPrice";?>" readonly>
                </div>
                </form>
                <form class="form" action="<?php echo FRONT_ROOT ?>Purchase/ProcessBuy" method="POST">
                <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
                <input type="hidden" name="idProjection" value="<?php echo $projection->getIdProjection(); ?>">
                <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">
                <input type="hidden" name="discount" value="<?php echo $discount; ?>">
                <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
                <center><button class="btn-submit" type="submit">CONFIRM BUY</button></center>
                </form>
        </div>
    </body>
</html>