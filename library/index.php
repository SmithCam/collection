<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header('Location: login.php');
        exit();
    } else {
        // Show users the page! 
        $userid = $_SESSION['userid'];
    }

include 'db.php';
$sql = "";
$wheres = "WHERE userid = '$userid'";

$s="";
if(isset($_GET['s']))
{
	$s = $_GET['s'];
	if($s != 'ALL'){
		$wheres = $wheres . " AND TITLE LIKE '$s%'";
	}
}

if(isset($_GET['gn']))
{
	$wheres = $wheres . " AND isgraphicnovel = 1";
}

if(isset($_GET['auth']))
{
	$auth = $_GET['auth'];
	$wheres = $wheres . " AND authors like '%$auth%'";
}

if(isset($_GET['own']))
{
	$wheres = $wheres . " AND incollection = 1";
}

if(isset($_GET['unown']))
{
	$wheres = $wheres . " AND incollection = 0";
}

if(isset($_GET['nov']))
{
	$wheres = $wheres . " AND isgraphicnovel = 0";
}

if(isset($_GET['tag']))
{
	$tag = $_GET['tag'];
	$wheres = $wheres . " AND tagone = '$tag'";
}

if(isset($_GET['f'])){
	$f = $_GET['f'];

	if($f == 't'){
		$f = "title";
	}
	else if($f == 'a'){
		$f = 'authors';
	}
	else if($f == 'r'){
		$f = 'rating DESC';
	}
	else if($f == 'y'){
		$f = 'year DESC';
	}
	else if($f =='p'){
		$f = 'publisher';
	}
	else if($f == 'p2'){
		$f = "pages DESC";
	}
} else {
	$f = 'title';
}

$sql = "SELECT * FROM booksLib $wheres ORDER BY $f";
$result = $conn -> query($sql);
if(empty($result)) {
	header('Location: additem.php');
        exit();
}

$alphabet = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'ALL');

?>
<html>
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

						<!-- Post -->
						<div class="alphasort">
						<?php
						for ($i = 0; $i < 27; $i++) { ?>
							<a class="alphasort" href="index.php?s=<?php echo $alphabet[$i]?><?php
							if($f != '') { ?>&f=<?php echo $f; } 
								?>"><?php echo $alphabet[$i];?></a>
						<?php } ?>
						<br>
							<div class="dropdown">
							  <button class="dropbtn">Sort</button>
							  <div class="dropdown-content">
							    <a href="index.php?f=t<?php
							if($s != '') { ?>&s=<?php echo $s; } 
								?>">Title</a>
							    <a href="index.php?f=a<?php
							if($s != '') { ?>&s=<?php echo $s; } 
								?>">Author</a>
							    <a href="index.php?f=r<?php
							if($s != '') { ?>&s=<?php echo $s; } 
								?>">Rating</a>
							    <a href="index.php?f=y<?php
							if($s != '') { ?>&s=<?php echo $s; } 
								?>">Year</a>
							    <a href="index.php?f=p<?php
							if($s != '') { ?>&s=<?php echo $s; } 
								?>">Publisher</a>
							    <a href="index.php?f=p2<?php
							if($s != '') { ?>&s=<?php echo $s; } 
								?>">Pages</a>
							  </div>
							</div>
							<div>
								<a class="tag button" href="index.php?gn=1">Graphic Novels</a>
								<a class="tag button" href="index.php?nov=1">Novels</a>
								<a class="tag button" href="index.php?unown=1">Wanted</a>
								<a class="tag button" href="index.php?own=1">Purchased</a>
								<br>
							</div>
						</div>
						<hr>

						<?php while($row = $result -> fetch_array(MYSQLI_ASSOC)):?>
						<div>
							<article class="post posts feed left">

								<header>
									<div class="title">
										<h2><a href="item.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a><a href="updateitem.php?id=<?php echo $row['id'] ?>" class="editindex fa fa-pencil" aria-hidden="true"></a></h2>
									</div>
								</header>

								<div class="float-container">

									<div class = 'right image featured'>
										<a href="item.php?id=<?php echo $row['id'] ?>" ><img src="images/<?php echo $row['cover'] ?>" alt="" /></a>
									</div>

									<div class='left'>
										<div class = ''>
											<br>
											<a href="index.php?auth=<?php echo $row['authors']?>"><p class = 'authorname'><em><?php echo $row['authors'] ?></em></p></a>
										</div>

										<div>
											<p class = ''><?php echo $row['year'] ?></p>
											
											<p class = ''><?php echo $row['pages'] ?> pages</p>
										</div>

										<div>
											<p class = ''>Rating: <?php echo $row['rating'] ?> / 5</p>
										</div>

										<div>
											<p class = 'boringstuff'>(<?php echo $row['publisher'] ?>)</p>
											<p class = 'boringstuff'><?php echo $row['isbnthirteen'] ?></p>
										</div>


									</div>
								</div>

								<div class ='left'>
									<hr class="itemtoo">
									<p><u><strong>Description</strong></u></p>
									<p class = 'truncate'><?php echo $row['description'] ?></p>
								</div>

							</article>
						</div>
						<?php endwhile;?>
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