<?php include('header.php'); ?>
<!-- <?php include('nav-bar.php');
      $user = $_SESSION["loggedUser"];
      ?> -->

<div class="">
  <h1> Hello <?php echo $_SESSION["loggedUser"]->getUserName(); ?>!! </h1>
</div>


<!-- PARA USUARIO keeper -->

<div class="container">
  <form action="<?php echo FRONT_ROOT . "Keeper/showAddAvilability" ?>">
    <button style="  background-color: white;border: none;color: black;padding: 5px 12px;text-align: center;text-decoration: none;display: inline-block; font-size: 12px;border: 1px solid #000;border-radius: 25% 10%;" type="submmit" class="large-button">add Avilability</button>
  </form>
</div>

<div style="margin-top:10px" class="container">
  <form action="<?php echo FRONT_ROOT . "Booking/showMyBookingListKeeper" ?>">
    <button style="  background-color: white;border: none;color: black;padding: 5px 12px;text-align: center;text-decoration: none;display: inline-block; font-size: 12px;border: 1px solid #000;border-radius: 25% 10%;" type="submmit" class="large-button">Pending Bookings</button>
  </form>
</div>
<div style="margin-top:10px" class="container">
  <form action="<?php echo FRONT_ROOT . "Booking/showMyBookingListKeeperAll" ?>">
    <button style="  background-color: white;border: none;color: black;padding: 5px 12px;text-align: center;text-decoration: none;display: inline-block; font-size: 12px;border: 1px solid #000;border-radius: 25% 10%;" type="submmit" class="large-button">My Bookings</button>
  </form>
</div>
<div style="margin-top:10px" class="container">
  <form action="<?php echo FRONT_ROOT . "Home/showOwnerList" ?>">
    <button style="  background-color: white;border: none;color: black;padding: 5px 12px;text-align: center;text-decoration: none;display: inline-block; font-size: 12px;border: 1px solid #000;border-radius: 25% 10%;" type="submmit" class="large-button">My Chats</button>
  </form>
</div>


<div class="container">
  <br>
  <form action="<?php echo FRONT_ROOT . "Home/logout" ?>" method="post">
    <button style="  background-color: white;border: none;color: black;padding: 5px 12px;text-align: center;text-decoration: none;display: inline-block; font-size: 12px;border: 1px solid #000;border-radius: 25% 10%;" type="submmit" class="large-button">Log Out</button>
  </form>
</div>