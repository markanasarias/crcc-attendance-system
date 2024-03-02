<?php
    require 'dbcon.php';
?>
<div class="col-xl-11 col-lg-12" style="margin-left: 70px;" >
<div class="card shadow mb-8">
    <h3 style="margin-left: 50px; margin-top: 20px;">Attendance</h3>
    <h7 style="margin-left: 50px; margin-bottom: 20px;">Dashboard > Attendance Table </h7>
</div>
</div>
<br>
<!-- Table -->
<div class="card shadow mb-4" id="tablecard">
    <div class="card-header py-3">
      <button type="button" id="print" class="btn btn-primary" >
        Generate Report
      </button>
        <div class="date-range-body" style="margin-left: 775px; margin-top: -45px; margin-right: -230px;">
      <div class="row g-2">
                    <div class="col">
                     <input type="text" class="form-control" id="min" name="min" placeholder="Date Started">
                    </div>
                    <div class="col">
                      <input type="text" class="form-control" id="max" name="max" placeholder="Date Ended">
                    </div>
                    <div class="col">
                    <button type="button" class="btn btn-primary" onClick="window.location.reload()">
                    Reload
                    </button>
                    </div>
                    </div>
    </div>
    </div>
    <div class="card-body">
        <div class="table-responsive"  id="table-responsive-id">
            <div class="print_out" id="print_out">
            <table class="table table-striped" id="dataTableattendances">
                <thead>
                <th>Date</th>
                <th>Name</th>
                <th>Time In</th>
                </thead>
                <tbody>
                <?php 
                                    $query = "SELECT * FROM logs";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['date']; ?></td>
                                                <td><?= $student['name']; ?></td>
                                                <td><?= $student['time']; ?></td>
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
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
<script>
   let minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
 DataTable.ext.search.push(function (settings, data, dataIndex) {
     let min = minDate.val();
     let max = maxDate.val();
     let date = new Date(data[0]);
  
     if (
         (min === null && max === null) ||
         (min === null && date <= max) ||
         (min <= date && max === null) ||
         (min <= date && date <= max)
     ) {
         return true;
     }
     return false;
 });
  
 // Create date inputs
 minDate = new DateTime('#min', {
     format: 'YY-MM-DD'
 });
 maxDate = new DateTime('#max', {
     format: 'YY-MM-DD'
 });
  
 // DataTables initialisation
 let table = new DataTable('#dataTableattendances');
  
 // Refilter the table
 document.querySelectorAll('#min, #max').forEach((el) => {
     el.addEventListener('change', () => table.draw());
 });

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
                      '<img src="1.png" width="65px" height="65px" />'+
                      '</div>'+
                      '<div class="col-10">'+
                      '<h4 class="text-center">CRCC</h4>'+
                      '<h4 class="text-center">Attendance Report</h4>'+
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




