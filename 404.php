<!DOCTYPE html>
<html lang="en-US">
	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page not found | Wordbench - Municipality HTML Template</title>
        <link rel="shortcut icon" href="images/favicon.ico">

        <!-- STYLESHEETS : begin -->
		<link rel="stylesheet" type="text/css" href="assets/css/general.css"><!-- Default styles generated from assets/scss/general.scss (do not edit) -->
        <link rel="stylesheet" type="text/css" href="assets/css/color-schemes/default.css"><!-- Default color scheme generated from assets/scss/color-schemes/default.scss (change to other pre-defined or custom color scheme) -->
		<link rel="stylesheet" type="text/css" href="style.css"><!-- Place your own CSS into this file -->
		<!-- STYLESHEETS : end -->

	</head>
	<body>

		<!-- WRAPPER : begin -->
		<div id="wrapper">

			<a href="#main" class="accessibility-link accessibility-link--skip-to-content screen-reader-text">Skip to content</a>
			<a href="#header-menu-primary" class="accessibility-link accessibility-link--skip-to-nav screen-reader-text">Skip to main navigation</a>
			<a href="#footer" class="accessibility-link accessibility-link--skip-to-footer screen-reader-text">Skip to footer</a>

			<!-- HEADER : begin -->
			<?php
		require 'header.html';
		?>

			<!-- CORE : begin -->
			<div id="core">
				<div class="core__inner">

					<!-- MAIN : begin -->
					<main id="main" class="main--narrow">
						<div class="main__inner">

							<!-- ERROR 404 PAGE : begin -->
							<div class="error-404-page">
								<div class="error-404-page__inner">
									<div class="error-404-page__wrapper">

										<h1 class="error-404-page__404">404</h1>

										<div class="error-404-page__content">

											<p class="error-404-page__text">Serveris nespēj atrast tīmekļa vietnes lapu, kuru izvēlējāties. Tīmekļu vietnes lapa ir pārvietota uz citu vietu vai arī izdzēsta, pastāv iespēja, ka Jūs ierakstījāt nepareizu URL.</p>

											<p class="error-404-page__back">
												<a href="index.html" class="error-404-page__back-link">
													<span class="error-404-page__back-link-icon" aria-hidden="true"></span>
													<span class="error-404-page__back-link-label">Atpakaļ uz sākumlapu</span>
												</a>
											</p>

										</div>

									</div>
								</div>
							</div>
							<!-- ERROR 404 PAGE : end -->

						</div>
					</main>
					<!-- MAIN : end -->

				</div>
			</div>
			<!-- CORE : end -->

			<!-- FOOTER : begin -->
			<?php
		require 'footer.html';
		?>
			<!-- FOOTER : end -->

		</div>
		<!-- WRAPPER : end -->

		<!-- SCRIPTS : begin -->
		<script src="assets/js/jquery-3.6.0.min.js"></script>
		<script src="assets/js/wordbench-third-party-scripts.min.js"></script>
		<script src="assets/js/wordbench-scripts.js"></script>
		<!-- SCRIPTS : end -->

	</body>
</html>