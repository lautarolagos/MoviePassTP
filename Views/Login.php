<?php
     namespace Views;
     include('Header.php');
  // Aca hay algun error, si pones datos en el Login y le das a iniciar sesion, registra el usuario, quizas es porque falta hacer el login
  ?>
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
          </div>
          <?php
               if(isset($message))
                {
                     echo $message;
                }
          ?>
     </main>