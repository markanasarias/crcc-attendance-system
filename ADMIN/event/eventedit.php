<?php
    require 'dbcon.php';
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
    <h3 style="margin-left: 50px; margin-top: 20px;">Edit Event</h3>
    <br>
    <form action="event/eventcode.php" method="POST" style="padding-left: 50px; padding-right: 50px;">
    <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM event WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
    <input type="hidden" class="form-control" id="editid" name="editid" value="<?= $student['id']; ?>">
      <div class="mb-2">
     <label for="formGroupExampleInput" class="form-label">Date</label>
        <input type="date" class="form-control" id="editdate" name="editdate" value="<?= $student['start_datetime']; ?>" required>
    </div>
    <div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Title</label>
  <input type="text" class="form-control" id="edittitle" name="edittitle" value="<?= $student['title']; ?>" required>
  </div>
  <div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Description</label>
  <input type="text" class="form-control" id="editdescription" name="editdescription" value="<?= $student['description']; ?>" required>
  </div>
  <br>
  <a href="eventlayout.php">
  <input type="button" name="eventbtnsave" value="Back" class="btn btn-secondary" style="margin-left: 250px;"/>
  </a>
  <input type="submit" name="editeventbtnsave" value="Save" class="btn btn-primary" style="margin-left: 315px; margin-top: -65px;"/>
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
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        <div class="table-responsive"  id="table-responsive-id">
            <table class="table table-striped" id="dataTableevent" name="dataTableevent">
                <thead>
                <th>Date</th>
                <th>Title</th>
                <th>Description</th>
                </thead>
                <tbody>
                <?php 
                                    $query = "SELECT * FROM event";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['start_datetime']; ?></td>
                                                <td><?= $student['title']; ?></td>
                                                <td><?= $student['description']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
      $(document).ready(function() {
      new DataTable('#dataTableevent');
        });
  </script>

