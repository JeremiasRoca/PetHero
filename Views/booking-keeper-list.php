<?php include('header.php'); ?>

<style>
  table,
  th,
  td {
    border: 1px solid black;
  }
</style>

<form action="<?php echo FRONT_ROOT . "Booking/showMyBookingListKeeper" ?>" method="GET">
  <h1>Your Bookings</h1>
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>idOwner</th>
        <th>idKeeper</th>
        <th>date</th>
        <th>state</th>
        <th>pets</th>
      </tr>
    </thead>

     <tbody>
      <?php foreach ($bookingList2 as $booking) {
         
        if (strval($_SESSION["loggedUser"]->getId()) ===$booking->getIdKeeper() ) {
            
      ?>
          <tr>
            <td class="first-td"> <?php echo $booking->getId()?></td>
            <td> <?php echo $booking->getIdOwner()?></td>
            <td> <?php echo $booking->getIdKeeper()?></td>
            <td> <?php echo $booking->getDate()?></td>
            <td> <?php echo $booking->getState()?></td>
            <td> <?php echo $booking->getPets()?></td>
            
          
          </tr>
      <?php  }
      };  ?>

    </tbody>
  </table>
</form>

<div class="container">
  <br>
  <a href="<?php echo FRONT_ROOT . 'Home/showHomeView' ?>"><button class="medium-button">Go Back</button></a>
</div>


<?php include('footer.php'); ?>