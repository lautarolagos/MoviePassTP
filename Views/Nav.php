<?php
    namespace Views;
?>
<nav>
    <span>
        <!-- comente lo de abajo por un warning que tira. Hay que arreglarlo -->
        <!-- Hola <strong><?php session_start(); echo $_SESSION['email']?></strong> -->
    </span>
    <ul>
        <li>
            <a href="<?php echo FRONT_ROOT ?>/Billboard">Billboard</a>
        </li>
        <li>
            <a href="<?php echo FRONT_ROOT ?>/Logout">Logout</a>
        </li>
        <li>
            <a class="nav-link" href="<?php echo FRONT_ROOT ?>/Cinema/ShowCinemaList">Cinema Listings</a>
        </li>
    </ul>
</nav>