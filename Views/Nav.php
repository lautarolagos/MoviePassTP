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
    <ul>
        <li class="item-l">
                <a>Welcome, <strong><?php echo $_SESSION['firstName']?> !</strong></a> 
            </li>
            <li>
                <a  href="#">Billboard</a>
            </li>
            <?php if($_SESSION['isAdmin']=="1")
            {
            ?>
            <li>
                <a   href="<?php echo FRONT_ROOT ?>Cinema/ShowAddView">Add Cinema</a>
            </li>
            <?php 
            }
            ?>
            <li>
                <a   href="<?php echo FRONT_ROOT ?>Cinema/ShowCinemaList">Cinema Listings</a>
            </li>
            <li>
                <a  href="<?php echo FRONT_ROOT ?>Session/Logout">Logout</a>
            </li>
        </ul>
    </div>
</body>
</html>