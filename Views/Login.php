<?php
     namespace Views;
  //include('Header.php');
  ?>
     <main class="">
          <div class="">
               <header class="">
                    <h2>Log In</h2>
               </header>
               <form action="LoginController.php" method="POST"  class="">
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