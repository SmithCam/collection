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
  <form class="login" method="post" action="" name="signin-form">
  <div class="login">
    <label>Username</label>
    <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
  </div>
  <br>
  <div class="login">
    <label>Password</label>
    <input type="password" name="password" required />
      <button class="login" type="submit" name="login" value="login">Log In</button>
      <div class ="register"><a href="register.php">Register</a></div>
  </div>
</form>
</div>
</body>

<?php
  if (isset($_POST['login'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $wheres = [];
      $wheres = " WHERE username = '$username' AND password = '$password'";

      $sql = "SELECT * FROM users $wheres";
      $result = $conn -> query($sql);
      $row = $result -> fetch_array(MYSQLI_ASSOC);

      if (!$result) {
      } else {
              $_SESSION['userid'] = $row['id'];
              header("Location: index.php",  true,  301 ); 
              exit();
      }

}?>