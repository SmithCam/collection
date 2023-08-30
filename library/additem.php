<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header('Location: login.php');
        exit();
    } else {
        // Show users the page! 
    }
?>
<html>
<?php include 'db.php';?>
		<head>
		<title>Add Item</title>
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

				<h1 class="additemheader">Add Item</h1>


						<!-- Post -->
				<form id='additem' class="additemform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				 Title <input class="title" type="text" name="title" placeholder="Required" required>
				Authors <em>(separate names with commas, put names with spaces in quotes)</em>
				<input class ="authors" type="text" name="author" placeholder="Required" required>
					Artists <em>(separate names with commas, put names with spaces in quotes)</em><input class ="authors" type="text" name="artists">

					Description <textarea name="description" form="additem"></textarea>

				 	Publisher <input type="text" name="publisher">
				 	ISBN <input class="isbn" type="number" name="isbn">

				 	<div class="container">
				 		<input class="genre" type="text" name="genre" placeholder="Genre">

				 		<input class="rating" type="number" name="rating" step='.5' min='-5' max='5' placeholder="Rating">
				 	</div>

				 	<div class="container">
				 		<input class="year" type="number" name="year" placeholder="Year">

				 		<input class="pages" type="number" name="pages" placeholder="Pages">
				 	</div>

				 	<div class="checks">
						<form>
							<input type="checkbox" id="collection" name="collection" value='1'>
						  <label for="collection">In Collection</label><br>
						</form>

						<form>
							<input type="checkbox" id="graphicnovel" name="graphicnovel" value='1'>
						  <label for="graphicnovel">Graphic Novel</label><br>
						</form>

						Image Filename (.jpg, .png, .gif)
						<input class="cover" type="text" name="cover" placeholder="Required">

				 		<hr>
				 		<input class="button submit" type="submit">
					</div>


			<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {

				//Check Fields
			  $required = 1;

			  //title
			  if(isset($_POST['title']) && $_POST['title'] != ''){
			  	$title = "'{$_POST['title']}'";
			  }
			  else {
			  	$required = 0;
			  }

			  //author
			  if(isset($_POST['author']) && $_POST['author'] != ''){
			  	$author = "'{$_POST['author']}'";
			  }
			  else {
			  	$required = 0;
			  }

			  //artists
			  if(isset($_POST['artists']) && $_POST['artists'] != ''){
			  	$artists = "'{$_POST['artists']}'";
			  } else {
			  	$artists = 'null';
			  }

			  //rating
			  if(isset($_POST['rating']) && $_POST['rating'] != ''){
			  	$rating = $_POST['rating'];
			  } else {
			  	$rating = 'null';
			  }

			  //description
			  if(isset($_POST['description']) && $_POST['description'] != ''){
			  	$description = "'{$_POST['description']}'";
			  } else {
			  	$description = 'null';
			  }

			  //year
			  if(isset($_POST['year']) && $_POST['year'] != ''){
			  	$year = $_POST['year'];
			  } else {
			  	$year = 'null';
			  }

			  //publisher
			  if(isset($_POST['publisher']) && $_POST['publisher'] != ''){
			  	$publisher = "'{$_POST['publisher']}'";
			  } else {
			  	$publisher = 'null';
			  }

			  //pages
			  if(isset($_POST['pages']) && $_POST['pages'] != ''){
			  	$pages = $_POST['pages'];
			  } else {
			  	$pages = 'null';
			  }

			  //isbn
			  if(isset($_POST['isbn']) && $_POST['isbn'] != ''){
			  	$isbn = $_POST['isbn'];
			  } else {
			  	$isbn = 'null';
			  }

			  //genre
			  if(isset($_POST['genre']) && $_POST['genre'] != ''){
			  	$genre = "'{$_POST['genre']}'";
			  } else {
			  	$genre = 'null';
			  }

			  //cover
			  if(isset($_POST['cover']) && $_POST['cover'] != ''){
			  	$cover = "'{$_POST['cover']}'";
			  } else {
			  	$cover = 'null';
			  }

			  //collection
			  if(isset($_POST['collection']) && $_POST['collection'] != ''){
			  	$collection = $_POST['collection'];
			  } else {
			  	$collection = '0';
			  }

			  //collection
			  if(isset($_POST['graphicnovel']) && $_POST['graphicnovel'] != ''){
			  	$graphicnovel = $_POST['graphicnovel'];
			  } else {
			  	$graphicnovel = '0';
			  }

			  //Check all fields completed
			  if ($required == 0) {
			  	echo "Fill out each required field to add an entry.";
			  } else {

			  	//Update table
			  	$sql = "
					";
					$sql = sprintf("INSERT INTO `booksLib`
					(`title`,
					`authors`,
					`artists`,
					`year`,
					`rating`,
					`publisher`,
					`cover`,
					`pages`,
					`description`,
					`isbnthirteen`,
					`tagone`,
					`isgraphicnovel`,
					`incollection`)
					VALUES
					($title,
					$author,
					$artists,
					$year,
					$rating,
					$publisher,
					$cover,
					$pages,
					'%s',
					$isbn,
					$genre,
					$graphicnovel,
					$collection);",
    			$conn->real_escape_string($description));

					$conn -> query($sql);
			  }
			}
			?>
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