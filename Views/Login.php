<?php
     namespace Views;
     include('Header.php');
  ?>
<html>
     <main class="">
          <div class="">
               <header class="">
                    <h2>Log In</h2>
               </header>
               <form action="<?php echo FRONT_ROOT ?>/Login/Check" method="POST"  class="">
                    <div class="">
                         <label for="email">Email</label>
                         <input type="text" name="email" class="" placeholder="Email">
                    </div>
                    <div class="">
                         <label for="password">Password</label>
                         <input type="password" name="password" class="" placeholder="Password">
                    </div>
                    <button class="" type="submit">Log In</button>
               </form>
               <!-- lo de abajo no anda bien, cuidado -->
               <form action="<?php echo VIEWS_PATH ?>Register.php" method="POST" class="">
               <button class="" type="submit">Register</button>
               </form>
          </div>
     </main>
     <?php if(isset($message))
                    {
                         echo $message;
                    }
                    ?>
</html>