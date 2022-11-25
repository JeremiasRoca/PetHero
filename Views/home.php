<?php include('header.php'); ?>

<div class="">
  <h1> <a href="<?php echo FRONT_ROOT . 'Home/showHomeView' ?>"> WELCOME TO <br> PET HERO </a></h1>
</div>

<style>
  .container {
    justify-content: center;
  }
</style>
<div class="container">
  <form action="<?php echo FRONT_ROOT . "Pet/showMyPetList" ?>">
    <button type="submmit" class="large-button">Pet list</button>
  </form>
</div>

<div class="container">
  <form action="<?php echo FRONT_ROOT . "Home/showKeeperList" ?>">
    <button type="submmit" class="large-button">Show Keepers</button>
  </form>
</div>

<div class="container">
  <form action="<?php echo FRONT_ROOT . "Home/addPet" ?>">
    <button type="submmit" class="large-button">Add Pet</button>
  </form>
</div>


<div class="container">
  <p class="p-text">Set you availabilities</p>
  <form action="<?php echo FRONT_ROOT . "Home/showPetList" ?>">
    <button type="submmit" class="large-button">Indicate Availability</button>
  </form>
</div>

<div class="container">
  <p class="p-text">Set pets you are willing to take care</p>
  <form action="<?php echo FRONT_ROOT . "Home/showPetList" ?>">
    <button type="submmit" class="large-button">Set Preferences</button>
  </form>
</div>


<div class="container">
  <p class="p-text">Log Out</p>
  <form action="<?php echo FRONT_ROOT . "Home/logout" ?>">
    <button type="submmit" class="large-button">Log Out</button>
  </form>
</div>


<?php include('footer.php'); ?>