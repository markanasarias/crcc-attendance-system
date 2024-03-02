<?php
require 'dbcon.php';
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="col-xl-11 col-lg-12" style="margin-left: 70px;" >
<div class="card shadow mb-8">
    <h3 style="margin-left: 50px; margin-top: 20px;">Pastor</h3>
    <h7 style="margin-left: 50px; margin-bottom: 20px;">Dashboard > Add new </h7>
</div>
</div>
<br>
<?php 
    if (isset($_SESSION['status']))
    {
    ?>
    <script>
        swal({
        title: "<?php echo $_SESSION['status']; ?>",
        text: "You clicked the button!",
        icon: "<?php echo $_SESSION['icon']; ?>",
        button: "Ok!",
});
    </script>   
       <?php
        unset($_SESSION['status']);
    }

?>
<div class="col-xl-11 col-lg-12" style="margin-left: 70px;">
<div class="card shadow mb-8">
<form method="POST" action="member/membercode.php" enctype="multipart/form-data" > 
    <br>
    <h3 style="margin-left: 50px; margin-top: 20px;">Pastors Form</h3>
    <br>
    <br>
        <div class="row">
          <div class="col-xl-2 col-lg-4" style="margin-left: 10px;  margin-top: 100px;" >
            <div class="col g-6">
              <div class="p-4" style="width: 300px; margin-top: -100px;">
                  <div class="text-center">
                      <img id="image-preview" 
                           src="https://via.placeholder.com/250"
                           style="width: 250px;; height: 250px;;"
                           class="rounded rounded-circle" alt="placeholder">
                  </div>
                  <br>
                  <div class="col">
                    <div class="col g-6">
                    <input type="file" name="uploadfile" class="form-control" accept="image/*"
                           onchange="updatePreview(this, 'image-preview')" required>
                    </div>
                </div>
              </div>
          </div>
          </div>
          <div class="col-xl-8 col-lg-7" style="margin-left: 150px;" >
            <div class="row g-2">
                    <div class="col">
                      <label for="editemployeefname" class="form-label">Full Name</label>
                      <input type="text" class="form-control" id="qrtext" name="qrtext" required>
                    </div>
                    <div class="col">
                      <label for="editemployeelname" class="form-label">Birthday</label>
                      <input type="date" class="form-control" id="birthday" name="birthday" required>
                    </div>
                    </div>
                    <br>
                    <div class="row g-3">
                    <div class="col">
                        <label for="editemployeegender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender" required>
                          <option selected>Choose...</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                      <div class="col">
                        <label for="editemployeegender" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" required>
                          <option value="Pastor">Pastor</option>
                        </select>
                      </div>
                    <div class="col-md-6">
                      <label for="editemployeelname" class="form-label">Address</label>
                      <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    </div>
                    <br>
                    <div class="row g-2">
                    <div class="col">
                      <label for="editemployeefname" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col">
                      <label for="editemployeelname" class="form-label">Contact</label>
                      <input type="number" class="form-control" id="contact" name="contact" required>
                    </div>
                    </div>
                    <br>
                    <div class="row g-2">
                    <div class="col">
                      <label for="editemployeefname" class="form-label">Emergency Contact Name</label>
                      <input type="text" class="form-control" id="ecname" name="ecname">
                    </div>
                    <div class="col">
                      <label for="editemployeelname" class="form-label">Emergency Contact Phone</label>
                      <input type="number" class="form-control" id="eccontact" name="eccontact" required>
                    </div>
                    </div>
                    <br>
                    <div class="footer">
                    <a href="memberlayout.php">
                    <input type="button" name="back-btn" value="Back" class="btn btn-secondary" style="margin-left: 890px;"/>
                    </a>
                    <input type="submit" name="pastor-btn" value="Save" class="btn btn-primary" style="margin-left: 950px; margin-top: -65px;"/>
                    </div>
                    <br>
                    
    <br>
</form>
</div>
</div>