<?php
     namespace Views;
     //require_once("Nav.php");
  ?>
     <main class="">
          <div class="">
               <header class="">
                    <h2>Register</h2>
               </header>
               <form action="<?php echo FRONT_ROOT ?>/Register/AddClient" method="POST" class="">
                    <div class="">
                         <label for="email">Email</label>
                         <input type="email" name="email" class="" placeholder="Email" required>
                    </div>
                    <div class="">
                         <label for="password">Password</label>
                         <input type="password" name="password" class="" placeholder="Password" required>
                    </div>
                    <button class="" type="submit">Create New Acount</button>
               </form>
          </div>
     </main>

<?php
// include('Footer.php')
?>