<script>
window.onload = function() {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title: {
            text: "Monthly Attendance"
        },
        axisY: {
            title: "Number of Attendees"
        },
        data: [{
            type: "column",
            yValueFormatString: "#",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
}
</script>