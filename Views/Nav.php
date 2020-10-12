<?php
    namespace Views;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body >
    <div id="menu">
        <ul class="item-r">
            <li>
               <!-- <a "><?php session_start(); echo $_SESSION['email']?></a>-->
            </li>
            <li>
                <a  href="<?php echo FRONT_ROOT ?>/Billboard">Billboard</a>
            </li>
            <li>
                <a   href="<?php echo FRONT_ROOT ?>/Cinema/ShowCinemaList">Cinema Listings</a>
            </li>
            <li>
                <a  href="<?php echo FRONT_ROOT ?>/Logout">Logout</a>
            </li>
        </ul>
    </div>
</body>
</html>
