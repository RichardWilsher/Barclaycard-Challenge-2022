<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Barclaycard Challenge 22 - <?=$title?></title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<?php foreach($openingHours as $hours){ ?>
					<p>
						<?=$hours->text ?>: <?=$hours->times?>
					</p>
				<?php }?>
			</aside>
			<img src="/images/logo.png"/>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/test/shop">Shop</a></li>
			<li><a href="/test/about">About Us</a></li>
			<li><a href="/test/contact">Contact us</a></li>
			<li><a href="/admin/login">Admin</a></li>
		</ul>

	</nav>
<img src="/images/randombanner.php"/>
	<main class="admin">
		<section class="left">
		<ul>
			<?=$navElement?>
		</ul>
	</section>

	<section class="right">

    <?=$output?>
	</section>
	</main>


	<footer>
		&copy; Barclaycard Challenge 2022
	</footer>
</body>
</html>