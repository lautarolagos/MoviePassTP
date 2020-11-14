<?php 
  include("Nav.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile - MoviePass</title>
      <!-- Custom styles for this template -->
      <link href="<?php echo CSS_PATH ?>profile.css" rel="stylesheet">
</head>
<body>

<div class="page-content page-container" id="page-content">
    <div class="padding">
                <div class="card user-card-full" style="margin-right: 40rem;margin-top: 6rem;margin-left: 40rem;">
                    <div class="row m-l-0 m-r-0">
                        <div class="bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <i class="far fa-user fa-7x"></i> </div>
                                <h6 class="f-w-600"><?php echo $_SESSION['userLogedIn']->getFirstName(); echo " " .$_SESSION['userLogedIn']->getLastName();?></h6>
                                <p><?php  if($_SESSION['userLogedIn']->getIsAdmin()=='1'){ echo "Admin"; } else{ echo "Client"; } ?></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">My Profile</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400"><?php echo $_SESSION['userLogedIn']->getEmail();?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">City</p>
                                        <h6 class="text-muted f-w-400"><?php echo $_SESSION['userLogedIn']->getCity(); ?></h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6>
                                <div class="row">
                                    <form action="<?php echo FRONT_ROOT ?>User/ShowPurchases" method="POST">
                                    <div id="buttons">
                                    <button class="btnPurchases" style="margin-left: 20px;padding-bottom: 10px;padding-top: 10px;margin-top: 18px;">View Purchases</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>