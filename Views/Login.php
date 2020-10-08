<?php
     namespace Views;
  //include('Header.php');
  ?>
     <main class="">
          <div class="">
               <header class="">
                    <h2>Log In</h2>
               </header>
<<<<<<< HEAD
               <form action="<?php echo FRONT_ROOT ?>/Login/Check" method="POST"  class="">
=======
               <form action="LoginController.php" method="POST"  class="">
>>>>>>> 53b7736510a34aa2198212057f441c86d89919aa
                    <div class="">
                         <label for="email">Email</label>
                         <input type="text" name="email" class="" placeholder="Email">
                    </div>
                    <div class="">
                         <label for="password">Password</label>
                         <input type="password" name="password" class="" placeholder="Password">
                    </div>
                    <button class="" type="submit">Log In</button>
                    <button class="" href="Register.php">Create New Acount</button>
               </form>
          </div>
     </main>

<?php
 //include('footer.php')
?>