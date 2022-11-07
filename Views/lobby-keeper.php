<?php  include('header.php'); ?>
<!-- <?php  include('nav-bar.php'); 
$user=$_SESSION["loggedUser"];
?> -->

  <div class="">
      <h1> Hello <?php echo $_SESSION["loggedUser"]->getUserName(); ?>!! </h1>
  </div>


<!-- PARA USUARIO keeper -->

<h1>hello keeper</h1>
<div class="container">
      <form action="<?php echo FRONT_ROOT."Keeper/showAddAvilability"?>"> <!-- cambiar el CONTROLLER -->
          <button type="submmit" class="large-button">add Avilability</button>
      </form>
  </div>

  <div class="container">
      <form action="<?php echo FRONT_ROOT."Booking/showMyBookingListKeeper"?>">    <!-- cambiar el CONTROLLER -->
          <button type="submmit" class="large-button">My Bookings</button>
      </form>
  </div>


  <div class="container">
 <br>
      <form action="<?php echo FRONT_ROOT."Home/logout"?>" method="post"> 
          <button type="submmit" class="large-button">Log Out</button>
      </form>
  </div>