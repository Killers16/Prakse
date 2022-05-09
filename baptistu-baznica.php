
<!DOCTYPE html>
<html lang="en-US">
	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kolka</title>
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

		<?php
		include("database_config.php");
		require 'header.html';
		?>
			<!-- CORE : begin -->
			<div id="core">
				<div class="core__inner">

					<!-- CORE COLUMNS : begin -->
					<div class="core__columns">

						<div class="core__columns-col core__columns-col--left core__columns-col--main">
							
							<!-- MAIN : begin -->
							<main id="main">
								<div class="main__inner">
							
									<!-- MAIN IMAGE : begin -->
									<div class="main-image main-image--cropped main-image--parallax">
										<p class="main-image__inner" style="background-image: url( 'content/klubi11.jpg' );">
											<span class="screen-reader-text">Baptistu baznīca</span>
										</p>
									</div>
									<!-- MAIN IMAGE : end -->

									<!-- MAIN CONTENT : begin -->
									<div class="main__content">
										<div class="main__content-wrapper">
											<div class="main__content-inner">

											
												<!-- POST SINGLE : begin -->
												<div class="post-single blog-post-single">
												
													<!-- POST : begin -->
													<article class="post">
														<div class="post__inner">

															<!-- MAIN HEADER : begin -->
															<header class="main-header">
																<div class="main-header__inner">

																	<!-- BREADCRUMBS : begin -->
																	<div class="breadcrumbs">
																		<div class="breadcrumbs__inner">

																			<nav class="breadcrumbs__nav" aria-label="Breadcrumbs">
																				<ul class="breadcrumbs__list">

																					<li class="breadcrumbs__item">
																						<span class="breadcrumbs__item-decor" aria-hidden="true"></span>
																						<a href="index.html" class="breadcrumbs__link">Sākumlapa</a>
																					</li>

																					<li class="breadcrumbs__item">
																						<span class="breadcrumbs__item-decor" aria-hidden="true"></span>
																						<a href="blog-archive.html" class="breadcrumbs__link">Baptistu baznīca</a>
																					</li>

																				</ul>
																			</nav>

																		</div>
																	</div>
																	<!-- BREADCRUMBS : end -->
																
																	<h1 class="main-header__title">Pitraga baptistu baznīca</h1>

																</div>
															</header>
															<!-- MAIN HEADER : end -->

															<!-- POST CONTENT : begin -->
															<div class="post__content">

															<div>
                                                                <hr>
                                                            <p>Dibināšanas gads:&nbsp;1890</p>
                                                            
                                                            <p>Dievkalpojumi: katra mēneša 1. un 3. svētdienā plkst. 12.00</p>
                                                            <p><strong>Sludinātājs:</strong> Nauris Graudiņš, tālr. 22018468, E-pasts: nauris.graudins@gmail.com<br><strong>Draudzes priekšnieks:</strong> Juris Popmanis, tālr. 28789874, E-pasts: juris.popmanis@gmail.com</p>
                                                            <p>«Druvas» Pitrags, Kolkas pagasts, Dundagas novads <span class="caps">LV</span>&nbsp;3275</p>
                                                            <p>pitraga.draudze@gmail.com</p>
                                                            <hr>
                                                            <p><a href="http://balticmaps.eu/?lang=lv&amp;draw_hash=mgkshc&amp;centerx=403958.7285296814&amp;centery=6396863.766982907&amp;zoom=0&amp;layer=map&amp;ls=o"><span style="color:#0000FF;">Pitraga baptistu baznīcas atrašanās vieta&nbsp;kartē »</span></a></p>
                                                                                                </div>
                                                            
                                                        </div>
															<!-- POST CONTENT : end -->

														</div>
													</article>
													<!-- POST : end -->
												</div>
												<!-- POST SINGLE : end -->
												
											</div>
										</div>
									</div>
									<!-- MAIN CONTENT : begin -->

								</div>
							</main>
							<!-- MAIN : end -->
						</div>

						<div class="core__columns-col core__columns-col--right core__columns-col--sidebar">

							<!-- SIDEBAR : begin -->
							<aside id="sidebar">
								<div class="sidebar__wrapper">
									<div class="sidebar__inner">

										<!-- LSVR POSTS WIDGET : begin -->
										<div class="widget lsvr-post-list-widget">
											<div class="widget__inner">

												<h3 class="widget__title">Jaunākie raksti</h3>

												<div class="widget__content">

													<!-- LIST : begin -->
													<ul class="lsvr-post-list-widget__list">
													<?php
													$conn = new mysqli("localhost","root","","db_kolka");
													$result2 = $conn->query("SELECT * FROM blogs INNER JOIN blg_category ON blogs.category_id = blg_category.id_category ORDER BY id_blogs DESC LIMIT 4");
													if (mysqli_num_rows($result2) > 0) {
														$i=0;
														while($row = mysqli_fetch_array($result2)) {
                            						?>
														<!-- LIST ITEM : begin -->
														<li class="lsvr-post-list-widget__item lsvr-post-list-widget__item--has-thumb">
															<div class="lsvr-post-list-widget__item-inner">

																<p class="lsvr-post-list-widget__item-thumb">
																	<a href="blog-detail.php?id=<?php echo $row["id_blogs"] ?>" class="lsvr-post-list-widget__item-thumb-link" style="background-image: url( '<?php echo 'data:image/png;base64,' . $row["picture"] . ''; ?>' );">
																		<span class="screen-reader-text"><?php echo $row["title"] ?></span>
																	</a>
																</p>

																<div class="lsvr-post-list-widget__item-content">

																	<p class="lsvr-post-list-widget__item-category">
																		<a href="blog-archive.php" class="lsvr-post-list-widget__item-category-link"><?php echo $row["cname"] ?></a>
																	</p>

																	<h4 class="lsvr-post-list-widget__item-title">
																		<a href="blog-detail.php?id=<?php echo $row["id_blogs"] ?>" class="lsvr-post-list-widget__item-title-link"><?php echo $row["title"] ?></a>
																	</h4>

																	<p class="lsvr-post-list-widget__item-date"><?php echo $row["created_at"] ?></p>

																</div>

															</div>
														</li>
														<!-- LIST ITEM : end -->
														<?php
                               							  $i++;
														}
													}
													else{
													echo "No result found";
													}
														?>
													</ul>
													<!-- LIST : end -->

													<!-- MORE LINK : begin -->
													<p class="widget__more">
														<a href="blog-archive.php" class="widget__more-link">
															<span class="widget__more-link-label">Vairāk rakstu</span>
															<span class="widget__more-link-icon" aria-hidden="true"></span>
														</a>
													</p>
													<!-- MORE LINK : end -->

												</div>

											</div>
										</div>
										<!-- LSVR POSTS WIDGET : end -->

									</div>
								</div>
							</aside>
							<!-- SIDEBAR : end -->

						</div>

					</div>
					<!-- CORE COLUMNS : end -->

				</div>
			</div>
			<!-- CORE : end -->
            <?php
		require 'footer.html';
		?>
		</div>
		<!-- WRAPPER : end -->

		<!-- SCRIPTS : begin -->
		<script src="assets/js/jquery-3.6.0.min.js"></script>
		<script src="assets/js/wordbench-third-party-scripts.min.js"></script>
		<script src="assets/js/wordbench-scripts.js"></script>
		<!-- SCRIPTS : end -->

	</body>
</html>