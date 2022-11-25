<?php require 'header.php'; ?>


<form action="<?php echo FRONT_ROOT . "Pet/uploadFile" ?>" method="post" enctype="multipart/form-data">
  <div class="container">
    <h1>More info Pet</h1>
    <br>
    <br>
    <label for="photo"><b class="p-text">Photo of your pet</b></label>
    <input type="file" placeholder="Photo of your pet" name="photo" id="Photo" accept=".jpeg,.jpg,.pdf,.gif,.png,.jfif" required>
    <br>
    <br>
    <label for="vaxPlanImg"><b class="p-text">Vaccination plan of your pet</b></label>
    <input type="file" placeholder="vaccination plan" name="vaxPlanImg" id="VaxPlanImg" accept=".jpeg,.jpg,.pdf,.gif,.png,.jfif" required>
    <br>
    <br>
    <label for="video"><b class="p-text">Video of your pet</b></label>
    <input type="file" placeholder="Video of your pet" name="video" id="Video">
    <br>
    <hr>
    <br>
    <br>
    <button type="submit" value="submit" class="large-button">Add Pet</button>
  </div>
</form>


<?php require 'footer.php'; ?>