<!DOCTYPE html>
<html lang="en-US">
	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listing Detail | Wordbench - Municipality HTML Template</title>
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
			<?php include_once '../database_config.php'; 
			require '../header.html';?>

			<!-- CORE : begin -->
			<div id="core">
				<div class="core__inner">

					<!-- CORE COLUMNS : begin -->
					<div class="core__columns">

						<div class="core__columns-col core__columns-col--left core__columns-col--main">

						<?php
												 // Check existence of id parameter before processing further
                                if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
                                    // Get URL parameter
                                    $id =  trim($_GET["id"]);
                                    
                                    // Prepare a select statement
                                    $sql = "SELECT * FROM activities INNER JOIN act_category ON activities.category_id = act_category.id_category WHERE id_activities = ?";
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
                                                
												$aname = $row["aname"];
												$opened_at = $row["opened_at"];
												$closed_at = $row["closed_at"];
												$content = $row["content"];
												$number = $row["phone"];
												$email = $row["email"];
												$link = $row["link"];
												$location_address = $row["location_address"];
												$picture = $row["picture"];
												$maps = $row["maps"];
                                                $category_id = $row["cname"];
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

							<!-- MAIN : begin -->
							<main id="main">
								<div class="main__inner">

									<!-- MAIN IMAGE : begin -->
									<div class="main-image main-image--cropped main-image--parallax">
										<p class="main-image__inner" style="background-image: url( '<?php echo 'data:image/png;base64,' . $picture . ''; ?>' );">
											<span class="screen-reader-text"><?php echo $aname; ?></span>
										</p>
									</div>
									<!-- MAIN IMAGE : end -->

									<!-- MAIN CONTENT : begin -->
									<div class="main__content">
										<div class="main__content-wrapper">
											<div class="main__content-inner">

												<!-- POST SINGLE : begin -->
												<div class="post-single lsvr_listing-post-page lsvr_listing-post-single">

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
																						<a href="listing-archive.html" class="breadcrumbs__link">Vietas</a>
																					</li>

																					<li class="breadcrumbs__item">
																						<span class="breadcrumbs__item-decor" aria-hidden="true"></span>
																						<a href="event-archive.html" class="breadcrumbs__link"><?php echo $category_id; ?></a>
																					</li>

																				</ul>
																			</nav>

																		</div>
																	</div>
																	<!-- BREADCRUMBS : end -->

																	<h1 class="main-header__title"><?php echo $aname; ?></h1>

																	<!-- POST META : begin -->
																	<ul class="post-meta" aria-label="Post Meta">

																		<!-- POST CATEGORY : begin -->
																		<li class="post-meta__item post-meta__item--category">
																			<span class="post__terms post__terms--category">in <a href="listing-archive.html" class="post__term-link"><?php echo $category_id; ?></a></span>
																		</li>
																		<!-- POST CATEGORY : end -->

																	</ul>
																	<!-- POST META : begin -->

																</div>
															</header>
															<!-- MAIN HEADER : end -->

															<!-- POST CONTENT : begin -->
															<div class="post__content">
																<p><?php echo $content; ?></p>
															</div>
															<!-- POST CONTENT : end -->

															<div class="lsvr-grid lsvr-grid--md-reset">

																<div class="lsvr-grid__col lsvr-grid__col--span-6">

																	<!-- POST CONTACT INFO : begin -->
																	<div class="post-contact-info">

																		<h2 class="post-contact-info__title">Kontakti</h2>

																		<!-- POST ADDRESS : begin -->
																		<div class="post-contact-info__address">
																			<p><?php echo $location_address; ?></p>
																		</div>
																		<!-- POST ADDRESS : end -->

																		<!-- POST CONTACT : begin -->
																		<div class="post-contact">

																			<!-- CONTACT LIST : begin -->
																			<ul class="post-contact__list">

																				<li class="post-contact__item post-contact__item--phone" title="Phone">
																					<span class="post-contact__item-icon post-contact__item-icon--phone" aria-hidden="true"></span>
																					<a href="tel:<?php echo $number; ?>"><?php echo $number; ?></a>
																				</li>

																				<li class="post-contact__item post-contact__item--email" title="Email">
																					<span class="post-contact__item-icon post-contact__item-icon--email" aria-hidden="true"></span>
																					<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
																				</li>

																				<li class="post-contact__item post-contact__item--website" title="Website">
																					<span class="post-contact__item-icon post-contact__item-icon--website" aria-hidden="true"></span>
																					<a href="<?php echo $link; ?>" target="_blank"><?php echo $link; ?></a>
																				</li>

																			</ul>
																			<!-- CONTACT LIST : end -->

																		</div>
																		<!-- POST CONTACT : end -->

																		<!-- POST SOCIAL : begin -->
																		<div class="post-social">

																			<!-- SOCIAL LINKS : begin -->
																			<ul class="post-social__list" aria-label="Social Media Links">

																				<li class="post-social__item">
																					<a href="#facebook" class="post-social__item-link" target="_blank" title="Facebook">
																						<span class="post-social__item-icon lsvr-icon-facebook" aria-hidden="true">
																							<span class="screen-reader-text">Facebook</span>
																						</span>
																					</a>
																				</li>

																				<li class="post-social__item">
																					<a href="#instagram" class="post-social__item-link" target="_blank" title="Instagram">
																						<span class="post-social__item-icon lsvr-icon-instagram" aria-hidden="true">
																							<span class="screen-reader-text">Instagram</span>
																						</span>
																					</a>
																				</li>

																				<li class="post-social__item">
																					<a href="#yelp" class="post-social__item-link" target="_blank" title="Yelp">
																						<span class="post-social__item-icon lsvr-icon-yelp" aria-hidden="true">
																							<span class="screen-reader-text">Yelp</span>
																						</span>
																					</a>
																				</li>

																			</ul>
																			<!-- SOCIAL LINKS : end -->

																		</div>
																		<!-- POST SOCIAL : end -->

																	</div>
																	<!-- POST CONTACT INFO : end -->

																</div>

																<div class="lsvr-grid__col lsvr-grid__col--span-6">

																	<!-- OPENING HOURS : begin -->
																	<div class="post-hours">

																		<h2 class="post-hours__title">Darba laiks</h2>

																		<!-- HOURS LIST : begin -->
																		<ul class="post-hours__list">

																			<li class="post-hours__item post-hours__item--mon">
																				<div class="post-hours__item-day">Monday</div>
																				<div class="post-hours__item-value">
																					<span class="post-hours__item-value-from-to">
																						<span class="post-hours__item-value-from"><?php echo $opened_at; ?></span>
																						-
																						<span class="post-hours__item-value-to"><?php echo $closed_at; ?></span>
																					</span>
																				</div>
																			</li>

																			<li class="post-hours__item post-hours__item--tue">
																				<div class="post-hours__item-day">Tuesday</div>
																				<div class="post-hours__item-value">
																					<span class="post-hours__item-value-from-to">
																						<span class="post-hours__item-value-from">2:00 pm</span>
																						-
																						<span class="post-hours__item-value-to">8:00 pm</span>
																					</span>
																				</div>
																			</li>

																			<li class="post-hours__item post-hours__item--wed">
																				<div class="post-hours__item-day">Wednesday</div>
																				<div class="post-hours__item-value">Closed</div>
																			</li>

																			<li class="post-hours__item post-hours__item--thu">
																				<div class="post-hours__item-day">Thursday</div>
																				<div class="post-hours__item-value">
																					<span class="post-hours__item-value-from-to">
																						<span class="post-hours__item-value-from">11:00 am</span>
																						-
																						<span class="post-hours__item-value-to">2:00 pm</span>
																					</span>
																					<span class="post-hours__item-value-from-to">
																						<span class="post-hours__item-value-from">6:00 pm</span>
																						-
																						<span class="post-hours__item-value-to">10:00 pm</span>
																					</span>
																				</div>
																			</li>

																			<li class="post-hours__item post-hours__item--fri">
																				<div class="post-hours__item-day">Friday</div>
																				<div class="post-hours__item-value">
																					<span class="post-hours__item-value-from-to">
																						<span class="post-hours__item-value-from">4:00 pm</span>
																						-
																						<span class="post-hours__item-value-to">10:00 pm</span>
																					</span>
																				</div>
																			</li>

																			<li class="post-hours__item post-hours__item--sat">
																				<div class="post-hours__item-day">Saturday</div>
																				<div class="post-hours__item-value">
																					<span class="post-hours__item-value-from-to">
																						<span class="post-hours__item-value-from">12:00 pm</span>
																						-
																						<span class="post-hours__item-value-to">4:00 pm</span>
																					</span>
																				</div>
																			</li>

																			<li class="post-hours__item post-hours__item--sun">
																				<div class="post-hours__item-day">Sunday</div>
																				<div class="post-hours__item-value">Closed</div>
																			</li>

																		</ul>
																		<!-- HOURS LIST : end -->

																	</div>
																	<!-- OPENING HOURS : end -->

																</div>

															</div>

															<!-- POST MAP : begin -->
															<div class="post-map-wrapper">
															<?php echo $maps; ?>
															</div>
															<!-- POST MAP : end -->

															<!-- POST NAVIGATION : begin -->
															<div class="post-navigation">
																<ul class="post-navigation__list">

																	<!-- PREVIOUS POST : begin -->
																	<li class="post-navigation__item post-navigation__item--prev">
																		<div class="post-navigation__item-inner">

																			<a href="listing-detail.html" class="post-navigation__item-link">
																				<span class="post-navigation__item-link-label">Previous</span>
																				<span class="post-navigation__item-link-title">Heavenly Creations</span>
																				<span class="post-navigation__item-link-icon" aria-hidden="true"></span>
																			</a>

																		</div>
																	</li>
																	<!-- PREVIOUS POST : end -->

																	<!-- NEXT POST : begin -->
																	<li class="post-navigation__item post-navigation__item--next">
																		<div class="post-navigation__item-inner">

																			<a href="listing-detail.html" class="post-navigation__item-link">
																				<span class="post-navigation__item-link-label">Next</span>
																				<span class="post-navigation__item-link-title">Bobby’s</span>
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

										<!-- LSVR DIRECTORY WIDGET : begin -->
										<div class="widget lsvr_listing-list-widget">
											<div class="widget__inner">

												<h3 class="widget__title">Citas vietas, kuras aplūkot</h3>

												<div class="widget__content lsvr_listing-list-widget__content">

													<!-- LIST : begin -->
													<ul class="lsvr_listing-list-widget__list">
													<?php
													$conn = new mysqli("localhost","root","","db_kolka");
													$result2 = $conn->query("SELECT * FROM activities INNER JOIN act_category ON activities.category_id = act_category.id_category ORDER BY id_activities DESC LIMIT 4");
													if (mysqli_num_rows($result2) > 0) {
														$i=0;
														while($row = mysqli_fetch_array($result2)) {
                            						?>
														<!-- LIST ITEM : begin -->
														<li class="lsvr_listing-list-widget__item lsvr_listing-list-widget__item--has-thumb">

															<p class="lsvr_listing-list-widget__item-thumb">
																<a href="listing-detail.html" class="lsvr_listing-list-widget__item-thumb-link" style="background-image: url( '<?php echo 'data:image/png;base64,' . $row["picture"] . ''; ?>' );">
        						        							<span class="screen-reader-text"><?php echo $row["aname"] ?></span>
        						        						</a>
        						        					</p>

        						        					<div class="lsvr_listing-list-widget__item-content">

        						        						<p class="lsvr_listing-list-widget__item-category" title="Category">
        						        							<a href="listing-archive.html" class="lsvr_listing-list-widget__item-category-link"><?php echo $row["cname"] ?></a>
        						        						</p>

        						        						<h4 class="lsvr_listing-list-widget__item-title">
        						        							<a href="listing-detail.html" class="lsvr_listing-list-widget__item-title-link"><?php echo $row["aname"] ?></a>
        						        						</h4>

        						        						<p class="lsvr_listing-list-widget__item-address" title="Address"><?php echo $row["location_address"] ?></p>

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
        						        				<a href="listing-archive.html" class="widget__more-link">
        						        					<span class="widget__more-link-label">Vairāk vietu</span>
        						        					<span class="widget__more-link-icon" aria-hidden="true"></span>
        						        				</a>
        						        			</p>
        						        			<!-- MORE LINK : end -->

        						        		</div>

        						        	</div>
        						        </div>
        						        <!-- LSVR DIRECTORY WIDGET : end -->

										<!-- LSVR MENU WIDGET : begin -->
										<div class="widget lsvr-menu-widget">
											<div class="widget__inner">
												<h3 class="widget__title">Categories</h3>
												<div class="widget__content">
													<ul class="lsvr-menu-widget__list">

														<li class="lsvr-menu-widget__item">
															<a href="event-archive.html" class="lsvr-menu-widget__item-link">Bakeries</a>
														</li>

														<li class="lsvr-menu-widget__item">
															<a href="event-archive.html" class="lsvr-menu-widget__item-link">Pubs</a>
														</li>

														<li class="lsvr-menu-widget__item">
															<a href="event-archive.html" class="lsvr-menu-widget__item-link">Live Restaurants</a>
														</li>

													</ul>
												</div>
											</div>
										</div>
										<!-- LSVR MENU WIDGET : end -->

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