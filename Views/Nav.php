<?php
    namespace Views;
    include_once('Header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body id="menu">
    <header>
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"> <img src="boton-nav.png" alt=""></label>
            <nav class="menu">
                <ul>
                    <li style="background-color: red;">
                        <?php if(isset($_SESSION['userLogedIn'])){?>
                        <a>Welcome, <strong><?php echo $_SESSION['userLogedIn']->getFirstName();?>!</strong></a> <?php  } else { ?>
                        <a>Welcome, <strong> guest! </strong></a> <?php } ?>
                    </li>
                    <li>
                        <a href="<?php echo FRONT_ROOT ?>Session/ShowHomePage"><i class="fas fa-home"></i> Home </a>
                    </li>
                    <?php if(!isset($_SESSION['userLogedIn'])){?>
                    <li>
                        <a href="<?php echo FRONT_ROOT ?>Session/ShowLoginView"><i class="fas fa-sign-in-alt"></i> Sign In </a>
                    </li>
                    <?php }?>
                    <?php if(isset($_SESSION['userLogedIn'])){?>
                    <li>
                        <a href="<?php echo FRONT_ROOT ?>Session/ShowProfile"><i class="far fa-user"></i> Profile </a>
                    </li>
                    <?php }?>
                    <li>
                        <a href="<?php echo FRONT_ROOT ?>Billboard/LoadProjections"><i class="fas fa-film"></i> Billboard </a>
                    </li>
                    <?php if((isset($_SESSION['userLogedIn'])) && $_SESSION['userLogedIn']->getIsAdmin()=="1") {
                    ?>
                    <li>
                        <a href="<?php echo FRONT_ROOT ?>Cinema/ShowAddView"><i class="fas fa-plus"></i> Add Cinema </a>
                    </li>
                    <?php 
                    }
                    ?>
                    <li>
                        <a href="<?php echo FRONT_ROOT ?>Cinema/ShowCinemaList"> <i class="fas fa-video"></i> Cinemas</a>
                    </li>
                    <?php if(isset($_SESSION['userLogedIn'])){?>
                    <li>
                        <a href="<?php echo FRONT_ROOT ?>Session/Logout"><i class="fas fa-sign-out-alt"></i> Logout </a>
                    </li>
                    <?php }?>
                </ul>
            </nav>
    </header>
</body>
</html>