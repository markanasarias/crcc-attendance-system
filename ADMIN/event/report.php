<?php
require 'dbcon.php';

// Initialize variables to hold search results
$searchResults = array();

// Check if the search button is clicked
if(isset($_POST['search'])) {
    $minDate = $_POST['min'];
    $maxDate = $_POST['max'];

    // Fetch data from the database based on the date range
    $sql = "SELECT * FROM event WHERE start_datetime BETWEEN '$minDate' AND '$maxDate'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Store search results in an array
        while($row = $result->fetch_assoc()) {
            $searchResults[] = $row;
        }
    }
}

$con->close();
?>


<div class="col-xl-11 col-lg-12" style="margin-left: 70px;">
        <div class="card shadow mb-8">
            <h3 style="margin-left: 50px; margin-top: 20px;">Event Report</h3>
            <h7 style="margin-left: 50px; margin-bottom: 20px;">Dashboard > Event Report </h7>
        </div>
    </div>
    <br>
    <!-- Table -->
    <div class="card shadow mb-4" id="tablecard">
        <div class="card-header py-3">
            <form method="post" action="">
                <button type="button" id="print" class="btn btn-primary">
                    Generate Report
                </button>
                <div class="date-range-body" style="margin-left: 775px; margin-top: -45px; margin-right: -230px;">
                    <div class="row g-2">
                        <div class="col">
                            <input type="date" class="form-control" id="min" name="min" placeholder="Date Started">
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="max" name="max" placeholder="Date Ended">
                        </div>
                        <div class="col">
                            <button type="submit" name="search" class="btn btn-primary">
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive" id="table-responsive-id">
            <div class="print_out" id="print_out">
                <table class="table table-striped" id="dataTableattendances">
                    <thead>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Description</th>
                    </thead>
                    <tbody>
                        <?php
                        // Display search results in the table
                        if (!empty($searchResults)) {
                            foreach ($searchResults as $row) {
                                echo "<tr>";
                                echo "<td>" . $row['start_datetime'] . "</td>";
                                echo "<td>" . $row['title'] . "</td>";
                                echo "<td>" . $row['description'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No results found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <script>
        $('#print').click(function(){
            var _el = $('<div>')
            var _head = $('head').clone()
                _head.find('title').text("Attendance Details - Print View")
            var p = $('#print_out').clone()
            p.find('hr.border-light').removeClass('.border-light').addClass('border-dark')
            p.find('.btn').remove()
            _el.append(_head)
            _el.append('<div class="d-flex justify-content-center">'+
                      '<div class="col-1 text-right">'+
                      '<img src="bgcrcc.png" width="65px" height="65px" />'+
                      '</div>'+
                      '<div class="col-10">'+
                      '<h4 class="text-center">CRCC</h4>'+
                      '<h4 class="text-center">Event Report</h4>'+
                      '</div>'+
                      '<div class="col-1 text-right">'+
                      '</div>'+
                      '</div><hr/>')
            _el.append(p.html())
            var nw = window.open("","","width=1200,height=900,left=250,location=no,titlebar=yes")
                     nw.document.write(_el.html())
                     nw.document.close()
                     setTimeout(() => {
                         nw.print()
                         setTimeout(() => {
                            nw.close()
                            end_loader()
                         }, 200);
                     }, 500);

        })
        </script>
