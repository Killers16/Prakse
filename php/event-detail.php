<!DOCTYPE html>
<html lang="en-US">
	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Event Detail | Wordbench - Municipality HTML Template</title>
        <link rel="shortcut icon" href="../images/favicon.ico">

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
			<!-- HEADER : end -->

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
                                    $sql = "SELECT * FROM events INNER JOIN ent_category ON events.category_id = ent_category.id_category WHERE id_event = ?";
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
                                                $ent_from = $row["ent_from"];
                                                $ent_to = $row["ent_to"];
                                                $ent_date_start = $row["ent_date_start"];
												$location_name = $row["location_name"];
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
									<?php 
                                                                                    $str = $row["ent_date_start"];
                                                                                    $str2 = $row["ent_from"];
                                                                                    $str3 = $row["ent_to"];
                                                                                    ?>
									<div class="main-image main-image--cropped main-image--parallax">
										<p class="main-image__inner" style="background-image: url( '<?php echo 'data:image/png;base64,' . $picture . ''; ?>' );">
											<span class="screen-reader-text"><?php echo $title; ?></span>
										</p>
									</div>
									<!-- MAIN IMAGE : end -->

									<!-- MAIN CONTENT : begin -->
									<div class="main__content">
										<div class="main__content-wrapper">
											<div class="main__content-inner">

												<!-- POST SINGLE : begin -->
												<div class="post-single lsvr_event-post-page lsvr_event-post-single">

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
																						<a href="index.html" class="breadcrumbs__link">Pasākumi</a>
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

																	<h1 class="main-header__title"><?php echo $title; ?></h1>

																	<!-- POST META : begin -->
																	<ul class="post-meta" aria-label="Post Meta">

																		<!-- POST CATEGORY : begin -->
																		<li class="post-meta__item post-meta__item--category">
																			<span class="post__terms post__terms--category">in <a href="event-archive.html" class="post__term-link"><?php echo $category_id; ?></a></span>
																		</li>
																		<!-- POST CATEGORY : end -->

																	</ul>
																	<!-- POST META : begin -->

																</div>
															</header>
															<!-- MAIN HEADER : end -->

															<!-- POST INFO : begin -->
															<div class="post-info post-info--singleday">

																<!-- POST INFO LIST : begin -->
																<ul class="post-info__list">

																	<!-- POST DATE : begin -->
																	<li class="post-info__item post-info__item--date">

																		<h3 class="post-info__item-title">Datums</h3>
																		<p class="post-info__item-text">
																			<span class="post-info__item-text-date"><?php  echo date('F j, Y', strtotime($str)); ?></span>
																		</p>

																	</li>
																	<!-- POST DATE : end -->

																	<!-- POST TIME : begin -->
																	<li class="post-info__item post-info__item--time">

																		<h3 class="post-info__item-title">Laiks</h3>
																		<p class="post-info__item-text">
																			<span class="post-info__item-text-time"><?php echo date('g:i', strtotime($str2)); ?> - <?php echo date('g:i', strtotime($str3)); ?></span>
																		</p>

																	</li>
																	<!-- POST TIME : end -->

																	<!-- POST ADDRESS : begin -->
																	<li class="post-info__item post-info__item--location" title="Event Location">

																		<h3 class="post-info__item-title"><a href="event-archive.html" class="post__location-link"><?php echo $location_name; ?></a></h3>
																		<p class="post-info__item-text"><?php echo $location_address; ?></p>


																	</li>
																	<!-- POST ADDRESS : end -->

																</ul>
																<!-- POST INFO LIST : end -->

															</div>
															<!-- POST INFO : end -->

															<!-- POST CONTENT : begin -->
															<div class="post__content">

																<p><?php echo $content; ?></p>

															</div>
															<!-- POST CONTENT : end -->

															<!-- POST MAP : begin -->
															<div class="post-map-wrapper">

																<h2 class="post-map-wrapper__title">Pasākuma lokācija</h2>

																<?php echo $maps; ?>
															</div>
															<!-- POST MAP : end -->

															

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

										<!-- LSVR EVENTS WIDGET : begin -->
										<div class="widget lsvr_event-list-widget">
											<div class="widget__inner">

												<h3 class="widget__title">Jaunākie pasākumi</h3>

												<div class="widget__content lsvr_event-list-widget__content">

													<!-- LIST : begin -->
													<ul class="lsvr_event-list-widget__list">
													<?php
													$conn = new mysqli("localhost","root","","db_kolka");
													$result2 = $conn->query("SELECT * FROM events INNER JOIN ent_category ON events.category_id = ent_category.id_category ORDER BY id_event DESC LIMIT 4");
													if (mysqli_num_rows($result2) > 0) {
														$i=0;
														while($row = mysqli_fetch_array($result2)) {
                            						?>

														<!-- LIST ITEM : begin -->
														 <?php 
                                                                                    $str = $row["ent_date_start"];
                                                                                    $str2 = $row["ent_from"];
                                                                                    $str3 = $row["ent_to"];
                                                                                    ?>
                    															
														<li class="lsvr_event-list-widget__item lsvr_event-list-widget__item--has-thumb">

															<p class="lsvr_event-list-widget__item-thumb">
																<a href="event-detail.html" class="lsvr_event-list-widget__item-thumb-link" style="background-image: url( '<?php echo 'data:image/png;base64,' . $row["picture"] . ''; ?>' );">
        						        							<span class="screen-reader-text"><?php echo $row["title"] ?></span>
        						        						</a>
        						        					</p>

        						        					<h4 class="lsvr_event-list-widget__item-title">
        						        						<a href="event-detail.html" class="lsvr_event-list-widget__item-title-link"><?php echo $row["title"] ?></a>
        						        					</h4>

        						        					<p class="lsvr_event-list-widget__item-date" title="Event Date"><?php  echo date('F j, Y', strtotime($str)); ?></p>

        						        					<p class="lsvr_event-list-widget__item-info">
        						        						<span class="lsvr_event-list-widget__item-time" title="Event Time"><?php echo date('g:i', strtotime($str2)); ?> - <?php echo date('g:i', strtotime($str3)); ?></span>
        						        						<span class="lsvr_event-list-widget__item-location" title="Event Location"><a href="event-archive.html" class="lsvr_event-list-widget__item-location-link"><?php echo $row["location_name"] ?></a></span>
        						        					</p>

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
        						        				<a href="event-archive.html" class="widget__more-link">
        						        					<span class="widget__more-link-label">More Events</span>
        						        					<span class="widget__more-link-icon" aria-hidden="true"></span>
        						        				</a>
        						        			</p>
        						        			<!-- MORE LINK : end -->

        						        		</div>

        						        	</div>
        						        </div>
        						        <!-- LSVR EVENTS WIDGET : end -->

										<!-- LSVR MENU WIDGET : begin -->
										<div class="widget lsvr-menu-widget">
											<div class="widget__inner">
												<h3 class="widget__title">Categories</h3>
												<div class="widget__content">
													<ul class="lsvr-menu-widget__list">

														<li class="lsvr-menu-widget__item">
															<a href="event-archive.html" class="lsvr-menu-widget__item-link">Exibitions</a>
														</li>

														<li class="lsvr-menu-widget__item">
															<a href="event-archive.html" class="lsvr-menu-widget__item-link">Lectures</a>
														</li>

														<li class="lsvr-menu-widget__item">
															<a href="event-archive.html" class="lsvr-menu-widget__item-link">Live Music</a>
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