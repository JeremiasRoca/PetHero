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
        <th>state</th>
        <th>pets</th>
        <th>date</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($bookingList2 as $booking) {

      ?>
        <tr>
          <td class="first-td"> <?php echo $booking->getId() ?></td>
          <td> <?php echo $booking->getIdOwner() ?></td>
          <td> <?php echo $booking->getIdKeeper() ?></td>
          <?php
          if ($booking->getState() == "accepted") {
          ?>
            <td style="color: green"> <?php echo $booking->getState() ?></td>
          <?php
          } else if ($booking->getState() == "refused") {
          ?> <td style="color: red"> <?php echo $booking->getState() ?></td>
          <?php
          } else {
          ?>
            <td> <?php echo $booking->getState() ?></td>
          <?php
          }
          ?>

          <td>
            <?php foreach ($booking->getPets() as $pet) {
              echo "[" . $pet . "]";
            } ?>
          </td>
          <td> <?php echo $booking->getDate() ?></td>

        </tr>
      <?php
      };  ?>
    <tbody>
  </table>

</form>




<?php include('footer.php'); ?>