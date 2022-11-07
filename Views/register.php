<?php require 'header.php'; ?>


<form action="<?php echo FRONT_ROOT."Home/register"?>" method="post">
  <div class="container">
    <h1>Register User</h1>

    <label for="email"><b></b></label>
    <input type="email" placeholder="Enter Email" name="email" id="email" required>
    <br>
    <label for="firstname"><b></b></label>
    <input type="text" placeholder="Enter your firstname" name="firstname" id="firstname" required>
    <br>
    <label for="lastname"><b></b></label>
    <input type="text" placeholder="Enter your lastname" name="lastname" id="lastname" required>
    <br>
    <label for="password"><b></b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>
    <br>
    <label for="password-repeat"><b></b></label>
    <input type="password" placeholder="Repeat Password" name="repeatPassword" id="repeatPassword" required>
    <hr>
    <label for="userName"><b></b></label>
    <input type="text" placeholder="Set your username" name="userName" id="UserName" required>
    <br>
    <br>
    <br>
    <p class="p-text"> User type?</p>
    <br>
    <input type="radio" name="userType" id="owner" value="owner" required > <p class="p-text">Owner</p>  
    <input type="radio" name="userType" id="keeper" value="keeper" required> <p class="p-text" >Keeper</p>  
    <br>
    <br>

 

    <button type="submit" class="large-button">Register</button>
  </div>
  
  <div class="container signin">
    <p class="p-text"> <a href="<?php echo FRONT_ROOT.'Home/index'?>">Sign in</a>.</p>
  </div>
</form>




<?php require 'footer.php'; ?>