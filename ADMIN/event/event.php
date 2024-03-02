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
    <h3 style="margin-left: 50px; margin-top: 20px;">Event</h3>
    <h7 style="margin-left: 50px; margin-bottom: 20px;">Dashboard > Event Table </h7>
</div>
</div>
<br>
<div class="row">
<div class="col-lg-3 mb-4" style="margin-left: 85px; width: 500px;">
<div class="card shadow mb-4"style="height; 1500px">
    <h3 style="margin-left: 50px; margin-top: 20px;">Create Event</h3>
    <br>
    <form action="event/eventcode.php" method="POST" style="padding-left: 50px; padding-right: 50px;">
      <div class="mb-2">
     <label for="formGroupExampleInput" class="form-label">Date</label>
        <input type="datetime-local" class="form-control" id="date" name="date" required>
    </div>
    <div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Title</label>
  <input type="text" class="form-control" id="title" name="title" required>
  </div>
  <div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Description</label>
  <input type="text" class="form-control" id="description" name="description" required>
  </div>
  <br>

  <input type="submit" name="eventbtnsave" value="Save" class="btn btn-primary" style="margin-left: 315px;"/>
    </form>
    <br>
    <br>
</div>
</div>
<!-- Table -->
<div class="col-lg-6 mb-6" style="width: 1100px;">
<div class="card shadow mb-4" style="margin-right: 55px;">
<div class="card-header py-3">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Upcoming Event</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">All Event</button>
  </li>
</ul>
    </div>
    <div class="card-body" >
    <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="table-responsive"  id="table-responsive-id">
            <table class="table table-striped" id="dataTableevent" name="dataTableevent" >
                <thead>
                  <center>
                <th>Date</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
                </center>
                </thead>
                <tbody >

                <?php 
                    $query = "SELECT * FROM event where date(start_datetime) >= '".date("Y-m-d")."' order by date(start_datetime) asc ";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0) {
                        foreach($query_run as $student) {
                    ?>
                    <tr>
                        <td><?= $student['start_datetime']; ?></td>
                        <td><?= $student['title']; ?></td>
                        <td><?= $student['description']; ?></td>
                        <td>
                        <a href="eventeditlayout.php?id=<?= $student['id']; ?>">
                            <button id="event-edit-btn" class="btn text-primary" name="member-edit-btn"><i class="fas fa-fw fa-pen"></i></button>
                        </a>
                        <button class="btn text-primary send-message-btn" onclick="sendMessage('<?= $student['start_datetime']; ?>', '<?= $student['title']; ?>')">
                        <i class="fas fa-fw fa-comment"></i>
                    </button>
                        </td>
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
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <div class="table-responsive"  id="table-responsive-id">
            <table class="table table-striped" id="dataTableallevent" name="dataTableallevent" >
                <thead>
                  <center>
                <th>Date</th>
                <th>Title</th>
                <th>Description</th>
                </center>
                </thead>
                <tbody >

                <?php 
                    $query = "SELECT * FROM event";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0) {
                        foreach($query_run as $student) {
                    ?>
                    <tr>
                        <td><?= $student['start_datetime']; ?></td>
                        <td><?= $student['title']; ?></td>
                        <td><?= $student['description']; ?></td>
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
</div>
</div>


<script>

$(document).ready(function() {
      new DataTable('#dataTableevent');
        });
        $(document).ready(function() {
      new DataTable('#dataTableallevent');
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
                title: "Send Invitation Successfuly",
                text: "You clicked the button!",
                icon: "success",
                button: "Ok!",
                    }); 
                console.log(data);
                //Maybe add success message
            })
            .catch((error) => { 
                swal({
                title: "Send Invitation Failed",
                text: "You clicked the button!",
                icon: "warning",
                button: "Ok!",
                    }); 

                console.error(error);

                //Add your error message
            });
        }

</script>

