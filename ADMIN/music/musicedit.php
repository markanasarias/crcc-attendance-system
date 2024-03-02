<?php
    require 'dbcon.php';
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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
<div class="col-xl-11 col-lg-12" style="margin-left: 70px;" >
<div class="card shadow mb-8">
    <h3 style="margin-left: 50px; margin-top: 20px;">Music Team</h3>
    <h7 style="margin-left: 50px; margin-bottom: 20px;">Dashboard > Music Team Table </h7>
</div>
</div>
<br>
<div class="row">
<div class="col-lg-3 mb-4" style="margin-left: 85px; width: 500px;">
<div class="card shadow mb-4"style="height; 1500px">
    <h3 style="margin-left: 50px; margin-top: 20px;">Edit</h3>
    <br>
<form action="music/musiccode.php" method="POST" style="padding-left: 50px; padding-right: 50px;">
<?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM music WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
    <div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">Name</label>
    <input type="hidden" class="form-control" id="id" name="id"  value="<?= $student['id']; ?>" >
  <input type="text" class="form-control" id="name" name="name" disabled value="<?= $student['name']; ?>">
    </div>

    <div class="mb-3">
        <label for="editemployeegender" class="form-label">Music Team Role</label>
        <select class="form-select" id="role" name="role" required>
        <option selected><?= $student['role']; ?></option>
            <option value="Vocalist">Vocalist</option>
            <option value="Guitarist">Guitarist</option>
            <option value="Drummer">Drummer</option>
            <option value="Pianist">Pianist</option>
        </select>
    </div>
    <br>

    <input type="submit" name="editmusicbtnsave" value="Save" class="btn btn-primary" style="margin-left: 315px;"/>
</form>
<?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
    <br>
    <br>
</div>
</div>
<!-- Table -->
<div class="col-lg-6 mb-6" style="width: 1100px;">
<div class="card shadow mb-4" style="margin-right: 55px;">
    <div class="card-body" >
        <div class="table-responsive"  id="table-responsive-id">
            <table class="table table-striped" id="dataTableevent" name="dataTableevent" >
                <thead>
                  <center>
                <th>Name</th>
                <th>Music Team Role</th>
                </center>
                </thead>
                <tbody >

                <?php 
                    $query = "SELECT * FROM music";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0) {
                        foreach($query_run as $student) {
                    ?>
                    <tr>
                        <td><?= $student['name']; ?></td>
                        <td><?= $student['role']; ?></td>
                    </tr>
                    <?php
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
</div>
</div>


<script>

$(document).ready(function() {
      new DataTable('#dataTableevent');
        });


        function sendMessage(date, title) {
            console.log("Date: " + date);
            console.log("Title: " + title);

            // Create an object to hold the data
            const data = {
                title: title,
                date: date,
                numbers: [],
                userNames:[]
            };

            // Use PHP to fetch data from the database
            <?php
            $query = "SELECT qrtext, contact FROM qrcode";
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
                while ($qrData = mysqli_fetch_assoc($query_run)) {
                    ?>
                    data.numbers.push("<?php echo $qrData['contact']; ?>");
                    data.userNames.push("<?php echo $qrData['qrtext']; ?>");
                    <?php
                }
            }
            ?>

    console.log(data);

            fetch("./event/send_message.php", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data) // Send the data as JSON
            })
            .then((response) => response.text())
            .then((data) => {
                // Handle the response from your PHP script here
                swal({
                title: "Send Invatation Successfuly",
                text: "You clicked the button!",
                icon: "success",
                button: "Ok!",
                    }); 
                console.log(data);
                //Maybe add success message
            })
            .catch((error) => { 
                swal({
                title: "Send Invatation Failed",
                text: "You clicked the button!",
                icon: "warning",
                button: "Ok!",
                    }); 

                console.error(error);

                //Add your error message
            });
        }

</script>

