<?php include('header.php'); ?>

<style>
  table,
  th,
  td {
    border: 1px solid black;
  }
</style>

<form action="<?php echo FRONT_ROOT . "Booking/showMyBookingList" ?>" method="GET">
  <h1>Your Bookings</h1>
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>idOwner</th>
        <th>idKeeper</th>
        
        <th>state</th>
        <th>pets</th>
        <th>date</th>
      </tr>
    </thead>

     <tbody>
      <?php if(sizeof($bookingList)!=0){ 
      foreach ($bookingList as $booking) {
        if ($_SESSION["loggedUser"]->getId() === $booking->getIdOwner()) {
      ?>
          <tr>
            <td class="first-td"> <?php echo $booking->getId()?></td>
            <td> <?php echo $booking->getIdOwner()?></td>
            <td> <?php echo $booking->getIdKeeper()?></td>
           
            <td> <?php echo $booking->getState()?></td>
            <td> 
            <?php 
            if(sizeof($booking->getPets())!=0){
            foreach ($booking->getPets() as $pet) {
              echo $pet;
            } }?>
            </td>
            <td> <?php echo $booking->getDate()?></td>
            <td>
              <form action="<?php echo FRONT_ROOT . "Booking/updatePet" ?>" method="post">

                <input style="display: none;" type="number" name="id" id="id" value=<?php echo $booking->getId();?> >
                <input style="display: none;" type="text" name="state" id="state" value="transition">
                <button type="submmit" class="large-button">Add Pet</button>

              </form>
              </td>
          </tr>
        
          
      <?php  }
      }};  ?>

    </tbody>
  </table>
</form>

<div class="container">
  <br>
  <a href="<?php echo FRONT_ROOT . 'Home/showHomeView' ?>"><button class="medium-button">Go Back</button></a>
</div>


<?php include('footer.php'); ?>