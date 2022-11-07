
<?php require 'header.php'; ?>
          <header >
               <h1>PET HERO</h1>
          </header> 

          <style>
  .container2 {
    justify-content: center;
    text-align: center;
  }
</style>
          <form style="text-align: center;" action="<?php echo FRONT_ROOT."Home/login"?>" method="post">
              

               <p class="p-text" style="font-size: 30px;">Log in</p>
               <div class="container">
               <label for="email"></label> 
               <input type="email" placeholder="Enter email" name="email" id="email" required>
               <br>
               <br>
               <label for="password"></label>
               <input type="password" placeholder="Enter Password" name="password" required>
               <br>
               <br>
               <br>
               <button type="submit" class="large-button">Login</button>
               </div>

          </form>
          <div class="container2">
               <br>
               <form action="<?php echo FRONT_ROOT."Home/showRegisterView"?>">
                    <button type="submmit" class="large-button">Register</button>
               </form>
          </div>


<?php require 'footer.php'; ?>