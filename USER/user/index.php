<?php
session_start();
?>
<html>
  <head>
    <title>Attendance</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body style="overflow: hidden;">
  <?php 
    if (isset($_SESSION['attendance']))
    {
    ?>
    <script>
        swal({
        title: "<?php echo $_SESSION['attendance']; ?>",
        text: "Thank You!",
        icon: "<?php echo $_SESSION['icon']; ?>",
        button: false,
        timer: 2500
});
    </script>   
       <?php
        unset($_SESSION['attendance']);
    }

?>
<span id="datetime" style="font-size: 240%; color: rgb(0, 123, 191); margin-left: 79%;"></span>
        <section class="scans">
          <form id="scanForm" method="post" action="qrcode.php">
            <input type="hidden" id="scanResult" name="scanResult" value="">
          </form>
        </section>

      <div class="preview-container">
        <video id="preview" style="width: 38%; margin-top: 7.7%;"></video>
      </div>
    <script type="text/javascript" src="app.js"></script>
    <script>
  // create a function to update the date and time
  function updateDateTime() {
        // create a new `Date` object
        const now = new Date();

        // get the current date and time as a string
        const currentDateTime = now.toLocaleString();

        // update the `textContent` property of the `span` element with the `id` of `datetime`
        document.querySelector('#datetime').textContent = currentDateTime;
      }

      // call the `updateDateTime` function every second
      setInterval(updateDateTime, 1000);
    </script>
  </body>
</html>
