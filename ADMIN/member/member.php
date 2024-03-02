<?php
require 'dbcon.php';
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="col-xl-11 col-lg-12" style="margin-left: 70px;" >
<div class="card shadow mb-8">
    <h3 style="margin-left: 50px; margin-top: 20px;">Member</h3>
    <h7 style="margin-left: 50px; margin-bottom: 20px;">Dashboard > Member Table </h7>
</div>
</div>
<br>
<!-- Table -->
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
<div class="card shadow mb-4" id="tablecard">
    <div class="card-header py-3">
    <a href="memberaddlayout.php"><button type="button" class="btn btn-primary">+ Add New</button></a>
    </div>
    <div class="card-body">
        <div class="table-responsive"  id="table-responsive-id">
            <table class="table table-striped" id="dataTablemembers">
            <colgroup>
            <col width="15%">
	        <col width="8%">
            <col width="8%">
            <col width="8%">
            <col width="10%">
	        <col width="10%">
            <col width="20%">
            <col width="8%">
            <col width="8%">
            </colgroup>
                <thead>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
    <?php 
    $query = "SELECT * FROM qrcode";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0) {
        foreach($query_run as $student) {
            $allowedRoles = ['Member', 'Admin'];
            if (in_array($student['role'], $allowedRoles)) {
                $birthDate = $student['birthday'];
                $currentDate = date('Y-m-d');
                $age = date_diff(date_create($birthDate), date_create($currentDate))->y;
                ?>
                <tr>
                    <td><?= $student['qrtext']; ?></td>
                    <td><?= $student['birthday']; ?></td>
                    <td><?= $age; ?></td>
                    <td><?= $student['gender']; ?></td>
                    <td><?= $student['address']; ?></td>
                    <td><?= $student['contact']; ?></td>
                    <td><?= $student['email']; ?></td>
                    <td><?= ($student['status'] == 0) ? "Active" : "Inactive"; ?></td>
                    
                    <td>
                        <a href="membereditlayout.php?id=<?= $student['id']; ?>">
                            <button id="member-edit-btn" class="btn text-primary" name="member-edit-btn"><i class="fas fa-fw fa-pen"></i></button>
                        </a>
                        <a href="memberidlayout.php?id=<?= $student['id']; ?>">
                            <button id="edit-btn" class="btn text-primary" name="member-id-btn"><i class="fas fa-fw fa-id-card"></i></button>
                        </a>       
                    </td>
                </tr>
            <?php
            }
        }
    } else {
        echo "<h5> No Record Found </h5>";
    }
    ?>
</tbody>

            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
  function updatePreview(input, target) {
        let file = input.files[0];
        let reader = new FileReader();
        
        reader.readAsDataURL(file);
        reader.onload = function () {
            let img = document.getElementById(target);
            // can also use "this.result"
            img.src = reader.result;
        }
    }


      $(document).ready(function() {
      new DataTable('#dataTablemembers');
        });

        
  </script>



