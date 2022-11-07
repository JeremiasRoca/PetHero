<?php  include('header.php'); ?>
<!-- <?php  include('nav-bar.php'); 
$user=$_SESSION["loggedUser"];
?> -->

  <div class="">
      <h1> Hello <?php echo $_SESSION["loggedUser"]->getUserName(); ?>!! </h1>
  </div>


<!-- PARA USUARIO OWNER -->
  <div class="container">
      <form action="<?php echo FRONT_ROOT."Pet/showMyPetList"?>">    <!-- cambiar el CONTROLLER -->
          <button type="submmit" class="large-button">Pet list</button>
      </form>
  </div>

  <div class="container">
      <form action="<?php echo FRONT_ROOT."Home/showKeeperList"?>"> <!-- cambiar el CONTROLLER -->
          <button type="submmit" class="large-button">Show Keepers</button>
      </form>
  </div>

  <div class="container">
      <form action="<?php echo FRONT_ROOT."Pet/showAddPet"?>"> <!-- cambiar el CONTROLLER -->
          <button type="submmit" class="large-button">Add Pet</button>
      </form>
  </div>



  <div class="container">
 <br>
      <form action="<?php echo FRONT_ROOT."Home/logout"?>" method="post"> 
          <button type="submmit" class="large-button">Log Out</button>
      </form>
  </div>





