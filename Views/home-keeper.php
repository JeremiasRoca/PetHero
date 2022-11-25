<?php include('header.php'); ?>


<div class="container">
  <h1> Before starting... </h1>
  <p class="p-text">Indicate Availability</p>
  <form action="<?php echo FRONT_ROOT . "Home/moreData" ?>" method="post">
    <input type="date" min="<?php getdate() ?>" id="Dates" name="dates" placeholder="Select days" multiple="true" />

    <br>

    <p class="p-text">Set your compensation</p>
    <input type="number" placeholder="Set your Fee" min="1" name="compensation" id="Compensation" required>
    <br>

    <p class="p-text">Select Type:</p>
    <br>
    <label for="Small">Small</label>
    <input type="radio" id="Small" name="size" value="Small" required>
    <label for="Medium">Medium</label>
    <input type="radio" id="Medium" name="size" value="Medium" required>
    <label for="owner">Big</label>
    <input type="radio" id="Big" name="size" value="Big" required>
    <br>

    <button type="submmit" class="large-button">add</button>
    <input type="reset">
  </form>
</div>




<?php include('footer.php'); ?>