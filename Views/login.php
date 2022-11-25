<?php require 'header.php'; ?>
<header>
     <h1 style="font-size: 25;">PET HERO</h1>
</header>
<?php if ($message) {
     echo '<script>alert("' . $message . '")</script>';
} ?>
<style>
     .container2 {
          justify-content: center;
          text-align: center;
     }
</style>
<form style="text-align: center;" action="<?php echo FRONT_ROOT . "Home/login" ?>" method="post">


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
          <button style="  background-color: white;border: none;color: black;padding: 5px 12px;text-align: center;text-decoration: none;display: inline-block; font-size: 12px;border: 1px solid #000;border-radius: 25% 10%;" type="submit" class="large-button">Login</button>
     </div>

</form>
<div class="container2">
     <br>
     <form action="<?php echo FRONT_ROOT . "Home/showRegisterView" ?>">
          <button style="  background-color: white;border: none;color: black;padding: 5px 12px;text-align: center;text-decoration: none;display: inline-block; font-size: 12px;border: 1px solid #000;border-radius: 25% 10%;" type="submmit" class="large-button">Register</button>
     </form>
</div>


<?php require 'footer.php'; ?>