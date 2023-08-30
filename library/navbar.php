<header id="header">
	<h1><a href="index.php" class="logo-word">Library</a></h1>


	<nav class="links">
		<ul>
			<li class ='basiclink'><a href="index.php">Books</a></li>

			<li class ='basiclink'><a href="additem.php">Add Item</a></li>
			<li class ='basiclink'><a href="uploader.php">Upload Image</a></li>
			<li class ='basiclink'><a href="login.php"><?php
			if(!isset($_SESSION['userid'])){
		        ?>Login<?php
		    } else {
		        ?>Logout<?php 
		    }
			?></a></li>
		</ul>
	</nav>

	<nav class="main">
		<ul>
			<li class="menu">
				<a class="fa-bars" href="#menu">Menu</a>
			</li>
		</ul>
	</nav>
</header>

<!-- Menu -->
<section id="menu">

	<!-- Links -->
		<section>
			<ul class="links">
				<li>
					<a href="index.php">
						<h3>Library</h3>
					</a>
				</li>
				<li>
					<a href="index.php">
						<h3>Books</h3>
					</a>
				</li>
				<li>
					<a href="additem.php">
						<h3>Add Item</h3>
					</a>
				</li>
				<li>
					<a href="uploader.php">
						<h3>Upload Image</h3>
					</a>
				</li>
				<li>
					<a href="login.php">
						<?php
						if(!isset($_SESSION['userid'])){
					        ?><h3>Login</h3><?php
					    } else {
					        ?><h3>Logout</h3><?php 
					    }
						?>
					</a>
				</li>
			</ul>
		</section>
</section>