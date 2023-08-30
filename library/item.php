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
<?php
include 'db.php';
$sql = "";
$wheres = [];
$id = 'none';
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$wheres = " WHERE id = '$id'";
}
$sql = "SELECT * FROM booksLib $wheres ORDER BY TITLE";
$result = $conn -> query($sql);
$row = $result -> fetch_array(MYSQLI_ASSOC);
?>
		<head>
		<title>Item</title>
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
						<div>
							<article class="post posts feed left item">

								<header>
									<div class="title item">
										<h2><?php echo $row['title'] ?><a href="updateitem.php?id=<?php echo $row['id'] ?>" class="edit fa fa-pencil" aria-hidden="true"></a></h2>

										
									</div>
								</header>

								<div class="item">

									<div class = "image featured item">
										<a target="_blank" href="https://bookshop.org/search?keywords=<?php echo $row['title'] ?>" ><img src="images/<?php echo $row['cover'] ?>" alt="" /></a>

										<div class="item stats">
											<div class = ''>
												<a href="index.php?auth=<?php echo $row['authors']?>"><p><u><?php echo $row['authors'] ?></u></p></a>
											</div>

											<div>
												<p class = 'itemstats'><?php echo $row['year'] ?></p>
												<p class = 'itemstats'><?php echo $row['pages'] ?> pages</p>
											</div>

											<div>
												<p class = 'itemstats'><?php echo $row['rating'] ?> / 5</p>
											</div>

											<div>
												<p class = 'itemstats'>(<?php echo $row['publisher'] ?>)</p>
												<p class = 'itemstats'><?php echo $row['isbnthirteen'] ?></p>
											</div>
										</div>

										<p class = 'itemstats tag'>
											<a href="index.php?tag=<?php echo $row['tagone'] ?>"><button class="subscribe button"><?php if (!is_null($row['tagone'])) {
												echo $row['tagone']; 
											}
											?></button></a>

											<?php if (is_null($row['isgraphicnovel']) ||  $row['isgraphicnovel'] == 0) {
												?><a href="index.php?nov=1"><button class="subscribe button"> <?php 
												echo 'Novel'; ?><?php
											} else { ?><a href="index.php?gn=1"><button class="subscribe button"> <?php
												echo 'Graphic Novel';
											}
											?></button></a>
										</p>
										<br>
										<p class = 'itemstats tag'>

											<?php if (is_null($row['incollection']) || $row['incollection'] == 1) {
												?><a href="index.php?own=1"><button class="subscribe button"> <?php 
												echo 'Purchased'; ?><?php
											} else { ?><a href="index.php?unown=1"><button class="subscribe button"> <?php
												echo 'Wanted';
											}
											?></button></a>

											<a href="index.php"><button class="subscribe button">Books</button></a>

										</p>
									</div>

									<hr class="item">
									<div class ='left item three'>
										<p><u><strong>Description</strong></u></p>
										<p class = ''><?php echo $row['description'] ?></p>
									</div>

								</div>
							</article>
							
						</div>
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