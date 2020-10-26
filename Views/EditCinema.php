<?php
    namespace Views;
    include('Header.php');
    include('Nav.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Edit Cinema</title>
</head>
<body>
     <section  class="">
         <div class="cont-form">
              <h2 class="form-title">Edit Cinema</h2>
                   <form  class="form" action="<?php echo FRONT_ROOT ?>Cinema/EditCinema" method="POST" class="">
                    <div>
                         <div>
                              <label class ="form-label" for="name">Name</label>
                              <input class="form-input" type="Text" name="name" value="" class="">
                         </div>
                         <div>
                              <label class ="form-label" for="capacity">Capacity</label>
                              <input class="form-input" type="number" name="capacity" value="" class="">
                         </div>
                    </div>
                    <div>
                         <div>
                              <label class ="form-label" for="adress">Adress</label>
                              <input class="form-input" type="Text" name="adress" value="" class="">
                         </div>
                         <div>
                              <label class ="form-label" for="ticketPrice">Ticket Price</label>
                              <input class="form-input" type="number" name="ticketPrice" value="" class="">
                         </div>
                    </div>
                    <div>
                         <button type="submit" class="btn-submit">Save Changes</button>
                    </div>
               </form>
          </div>
     </section>

<?php if(isset($message))
                    {
                         echo $message;
                    }
                    ?>
</body>
</html>
<?php include('Footer.php') ?> 