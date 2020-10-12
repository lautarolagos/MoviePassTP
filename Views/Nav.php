<?php
    namespace Views;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="nav-link">
    <div id="menu">
        <div>
            <ul>
                <li>
                    <a class="item-r"><?php session_start(); echo $_SESSION['email']?></a>
                </li>

                <li>
                    <a class="item-r" href="<?php echo FRONT_ROOT ?>/Billboard">Billboard</a>
                </li>
                <li>
                    <a class="item-r" href="<?php echo FRONT_ROOT ?>/Logout">Logout</a>
                </li>
                <li>
                    <a  class="item-r" href="<?php echo FRONT_ROOT ?>/Cinema/ShowCinemaList">Cinema Listings</a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
