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
    <div>
            <h1>M<span>OVIE</span> P<span>ASS</span></h1>
    </div>
    <div class="cont-form">
            <form class="form" action="#" method="POST">
                <div>
                    <h2 class="form-title">Verify if everything is correct!</h2>
                </div>
                <div>
                <label for="movie">Movie:</label>
                    <input class="form-input" type="text" id="movie" name="movie" class="" placeholder="Movie Name" readonly>
                </div>
                <div>
                <label for="ticketQuantity">Tickets:</label>
                    <input class="form-input" type="text" id="ticketQuantity" name="ticketQuantity" class="" placeholder="Tickets Quantity" readonly>
                </div>
                <div>
                <label for="cinemaAndAuditorium">Cinema and Auditorium:</label>
                    <input class="form-input" type="text" id="cinemaAndAuditorium" name="cinemaAndAuditorium" class="" placeholder="Cinema and Auditorium Name" readonly>
                </div>
                <div>
                <label for="dateTime">Date and Time:</label>
                    <input class="form-input" type="text" id="dateTime" name="dateTime" class="" placeholder="Date and Hour" readonly>
                </div>
                <div>
                <label for="totalPrice">Total:</label> <?php // Aca pienso poner un mensaje diga si se aplico descuento o no ?>
                    <input class="form-input" type="text" id="totalPrice" name="totalPrice" class="" placeholder="Total Price $" readonly>
                </div>
                <center><button class="btn-submit" type="submit">CONFIRM BUY</button></center>
            </form>
            <form class="form" action="#" method="POST">
            <button class="btn-submit" type="submit">Go Back</button>
            </form>
        </div>
    </body>
</html>