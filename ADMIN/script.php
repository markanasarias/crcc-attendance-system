<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="./login/logout.php">Logout</a>
        </div>
    </div>
</div>
</div>
<!--Core bootstrap-->
<script src="./public/vendor/jquery/jquery.min.js"></script>
<script src="./public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<!-- Core plugin JavaScript-->
<script src="./public/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="./public/javascripts/js/sb-admin-2.js"></script>

<!-- PCreated by level plugins -->
<script src="./public/vendor/datatables/jquery.dataTables.min.js"></script>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
    </div>
</div>
</div>
<script src="./public/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="./public/vendor/chart.js/Chart.min.js"></script>

<!-- PCreated by level custom scripts -->
<!-- <script src="./public/javascripts/js/demo/datatables-demo.js"></script>
<script src="./public/javascripts/js/demo/chart-area-demo.js"></script>
<script src="./public/javascripts/js/demo/chart-pie-demo.js"></script> -->

<!-- swal-->
<script src="./public/javascripts/js/sweetalert.min.js"></script>

<script src="./public/javascripts/js/scripts.js"></script>



<!-- Page level custom scripts -->
<!-- <script src="/javascripts/js/demo/datatables-demo.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"></script>
<script src="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css"></script> -->



<script>
  hidespinner();

  function showspinner() {
    console.log("show loader");
    $(".loader-wrapper").show();
  }

  function hidespinner() {
    console.log("hide loader");

    setTimeout(() => {
      $(".loader-wrapper").hide();
    }, 1000);
  }

</script>
