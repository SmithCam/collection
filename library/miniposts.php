<?php
		include 'db.php';
		$resultAgain = $conn -> query("SELECT * FROM articles ORDER BY Rand() LIMIT 5");

		// array
		$rowAgain = $resultAgain -> fetch_array(MYSQLI_ASSOC);
		?>
		<h2 class ="keepreading" >Just Keep Reading</h2>
		<div class="container">
		<!-- Mini Post -->
			<div class="mini-post">
				<header>
					<h2><a href="<?php echo $rowAgain['FILENAME'] ?>"><?php echo $rowAgain['TITLE'] ?></a></h2>
					<time class="published" datetime="<?php echo $rowAgain['DATE'] ?>"><?php echo $rowAgain['DATE'] ?></time>
					<a href="about.php" class="author"><img src="images/<?php echo $rowAgain['AUTHORPIC'] ?>" alt="" /></a>
				</header>
				<a href="<?php echo $rowAgain['FILENAME'] ?>" class="image"><img src="images/<?php echo $rowAgain['IMAGEONE'] ?>" alt="" /></a>
			</div>

		<!-- Mini Post -->
			<div class="mini-post middle">
				<header>
					<?php $rowAgain = $resultAgain -> fetch_array(MYSQLI_ASSOC); ?>
					<h2><a href="<?php echo $rowAgain['FILENAME'] ?>"><?php echo $rowAgain['TITLE'] ?></a></h2>
					<time class="published" datetime="2<?php echo $rowAgain['DATE'] ?>"><?php echo $rowAgain['DATE'] ?></time>
					<a href="about.php" class="author"><img src="images/<?php echo $rowAgain['AUTHORPIC'] ?>" alt="" /></a>
				</header>
				<a href="<?php echo $rowAgain['FILENAME'] ?>" class="image"><img src="images/<?php echo $rowAgain['IMAGEONE'] ?>" alt="" /></a>
			</div>

		<!-- Mini Post -->
			<div class="mini-post">
				<header>
					<?php $rowAgain = $resultAgain -> fetch_array(MYSQLI_ASSOC); ?>
					<h2><a href="<?php echo $rowAgain['FILENAME'] ?>"><?php echo $rowAgain['TITLE'] ?></a></h2>
					<time class="published" datetime="<?php echo $rowAgain['DATE'] ?>"><?php echo $rowAgain['DATE'] ?></time>
					<a href="about.php" class="author"><img src="images/<?php echo $rowAgain['AUTHORPIC'] ?>" alt="" /></a>
				</header>
				<a href="<?php echo $rowAgain['FILENAME'] ?>" class="image"><img src="images/<?php echo $rowAgain['IMAGEONE'] ?>" alt="" /></a>
			</div>
		</div>