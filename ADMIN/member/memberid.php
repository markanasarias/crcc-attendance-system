<?php
    require 'dbcon.php';
?>
<button class="btn btn-primary" onclick="window.print()">Print</button>
<a href="memberlayout.php">
<input type="button" name="back-btn" value="Back" class="btn btn-secondary"/>
</a>

<div class="container">
<?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM qrcode WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
            <div class="padding">
                <div class="font">
                    <div class="top">
                        <center><h5 style="color: #fff; padding-top: 25px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Calendola Refuge Community Church</h5></center>
                        <img src="member/images/<?=$student['image_path1'];?>">
                    </div>
                    <div class="bottom">
                        <p><?=$student['qrtext'];?></p>
                        <p class="desi"><?=$student['role'];?></p>
                        <div class="barcode">
                            <img src="member/images/<?=$student['qrimage'];?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="back">
                <h1 class="Details">information</h1>
                <hr class="hr">
                <div class="details-info">
                    <p><b>Email : </b></p>
                    <p><?=$student['email'];?></p>
                    <p><b>Mobile No: </b></p>
                    <p><?=$student['contact'];?></p>
                    <p><b>Emergency Contact Name:</b></p>
                    <p><?=$student['ecname'];?></p>
                    <p><b>Emergency Contact Phone:</b></p>
                    <p><?=$student['eccontact'];?></p>
</div>

                    

                </div>
            </div>
            <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
        </div>


        <style>
            *{
    margin: 00px;
    padding: 00px;
    box-sizing: content-box;
}

.container {
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: white;
    flex-direction: row;
    flex-flow: wrap;

}

.font{
    height: 375px;
    width: 250px;
    position: relative;
    border-radius: 10px;
    border-color: #ff0000; /* red */
}

.top{
    height: 30%;
    width: 100%;
    background-color: rgb(0, 123, 191);
    position: relative;
    z-index: 5;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}

.bottom{
    height: 70%;
    width: 100%;
    background-color: white;
    position: absolute;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    border-color: #ff0000; /* red */
    border: 1px solid rgb(0, 123, 191);
    
}

.top img{
    height: 100px;
    width: 100px;
    background-color: #e6ebe0;
    border-radius: 10px;
    position: absolute;
    top:60px;
    left: 75px;
}
.bottom p{
    position: relative;
    top: 60px;
    text-align: center;
    text-transform: capitalize;
    font-weight: bold;
    font-size: 20px;
    text-emphasis: spacing;
}
.bottom .desi{
    font-size:12px;
    color: grey;
    font-weight: normal;
}
.bottom .no{
    font-size: 15px;
    font-weight: normal;
}
.barcode img
{
    height: 100px;
  width: 120px;
  text-align: center;
  margin: 5px;
}
.barcode{
    text-align: center;
    position: relative;
    top: 70px;
}

.back
{
    height: 375px;
    width: 250px;
    border-radius: 10px;
    background-color: rgb(0, 123, 191);

}
.qr img{
    height: 50px;
  width: 100%;
  margin: 20px;
  background-color: white;
}
.Details {
    color: white;
    text-align: center;
    padding: 10px;
    font-size: 25px;
}


.details-info{
    color: white;
    text-align: left;
    padding: 5px;
    line-height: 20px;
    font-size: 16px;
    text-align: center;
    margin-top: 20px;
    line-height: 22px;
}

.logo {
    height: 40px;
    width: 150px;
    padding: 40px;
}

.logo img{
    height: 100%;
    width: 100%;
    color: white ;

}
.padding{
    padding-right: 20px;
    border-color: black;
}

@media screen and (max-width:400px)
{
    .container{
        height: 130vh;
    }
    .container .front{
        margin-top: 50px;
    }
}
@media screen and (max-width:600px)
{
    .container{
        height: 130vh;
    }
    .container .front{
        margin-top: 50px;
    }

}
            </style>