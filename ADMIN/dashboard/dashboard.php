<?php
    require 'dbcon.php';
    $sql = ("SELECT * FROM event where date(start_datetime) >= '".date("Y-m-d")."' order by date(start_datetime) asc ");
    $all_product = $con->query($sql);


    // SQL query to retrieve and aggregate attendance data by month
$sql = "SELECT DATE_FORMAT(date, '%Y-%M') AS month, COUNT(*) AS count FROM logs GROUP BY month ORDER BY month";
$result = $con->query($sql);

$dataPoints = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $monthYear = $row["month"];
        $count = $row["count"];
        $dataPoints[] = ["y" => $count, "label" => $monthYear];
    }
}
?>
<link rel="stylesheet" type="text/css" href="./public/styles/core.css">
<link rel="stylesheet" type="text/css" href="./public/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="./public/styles/style.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script> 
<div class="dash" style="margin-left: 50px; margin-right: 50px;">
<div class="title pb-20">
				<h1 class="h2 mb-0">Dashboard</h1>
        <?php 
    if (isset($_SESSION['status']))
    {
    ?>
    <script>
        swal({
        title: "<?php echo $_SESSION['status']; ?>",
        text: "Thank You!",
        icon: "<?php echo $_SESSION['icon']; ?>",
		button: false,
        timer: 1500
});
    </script>   
       <?php
        unset($_SESSION['status']);
    }

?>
			</div>
			<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">
                                <?php
                                $query = "SELECT id FROM qrcode ORDER BY id";  
                                $query_run = mysqli_query($con, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<h2>'.$row.'</h2>';
                                ?>
                                </div>
								<div class="font-14 text-secondary weight-500">Total Member</div>
							</div>
							<div class="widget-icon" style="background-color: rgb(0, 123, 191);">
								<div class="icon" data-color="#00eccf"><i class="fas fa-fw fa-users"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">    

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">
                  <?php
                // Define the SQL query to count active members
$sql = "SELECT COUNT(*) as active_count FROM qrcode WHERE status = 0";

// Execute the query and get the result
$result = mysqli_query($con, $sql);

// Check if the query was successful
if ($result) {
  // Fetch the result as an associative array
  $row = mysqli_fetch_assoc($result);

  // Get the count of active members
  $active_count = $row['active_count'];

  // Output the count
  echo '<h2>' . $active_count . '</h2>';
} else {
  // Output an error message
  echo "Error: " . mysqli_error($con);
}

?>
                                </div>
								<div class="font-14 text-secondary weight-500">Active Member</div>
							</div>
							<div class="widget-icon" style="background-color: rgb(0, 123, 191);">
								<div class="icon" data-color="#09cc06"><span class="fas fa-fw fa-user-check"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">     

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">
                <?php     
// Define the SQL query to count active members
$sql = "SELECT COUNT(*) as inactive_count FROM qrcode WHERE status = 1";

// Execute the query and get the result
$result = mysqli_query($con, $sql);

// Check if the query was successful
if ($result) {
  // Fetch the result as an associative array
  $row = mysqli_fetch_assoc($result);

  // Get the count of active members
  $inactive_count = $row['inactive_count'];

  // Output the count
  echo '<h2>' . $inactive_count . '</h2>';
} else {
  // Output an error message
  echo "Error: " . mysqli_error($con);
}

?>
                </div>
								<div class="font-14 text-secondary weight-500">Inactive Member</div>
							</div>
							<div class="widget-icon" style="background-color: rgb(0, 123, 191);">
								<div class="icon"><i class="fas fa-fw fa-user-minus" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">
                                <?php 
                                $event = $con->query("SELECT id FROM `event` where date(start_datetime) >= '".date('Y-m-d')."' ")->num_rows;
                                echo '<h3>' .number_format($event). '</h3>';
                                ?>
                                </div>
								<div class="font-14 text-secondary weight-500">Upcoming Event</div>
							</div>
							<div class="widget-icon" style="background-color: rgb(0, 123, 191);">
								<div class="icon" data-color="#ff5b5b"><i class="fas fa-fw fa-calendar" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
            </div>
            <div class="dash-body" style="margin-left: 50px; margin-right: 50px;">
            
            <div class="row">
                            <div class="col-lg-7">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Attendance Bar Graph
                                        
                                    </div>
                                    <div class="card-body">
                                      <div id="chartContainer" style="height: 440px; width: 100%;"></div></canvas>
                                      <div>
                                      </div>
                                    </div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card mb-4">
                                    <div class="card-header" style="position: static;">
                                        <i class="fas fa-calendar me-1"></i>
                                        Upcoming Event
                                    </div>
                                    <div class="card-body"   style="height: 540px; overflow: auto; margin-top: -30px;">
                                    <?php
            while($row = mysqli_fetch_assoc($all_product)){
        ?>
    <div class="event-container">
      <div class="event">
        <div class="event-left">
        
          <div class="event-date">
            <div class="date"><?php echo date("d",strtotime($row["start_datetime"])) ?></div>
            <div class="month"><?php echo date("M",strtotime($row["start_datetime"])) ?></div>
          </div>
        </div>
        <div class="event-right">
          <h3 class="event-title"><?php echo $row["title"]; ?></h3>
          <div class="event-description">
          <?php echo $row["description"]; ?>
          </div>
          <div class="event-timing">
            1pm
          </div>
        </div>
      </div>
</div>

<?php 
    }
?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <style>
                            /* upcoming event dashboard */

.event-container {
  color: rgb(0, 123, 191);
  font-family: "Roboto", sans-serif;
  max-width: 800px;
  height: 130px;
  }
  .event-container .event {
    box-shadow: 0 4px 16px -8px rgba(0, 0, 0, 0.4);
    display: flex;
    border-radius: 8px;
    margin: 32px 0;
  }
  
  .event .event-left {
    background: rgb(0, 123, 191);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #eee;
    padding: 1px 20px;
    font-weight: bold;
    text-align: center;
    border-radius: 8px 0 0 8px;
    width: 150px;
  }
  
  .event .event-left .date {
    font-size: 30px;
  }
  
  .event .event-left .month {
    font-size: 20px;
    font-weight: normal;
  }
  
  .event .event-right {
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 0 24px;
  }
  
  .event .event-right h3.event-title {
    font-size: 16px;
    margin: 24px 0 10px 0;
    color: #218bbb;
    text-transform: uppercase;
  }
  
  .event .event-right .event-timing {
    background: #fff8ba;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100px;
    padding: 2px;
    border-radius: 16px;
    margin: 24px 0;
    font-size: 14px;
  }
  
  .event .event-right .event-timing img {
    height: 20px;
    padding-right: 8px;
  }
  
  @media (max-width: 550px) {
    .event {
      flex-direction: column;
    }
  
    .event .event-left {
      padding: 0;
      border-radius: 8px 8px 0 0;
    }
  
    .event .event-left .event-date .date,
    .event .event-left .event-date .month {
      display: inline-block;
      font-size: 24px;
    }
  
    .event .event-left .event-date {
      padding: 10px 0;
    }
  }
                   </style>