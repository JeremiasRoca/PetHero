<?php include('header.php'); ?>

<style>
  table,
  th,
  td {
    border: 1px solid black;
  }
</style>

<form action="<?php echo FRONT_ROOT . "Home/showKeeperList" ?>" method="get">
  <h1>List of Keepers registered</h1>
  <table class="table">
    <thead>
      <tr>
        <th style="width: 15%;">Username</th>
        <th style="width: 30%;">FirstName - lastname</th>
        <th style="width: 30%;">Compensation</th>
        <th style="width: 15%;">Size Accepted</th>
        <th style="width: 10%;">Availability</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($keeperList as $keeper) { ?>
        <tr>
          <td class="first-td"><?php echo $keeper->getUsername(); ?></td>
          <td><?php echo $keeper->getFirstname() . ' ' . $keeper->getLastname(); ?></td>
          <td><?php echo '$' . $keeper->getCompensation(); ?></td>
          <td><?php echo $keeper->getPetType(); ?></td>
          <!-- aca agregar un "reservar" al lado de la fecha, para tener referencia de la fecha a reservar-->
          <td><?php foreach ($keeper->getAvailabilityList() as $date) {
              ?>

              <form style="" action="<?php echo FRONT_ROOT . "Booking/registerBooking" ?>" method="post">

                <input style="display: none;" type="text" name="idKeeper" id="idKeeper" value=<?php echo $keeper->getId();      ?>>
                <input style="display: none;" type="date" name="date" id="date" value=<?php echo $date;      ?>>
                <?php echo $date . '<br>';      ?>

                <!-- cambiar el CONTROLLER -->
                <button type="submmit" class="large-button">Add Booking</button>


              </form>


            <?php
              } ?>
          </td>
          <td>
            <form style="" action="<?php echo FRONT_ROOT . "Message/IndexMessage" ?>" method="post">

              <input style="display: none;" type="text" name="idKeeper" id="idKeeper" value=<?php echo $keeper->getId(); ?>>

              <button type="submmit" class="large-button">Chat with <?php echo $keeper->getFirstname();      ?></button>


            </form>
          </td>
        </tr>
      <?php }; ?>

    </tbody>
  </table>
</form>



<?php include('footer.php'); ?>