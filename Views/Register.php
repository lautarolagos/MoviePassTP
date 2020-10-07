<?php
     namespace Views;
     //include('header.php');
  ?>
     <main class="">
          <div class="">
               <header class="">
                    <h2>Register</h2>
               </header>
               <form action="<?php echo FRONT_ROOT ?>/Register/Add" method="POST" class="">
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