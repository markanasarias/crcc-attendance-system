<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
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
     <form action="ADMIN/login/logincode.php" method="post">
     	<h2><img src="ADMIN/login/bgcrcc.png" width="150" height="150"></h2>
     	<label>Email</label>
     	<input type="text" name="email" placeholder="Email" required><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password" required><br>
     	<button type="submit">Login</button>
		 <a href="ADMIN/login/forgotpass.php">Forgot Password?</a>
     </form>
		</body>
<style>
    body {
	background-color: rgb(0, 123, 191);
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
	flex-direction: column;
    overflow: hidden;
}

*{
	font-family: sans-serif;
	box-sizing: border-box;
}

form {
	width: 500px;
	border: 2px solid #ccc;
	padding: 30px;
	background: #fff;
	border-radius: 15px;
}

h2 {
	text-align: center;
	margin-bottom: 40px;
}

input {
	display: block;
	border: 2px solid #ccc;
	width: 95%;
	padding: 10px;
	margin: 10px auto;
	border-radius: 5px;
}
label {
	color: #888;
	font-size: 18px;
	padding: 10px;
}

button {
	float: right;
	background-color: rgb(0, 123, 191);
	padding: 10px 15px;
	color: #fff;
	border-radius: 5px;
	margin-right: 10px;
	border: none;
}
button:hover{
	opacity: .7;
}
.error {
   background: #F2DEDE;
   color: #A94442;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

h1 {
	text-align: center;
	color: #fff;
}

a {
	float: right;
	background: #555;
	padding: 10px 15px;
	color: #fff;
	border-radius: 5px;
	margin-right: 10px;
	border: none;
	text-decoration: none;
}
a:hover{
	opacity: .7;
}
    </style>
</body>
</html>