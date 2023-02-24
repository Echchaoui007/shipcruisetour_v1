<?php require APPROOT . '/views/inc/header.php'; ?>










<button id="form-button" class="btn btn-primary">Show Form</button>

<form id="my-form" style="display: none;">
  <div class="form-group">
    <label for="input1">Input 1</label>
    <input type="text" class="form-control" id="input1" name="input1">
  </div>
  <div class="form-group">
    <label for="input2">Input 2</label>
    <input type="text" class="form-control" id="input2" name="input2">
  </div>
  <button type="submit" class="btn btn-secondary">Submit</button>
</form>

<script>
  var formButton = document.getElementById("form-button");
  var myForm = document.getElementById("my-form");
  
  formButton.addEventListener("click", function() {
    if (myForm.style.display === "none") {
      myForm.style.display = "block";
      formButton.innerHTML = "Hide Form";
    } else {
      myForm.style.display = "none";
      formButton.innerHTML = "Show Form";
    }
  });
</script>


<?php require APPROOT . '/views/inc/footer.php'; ?>