<?php
    require 'dbcon.php';
?>
<div class="col-xl-11 col-lg-12" style="margin-left: 70px;" >
<div class="card shadow mb-8">
    <h3 style="margin-left: 50px; margin-top: 20px;">Member</h3>
    <h7 style="margin-left: 50px; margin-bottom: 20px;">Dashboard > Member information </h7>
</div>
</div>
<br>
<div class="col-xl-11 col-lg-12" style="margin-left: 70px;">

<div class="card shadow mb-8">

    <br>
    
    <h3 style="margin-left: 50px; margin-top: 20px;">Member Information</h3>
    
    <br>
    
    <br>
    <form method="POST" action="member/membercode.php" enctype="multipart/form-data"> 
    <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM qrcode WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
        <div class="row">
          <div class="col-xl-2 col-lg-4" style="margin-left: 10px;  margin-top: 100px;" >
            <div class="col g-6">
              <div class="p-4" style="width: 300px; margin-top: -100px;">
                  <div class="text-center">
                      <img id="preview" 
                           src="member/images/<?=$student['image_path1'];?>"
                           style="width: 250px;; height: 250px;;"
                           class="rounded rounded-circle" alt="placeholder">
                  </div>
                  <br>
                  <div class="col">
                    <div class="col g-6">
                    
                    <input type="file" name="editmember_uploadfile" id="editmember_uploadfile"  class="form-control" accept="image/*"
                           onchange="editPreview(this, 'image-preview')" >
                           <input type="hidden" class="form-control" id="editmember_uploadfile_old" name="editmember_uploadfile_old" value="<?=$student['image_path1'];?>">
                    </div>
                </div>
              </div>
          </div>
          </div>
          <div class="col-xl-8 col-lg-7" style="margin-left: 150px;" >
            <div class="row g-2">
            <input type="hidden" class="form-control" id="editmember_id" name="editmember_id" value="<?= $student['id']; ?>">
                    <div class="col">
                      <label for="editemployeefname" class="form-label">Full Name</label>
                      <input type="text" class="form-control" id="editmember_qrtext" name="editmember_qrtext" value="<?= $student['qrtext']; ?>">
                    </div>
                    <div class="col">
                      <label for="editemployeelname" class="form-label">Birthday</label>
                      <input type="date" class="form-control" id="editmember_birthday" name="editmember_birthday" value="<?= $student['birthday']; ?>">
                    </div>
                    </div>
                    <br>
                    <div class="row g-3">
                    <div class="col">
                        <label for="editemployeegender" class="form-label">Gender</label>
                        <select class="form-select" id="editmember_gender" name="editmember_gender">
                          <option selected><?= $student['gender']; ?></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div><div class="col">
                        <label for="editemployeegender" class="form-label">Role</label>
                        <select class="form-select" id="editmember_role" name="editmember_role">
                          <option selected><?= $student['role']; ?></option>  
                          <option value="Member">Member</option>
                          <option value="Pastor">Pastor</option>
                          <option value="Admin">Admin</option>
                        </select>
                      </div>
                    <div class="col-md-6">
                      <label for="editemployeelname" class="form-label">Address</label>
                      <input type="text" class="form-control" id="editmember_address" name="editmember_address" value="<?= $student['address']; ?>">
                    </div>
                    </div>
                    <br>
                    <div class="row g-2">
                    <div class="col">
                      <label for="editemployeefname" class="form-label">Email</label>
                      <input type="email" class="form-control" id="editmember_email" name="editmember_email" value="<?= $student['email']; ?>">
                    </div>
                    <div class="col">
                      <label for="editemployeelname" class="form-label">Contact</label>
                      <input type="number" class="form-control" id="editmember_contact" name="editmember_contact" value="<?= $student['contact']; ?>">
                    </div>
                    </div>
                    <br>
                    <div class="row g-2">
                    <div class="col">
                      <label for="editemployeefname" class="form-label">Emergency Contact Name</label>
                      <input type="text" class="form-control" id="editmember_ecname" name="editmember_ecname" value="<?= $student['ecname']; ?>">
                    </div>
                    <div class="col">
                      <label for="editemployeelname" class="form-label">Emergency Contact Phone</label>
                      <input type="number" class="form-control" id="editmember_eccontact" name="editmember_eccontact" value="<?= $student['eccontact']; ?>">
                    </div>
                    </div>
                    <br>
                    <div class="footer">
                    <a href="memberlayout.php">
                    <input type="button" name="back-btn" value="Back" class="btn btn-secondary" style="margin-left: 890px;"/>
                    </a>
                    <input type="submit" name="editmember_btn" value="Save" class="btn btn-primary" style="margin-left: 950px; margin-top: -65px;"/>
                    </div>
                    <br>
                    
    <br>
    <br>
                    
             </form>
             <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
</div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script>
  function editPreview(input, target) {
        let file = input.files[0];
        let reader = new FileReader();
        
        reader.readAsDataURL(file);
        reader.onload = function () {
            let img = document.getElementById(target);
            // can also use "this.result"
            img.src = reader.result;
        }
    }
  </script>