<?php include('header.php'); ?>


<div class="container">

  <p class="p-text">Indicate your pet</p>
  <form action="<?php echo FRONT_ROOT . "Booking/addPetBooking" ?>" method="post">
    <select id="id" name="id">

      <?php 
      foreach ($petList as $pet) { ?>

        <option value="<?php echo $pet->getId(); ?>"><?php echo $pet->getName(); ?></option>

      <?php }; ?>
    </select>

    <br>
    <button type="submmit" class="large-button">add</button>
    <input type="reset">
  </form>
</div>




<?php include('footer.php'); ?>