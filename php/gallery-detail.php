<!DOCTYPE html>
<html lang="en-US">
	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gallery Detail | Wordbench - Municipality HTML Template</title>
        <link rel="shortcut icon" href="images/favicon.ico">

        <!-- STYLESHEETS : begin -->
		<link rel="stylesheet" type="text/css" href="../assets/css/general.css"><!-- Default styles generated from assets/scss/general.scss (do not edit) -->
        <link rel="stylesheet" type="text/css" href="../assets/css/color-schemes/default.css"><!-- Default color scheme generated from assets/scss/color-schemes/default.scss (change to other pre-defined or custom color scheme) -->
		<link rel="stylesheet" type="text/css" href="../style.css"><!-- Place your own CSS into this file -->
		<!-- STYLESHEETS : end -->

	</head>
	<body>

		<!-- WRAPPER : begin -->
		<div id="wrapper">

			<a href="#main" class="accessibility-link accessibility-link--skip-to-content screen-reader-text">Skip to content</a>
			<a href="#header-menu-primary" class="accessibility-link accessibility-link--skip-to-nav screen-reader-text">Skip to main navigation</a>
			<a href="#footer" class="accessibility-link accessibility-link--skip-to-footer screen-reader-text">Skip to footer</a>

			<!-- HEADER : begin -->
			<!-- HEADER : begin -->
			<?php mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
            include_once '../database_config.php'; 
			require '../header.html';?>
			<!-- HEADER : end -->

			<!-- CORE : begin -->
			<div id="core">
				<div class="core__inner">

					<!-- MAIN : begin -->
					<main id="main">
						<div class="main__inner">

                        <?php
												 // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM gallery INNER JOIN gal_category ON gallery.category_id = gal_category.id_category WHERE id_gal = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $title = $row["title"];
                    $content = $row["content"];
                    $photo_by = $row["photo_by"];
					$category_id = $row["cname"];
                    $picture = $row["picture"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: ../404.html");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($conn);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: ../404.html");
        exit();
    }
												?>

							<!-- MAIN CONTENT : begin -->
							<div class="main__content">
								<div class="main__content-wrapper">
									<div class="main__content-inner">
										<div class="lsvr-container">

											<!-- POST SINGLE : begin -->
											<div class="post-single lsvr_gallery-post-page lsvr_gallery-post-single">

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
																					<a href="index.html" class="breadcrumbs__link">Home</a>
																				</li>
                                                                                <li class="breadcrumbs__item">
																					<span class="breadcrumbs__item-decor" aria-hidden="true"></span>
																					<a href="gallery-archive.html" class="breadcrumbs__link">Galerija</a>
																				</li>

																				<li class="breadcrumbs__item">
																					<span class="breadcrumbs__item-decor" aria-hidden="true"></span>
																					<a href="gallery-archive.html" class="breadcrumbs__link"><?php echo $category_id; ?></a>
																				</li>

																			</ul>
																		</nav>

																	</div>
																</div>
																<!-- BREADCRUMBS : end -->

																<h1 class="main-header__title"><?php echo $title; ?></h1>

																<!-- POST META : begin -->
																<ul class="post-meta" aria-label="Post Meta">

																	<!-- POST CATEGORY : begin -->
																	<li class="post-meta__item post-meta__item--category">
																		<span class="post__terms post__terms--category"><a href="gallery-archive.html" class="post__term-link"><?php echo $category_id; ?></a></span>
																	</li>
																	<!-- POST CATEGORY : end -->

																</ul>
																<!-- POST META : begin -->

															</div>
														</header>
														<!-- MAIN HEADER : end -->

														<div class="lsvr-grid lsvr-grid--md-reset">

															<div class="lsvr-grid__col lsvr-grid__col--span-4 lsvr-grid__col--order-2">

																<!-- POST CONTENT : begin -->
																<div class="post__content">
																	<p><?php echo $content; ?></p>
																</div>
																<!-- POST CONTENT : end -->

																<!-- POST FIELDS : begin -->
																<div class="post-fields">

																	<dl class="post-fields__list">
																		<dt class="post-fields__item-title">Fotogrāfs</dt>
																		<dd class="post-fields__item-text"><?php echo $photo_by; ?></dd>
																		<dt class="post-fields__item-title">URL</dt>
																		<dd class="post-fields__item-text"><a href="#">www.kolka.lv</a></dd>
																	</dl>

																</div>
																<!-- POST FIELDS : end -->

															</div>

															<div class="lsvr-grid__col lsvr-grid__col--span-8 lsvr-grid__col--order-1">

																<!-- POST IMAGES : begin -->
																<div class="post-images">

																	<!-- LIST : begin -->
																	<ul class="post-images__list lsvr-grid lsvr-grid--3-cols lsvr-grid--md-2-cols lsvr-grid--masonry">

																		<li class="lsvr-grid__col post-images__item">
																			<a href="<?php echo 'data:image/png;base64,' . $picture . ''; ?>" class="post-images__item-link lsvr-open-in-lightbox" title="Town photo">
																				<img class="post-images__item-img" src="<?php echo 'data:image/png;base64,' . $picture . ''; ?>" alt="Town photo">
																			</a>
																		</li>

																		<li class="lsvr-grid__col post-images__item">
																			<a href="content/gallery_detail_02.jpg" class="post-images__item-link lsvr-open-in-lightbox" title="Town photo">
																				<img class="post-images__item-img" src="<?php echo 'data:image/png;base64,' . $picture . ''; ?>" alt="Town photo">
																			</a>
																		</li>

																		<li class="lsvr-grid__col post-images__item">
																			<a href="content/gallery_detail_03.jpg" class="post-images__item-link lsvr-open-in-lightbox" title="Town photo">
																				<img class="post-images__item-img" src="<?php echo 'data:image/png;base64,' . $picture . ''; ?>" alt="Town photo">
																			</a>
																		</li>

																		<li class="lsvr-grid__col post-images__item">
																			<a href="content/gallery_detail_04.jpg" class="post-images__item-link lsvr-open-in-lightbox" title="Town photo">
																				<img class="post-images__item-img" src="<?php echo 'data:image/png;base64,' . $picture . ''; ?>" alt="Town photo">
																			</a>
																		</li>

																		<li class="lsvr-grid__col post-images__item">
																			<a href="content/gallery_detail_05.jpg" class="post-images__item-link lsvr-open-in-lightbox" title="Town photo">
																				<img class="post-images__item-img" src="<?php echo 'data:image/png;base64,' . $picture . ''; ?>" alt="Town photo">
																			</a>
																		</li>

																		<li class="lsvr-grid__col post-images__item">
																			<a href="content/gallery_detail_06.jpg" class="post-images__item-link lsvr-open-in-lightbox" title="Town photo">
																				<img class="post-images__item-img" src="<?php echo 'data:image/png;base64,' . $picture . ''; ?>" alt="Town photo">
																			</a>
																		</li>

																	</ul>
																	<!-- LIST : end -->

																</div>
																<!-- POST IMAGES : end -->

															</div>

														</div>

														<!-- POST NAVIGATION : begin -->
														<div class="post-navigation">
															<ul class="post-navigation__list">

																<!-- PREVIOUS POST : begin -->
																<li class="post-navigation__item post-navigation__item--prev">
																	<div class="post-navigation__item-inner">

																		<a href="gallery-detail.html" class="post-navigation__item-link">
																			<span class="post-navigation__item-link-label">Previous</span>
																			<span class="post-navigation__item-link-title">High-rise buildings became possible</span>
																			<span class="post-navigation__item-link-icon" aria-hidden="true"></span>
																		</a>

																	</div>
																</li>
																<!-- PREVIOUS POST : end -->

																<!-- NEXT POST : begin -->
																<li class="post-navigation__item post-navigation__item--next">
																	<div class="post-navigation__item-inner">

																		<a href="gallery-detail.html" class="post-navigation__item-link">
																			<span class="post-navigation__item-link-label">Next</span>
																			<span class="post-navigation__item-link-title">The lower floors were typically occupied</span>
																			<span class="post-navigation__item-link-icon" aria-hidden="true"></span>
																		</a>

																	</div>
																</li>
																<!-- NEXT POST : end -->

															</ul>
														</div>
														<!-- POST NAVIGATION : end -->

													</div>
												</article>
												<!-- POST : end -->

											</div>
											<!-- POST SINGLE : end -->

										</div>
									</div>
								</div>
							</div>
							<!-- MAIN CONTENT : begin -->

						</div>
					</main>
					<!-- MAIN : end -->

				</div>
			</div>
			<!-- CORE : end -->

			<?php require '../footer.html'; ?>

		</div>
		<!-- WRAPPER : end -->

		<!-- SCRIPTS : begin -->
		<script src="../assets/js/jquery-3.6.0.min.js"></script>
		<script src="../assets/js/wordbench-third-party-scripts.min.js"></script>
		<script src="../assets/js/wordbench-scripts.js"></script>
		<!-- SCRIPTS : end -->

	</body>
</html>