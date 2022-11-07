<?php include('header.php'); ?>


<div class="container">

  <p class="p-text">Indicate your pet</p>
  <form action="<?php echo FRONT_ROOT . "Booking/addPet" ?>" method="post">
    <input type="date" min="<?php getdate() ?>" id="Dates" name="dates" placeholder="Select days" multiple="true" />

    <br>
    <button type="submmit" class="large-button">add</button>
    <input type="reset">
  </form>
</div>




<?php include('footer.php'); ?>