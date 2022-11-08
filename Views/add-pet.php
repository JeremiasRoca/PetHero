<?php require 'header.php'; ?>


<form action="<?php echo FRONT_ROOT."Pet/registerPet"?>" method="post" enctype="multipart/form-data">
  <div class="container">
    <h1>Register Pet</h1>  
    <br>
    <label for="petClass" class="p-text">Pet Class</label>
     <br>
        <select class="select"   name="petClass" id="type" required>
            <optgroup label="Class" >
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
            </optgroup>
        </select> 
    <br>
    <br>  
    <label for="name"><b></b></label>
    <input type="text" placeholder="Enter name" name="name" id="Name" required>
    <br>
    <br>
    <label for="breed"><b></b></label>
    <input type="text" placeholder="Enter the breed" name="breed" id="Breed" required>
    <br>
    <br>
    <label for="role" class="p-text">Size</label>
     <br>
        <select class="select"   name="size" id="role" required>
            <optgroup label="Size" >
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="big">Big</option>
            </optgroup>
        </select> 
    <br>
    <label for="observation"></label> <br>
    <textarea name="observation" maxlength="1000" placeholder="observations" id="observation" cols="30" rows="10"></textarea> 
    <br> 
    <br>
    <br>
    <button type="submit" value="submit"  class="large-button">Add Pet</button>
  </div>
</form>

<div class="container">
    <br>
    <a  href="<?php echo FRONT_ROOT.'Home/showHomeView'?>"><button class="medium-button">Go Back</button></a>
  </div>


<?php require 'footer.php'; ?>