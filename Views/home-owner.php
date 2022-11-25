<?php include('header.php'); ?>
<!-- <?php include('nav-bar.php');
        $user = $_SESSION["loggedUser"];
        ?> -->
<style>


</style>

<div class="">
    <h1> Hello <?php echo $_SESSION["loggedUser"]->getUserName(); ?>!! </h1>
</div>


<!-- PARA USUARIO OWNER -->
<div class="container">
    <form action="<?php echo FRONT_ROOT . "Pet/showMyPetList" ?>">
        <button style="  background-color: white;border: none;color: black;padding: 5px 12px;text-align: center;text-decoration: none;display: inline-block; font-size: 12px;border: 1px solid #000;border-radius: 25% 10%;" type="submmit" class="large-button">Pet list</button>
    </form>
</div>

<div style="margin-top:10px" class="container">
    <form action="<?php echo FRONT_ROOT . "Home/showKeeperList" ?>">
        <button style="  background-color: white;border: none;color: black;padding: 5px 12px;text-align: center;text-decoration: none;display: inline-block; font-size: 12px;border: 1px solid #000;border-radius: 25% 10%;" type="submmit" class="large-button">Show Keepers</button>
    </form>
</div>

<div style="margin-top:10px" class="container">
    <form action="<?php echo FRONT_ROOT . "Pet/showAddPet" ?>">
        <button style="  background-color: white;border: none;color: black;padding: 5px 12px;text-align: center;text-decoration: none;display: inline-block; font-size: 12px;border: 1px solid #000;border-radius: 25% 10%;" type="submmit" class="large-button">Add Pet</button>
    </form>
</div>

<div style="margin-top:10px" class="container">
    <form action="<?php echo FRONT_ROOT . "Booking/showMyBookingList" ?>">
        <button style="  background-color: white;border: none;color: black;padding: 5px 12px;text-align: center;text-decoration: none;display: inline-block; font-size: 12px;border: 1px solid #000;border-radius: 25% 10%;" type="submmit" class="large-button">Booking list</button>
    </form>
</div>


<div style="margin-top:10px" class="container">
    <br>
    <form action="<?php echo FRONT_ROOT . "Home/logout" ?>" method="post">
        <button style="  background-color: white;border: none;color: black;padding: 5px 12px;text-align: center;text-decoration: none;display: inline-block; font-size: 12px;border: 1px solid #000;border-radius: 25% 10%;" type="submmit" class="large-button">Log Out</button>
    </form>
</div>