<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header('Location: login.php');
        exit;
    } else {
        // Show users the page! 
    }
?>
<html>
<?php include 'db.php';?>
        <head>
        <title>Upload Image</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="">
        <script src="https://kit.fontawesome.com/6f4d796be0.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/libmain.css" />
        <link rel="icon" type="image/x-icon" href="images/library.svg">
    </head>
    <body class="single is-preload">
        <?php include 'navbar.php';?>

        <!-- Wrapper -->
        <div id="wrapper">

        <h1 class="additemheader">Upload Image</h1>
        <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <input class="upload" type="file" name="cover" required>
            <br>
            <input class="button upload" type="submit" value="Upload Image" name="cover">
        </form>
        <p class = "upload">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["cover"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if(isset($_POST["cover"])) {
              $check = getimagesize($_FILES["cover"]["tmp_name"]);
              if($check !== false) {
                $uploadOk = 1;
              } else {
                echo "File is not an image! ";
                $uploadOk = 0;
              }
            // Check if file already exists
            if (file_exists($target_file)) {
              echo "File already exists. ";
              $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
              echo "Only JPG, JPEG, PNG & GIF files are allowed. ";
              $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              echo "The file was not uploaded. ";
            // if everything is ok, try to upload file
            } else {
              if (move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["cover"]["name"])). " has been uploaded.";
              } else {
                echo "There was an error uploading your file. ";
                    }
                }
            }
        }
        ?>
        </p>
        </div>
        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/browser.min.js"></script>
            <script src="assets/js/breakpoints.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
            <script src="assets/js/libmain.js"></script>

    </body>
</html>