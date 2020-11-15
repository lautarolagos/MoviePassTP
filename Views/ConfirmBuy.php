<?php
    include('Nav.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo CSS_PATH;?>confirmBuy.css" rel="stylesheet" type="text/css" media="all">
    <title>Buy Tickets - MoviePass</title>
</head>
<body>
    <div class="cont-form-buy">
            <form class="form-buy">
                <div>
                    <h2 class="form-title-buy">Verify if everything is correct!</h2>
                </div>
                <div>
                <label class="title-buy"for="movie">Movie:</label>
                    <label class="form-label-buy" type="text" id="movie" name="movie" class="" placeholder=""><?php echo $movieTitle ?></label>
                </div>
                <div>
                <label class="title-buy"for="ticketQuantity">Tickets:</label>
                    <label class="form-label-buy" type="text" id="ticketQuantity" name="ticketQuantity" class="" placeholder=""><?php echo $quantity; ?></label>
                </div>
                <div>
                <div>
                <label class="title-buy"for="adress">Adress:</label>
                    <label class="form-label-buy" type="text" id="adress" name="adress" class="" placeholder=""><?php echo $projection->getAuditorium()->getCinema()->getAdress(); ?></label>
                </div>
                <label class="title-buy"for="cinema">Cinema:</label>
                    <label class="form-label-buy" type="text" id="cinema" name="cinema" class="" placeholder=""><?php echo $projection->getAuditorium()->getCinema()->getName();?></label>
                </div>
                <div>
                <label class="title-buy"for="auditorium">Auditorium:</label>
                    <label class="form-label-buy" type="text" id="auditorium" name="auditorium" class="" placeholder=""><?php echo $projection->getAuditorium()->getNameAuditorium(); ?></label>
                </div>
                <div>
                <label class="title-buy"for="dateTime">Date and Time:</label>
                    <label class="form-label-buy" type="text" id="dateTime" name="dateTime" class="" placeholder=""><?php echo $projection->getDate(); echo " at " .$projection->getStartTime();?></label>
                </div>
                <div>
                <label class="title-buy"for="subtotal">Subtotal:</label>
                <label class="form-label-buy" for="subtotal" name="subtotal"><?php echo "$" .$subtotal; ?></label>
                </div>
                <div>
                <label class="title-buy"for="discount">Discount:</label>
                <label class="form-label-buy" for="discount" name="discount"><?php echo "$" .$discount; ?></label>
                </div>
                <div>
                <label class="title-buy"for="totalPrice">Total Price:</label>
                <label class="form-label-buy" for="totalPrice" name="totalPrice"><?php echo "$" .$totalPrice; ?></label>
                </div>
            </form>   
            <form class="form-buy" action="<?php echo FRONT_ROOT ?>Purchase/ProcessBuy" method="POST">
                <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
                <input type="hidden" name="idProjection" value="<?php echo $projection->getIdProjection(); ?>">
                <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">
                <input type="hidden" name="discount" value="<?php echo $discount; ?>">
                <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
                <center><button class="btn-submit" type="submit">CONFIRM BUY</button></center>
            </form>
        </div>
    </div>    
    </body>
</html>