<?php ob_start(); session_start(); unset($_SESSION['userid']);
  include('db.php');?>
<head>
    <title>Library</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="">
    <script src="https://kit.fontawesome.com/6f4d796be0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/libmain.css" />
    <link rel="icon" type="image/x-icon" href="images/library.svg">
  </head>
  <body class="single is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <?php include 'navbar.php';?>
  	<form class="login" method="post" action="" name="register">
	  	<div class="login">
	    	<label>Email</label>
	    	<input type="text" name="email" pattern="a-zA-Z0-9]+" required />
	  	</div>
	  	<br>
	  	<div class="login">
	    	<label>Username</label>
	    	<input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
	  	</div>
	  	<br>
	  	<div class="login">
	    	<label>Password</label>
	    	<input type="password" name="password" required />
	    	<br>
	      	<button class="login" type="submit" name="register" value="register">Create Account</button>
	      	<div class ="register"><a href="login.php">Already Registered?</a></div>
	  	</div>
	</form>
	</div>
</body>

<?php
  if (isset($_POST['register'])) {

  	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO users (username, password, email)
	VALUES ('$username', '$password', '$email')";

	if ($conn->query($sql) === TRUE) {
		$sql = "SELECT * from users where username = '$username' and password = '$password' and email = '$email'";
		$result = $conn -> query($sql);
      	$row = $result -> fetch_array(MYSQLI_ASSOC);

		$_SESSION['userid'] = $row['id'];
		header("Location: index.php",  true,  301 ); 
		exit();
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		header("Location: register.php",  true,  301 ); 
		exit();
	}

$conn->close();


      if (!$result) {
      	$sql = "INSERT INTO users '(username, password, email)' values ($username,$password,$email)";
      	$result = $query->execute();

      	$sql = "SELECT id from users where username = $username and password = $password and email = $email";
      	      echo $sql;
      	$result = $conn -> query($sql);
      	$row = $result -> fetch_array(MYSQLI_ASSOC);

      	$_SESSION['userid'] = $row['id'];
      	header("Location: index.php",  true,  301 ); 
        exit();
      } else {
            header("Location: register.php",  true,  301 ); 
            exit();
      }

      }?>