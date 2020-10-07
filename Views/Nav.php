<?php
    namespace Views;
?>
<nav>
    <span>
        Hola <strong><?php session_start(); echo $_SESSION['email']?></strong>
    </span>
    <ul>
        <li>
            <a href="<?php echo FRONT_ROOT ?>/Billboard">Billboard</a>
        </li>
        <li>
            <a href="LogoutController.php">Logout</a>
        </li>
    </ul>
</nav>