<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="/styles.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title><?=$title ?></title>
<script async src='/cdn-cgi/bm/cv/669835187/api.js'></script></head>
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
			<img src="/images/logoCheese2.png" href="/"/>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/store/shop">Shop</a></li>
			<li><a href="/store/about">About Us</a></li>
			<li><a href="/store/contact">Contact us</a></li>
			<li><a href="/store/login">Admin</a></li>
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
		<a href="#" class="fa fa-facebook"></a>
		<a href="#" class="fa fa-twitter"></a>
		&copy; BestCheese 2022
	</footer>
<script type="text/javascript">(function(){window['__CF$cv$params']={r:'6d9d0236aa4be674',m:'lz9OXJ0RQLOx72wpOLyynmRFO8y_5x1gnVVhCCvT0bM-1644241002-0-Aby/m/sPXXuECuPGNY5TZ5JZ3Wg4a/giMu2UXYr5wCtJpr0StPfl2ZQwfJKfS6dUzLTPOzVk3tciscDGJ2s72bYU588HfD8XXFyx1z7Icl5OG2VP1TU9qNmxC1ieX1JoFIyfF4NrGrt6sLTJ4XNjVJgoC2DreBZ0jsj8nidwk5beVl8lDVW2rciE5y8s4sal6Q==',s:[0x1f104c6800,0x59bc5c84e9],}})();</script></body>

</html>