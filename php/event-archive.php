<!DOCTYPE html>
<html lang="en-US">
	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Event Archive | Wordbench - Municipality HTML Template</title>
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

					<!-- MAIN : begin -->
					<main id="main">
						<div class="main__inner">

							<!-- MAIN CONTENT : begin -->
							<div class="main__content">
								<div class="main__content-wrapper">
									<div class="main__content-inner">

										<div class="lsvr-container">

											<!-- POST ARCHIVE : begin -->
											<div class="post-archive lsvr_event-post-page lsvr_event-post-archive lsvr_event-post-archive--grid lsvr_event-post-archive--layout-style-dark">

												<!-- MAIN HEADER : begin -->
												<header class="main-header">
													<div class="main-header__inner">

														<h1 class="main-header__title">Pasākumi</h1>

														<div class="main-header__subtitle">
															<p>Event management is the application of project management to the creation and development of small and/or large-scale personal or corporate events.</p>
														</div>

														<!-- POST ARCHIVE CATEGORIES : begin -->
														<nav class="post-archive-categories" title="Categories">
															<span class="post-archive-categories__icon" aria-hidden="true"></span>

															<!-- CATEGORIES LIST : begin -->
															<ul class="post-archive-categories__list">

																<li class="post-archive-categories__item post-archive-categories__item--all">
																	<a href="event-archive.html" class="post-archive-categories__item-link post-archive-categories__item-link--active">All</a>
																</li>

																<li class="post-archive-categories__item post-archive-categories__item--category">
																	<a href="event-archive.html" class="post-archive-categories__item-link">Exibitions</a>
																</li>

																<li class="post-archive-categories__item post-archive-categories__item--category">
																	<a href="event-archive.html" class="post-archive-categories__item-link">Lectures</a>
																</li>

																<li class="post-archive-categories__item post-archive-categories__item--category">
																	<a href="event-archive.html" class="post-archive-categories__item-link">Live Music</a>
																</li>

															</ul>
															<!-- CATEGORIES LIST : end -->

														</nav>
														<!-- POST ARCHIVE CATEGORIES : end -->

													</div>
                                                    <?php
												if (isset($_GET['page_no']) && $_GET['page_no']!="") {
												$page_no = $_GET['page_no'];
												} else {
													$page_no = 1;
													}

													$total_records_per_page = 9;
													$offset = ($page_no-1) * $total_records_per_page;
													$previous_page = $page_no - 1;
													$next_page = $page_no + 1;
													$adjacents = "2";

													$result_count = mysqli_query(
														$conn,
														"SELECT COUNT(*) As total_records FROM `events`"
														);
														$total_records = mysqli_fetch_array($result_count);
														$total_records = $total_records['total_records'];
														$total_no_of_pages = ceil($total_records / $total_records_per_page);
														$second_last = $total_no_of_pages - 1; // total pages minus 1
													
                               						 $result = mysqli_query($conn,"SELECT * FROM events INNER JOIN ent_category ON events.category_id = ent_category.id_category LIMIT $offset, $total_records_per_page");
                                					 if (mysqli_num_rows($result) > 0) {
                            						?>
												</header>
												<!-- MAIN HEADER : end -->

												<!-- POST ARCHIVE LIST : begin -->
												<div class="post-archive__list lsvr-grid lsvr-grid--sm-reset lsvr-grid--3-cols lsvr-grid--md-2-cols lsvr-grid--masonry">
                                                <?php
                               							 $i=0;
                               							 while($row = mysqli_fetch_array($result)) {
                           								 ?>
													<!-- LIST ITEM : begin -->
													<div class="post-archive__item lsvr-grid__col">

														<!-- POST : begin -->
														<article class="post post--has-thumbnail">
															<div class="post__inner">

																<!-- POST THUMBNAIL : begin -->
																<p class="post__thumbnail post__thumbnail--cropped">
																	<a href="event-detail.html" class="post__thumbnail-link post__thumbnail-link--cropped" style="background-image: url( '<?php echo 'data:image/png;base64,' . $row["picture"] . ''; ?>' );">
																		<span class="screen-reader-text"><?php echo $row["title"] ?></span>
																	</a>
																</p>
																<!-- POST THUMBNAIL : end -->

																<!-- POST CONTAINER : begin -->
																<div class="post__container">

																	<!-- POST INFO : begin -->
																	<div class="post-info">

																		<!-- POST DATE : begin -->
																		
																		<!-- POST DATE : end -->

																		<!-- POST CATEGORIES : begin -->
																		<p class="post__categories" title="Category">
																			<span class="post__terms post__terms--lsvr_event_cat">
																				<a href="event-archive.html" class="post__term-link"><?php echo $row["cname"] ?></a>
																			</span>
																		</p>
																		<!-- POST CATEGORIES : end -->

																		<!-- POST TITLE : begin -->
																		<h3 class="post__title">
																			<a href="event-detail.php?id=<?php echo $row["id_event"] ?>" class="post__title-link" rel="bookmark"><?php echo $row["title"] ?></a>
																		</h3>
																		<!-- POST TITLE : end -->

																		<!-- POST TIME AND LOCATION : begin -->
																		<p class="post-info__time-location">
																			<span class="post-info__time" title="Event Time"><?php echo $row["ent_from"] ?> - <?php echo $row["ent_to"] ?></span>
																			<span class="post-info__location" title="Event Location"><a href="" class="post__location-link"><?php echo $row["location_name"] ?></a></span>
																		</p>
																		<!-- POST TIME AND LOCATION : end -->

																	</div>
																	<!-- POST INFO : end -->

																</div>
																<!-- POST CONTAINER : end -->

															</div>
														</article>
														<!-- POST : end -->

													</div>
													<!-- LIST ITEM : end -->
                                                    <?php
                               							 $i++;} ?>
                                                    <?php
                                                        }
                                                        else{
                                                        echo "No result found";
                                                        }
                                                    ?>              
													</div>
													<!-- LIST ITEM : end -->

												</div>
												<!-- POST ARCHIVE LIST : end -->

												<!-- PAGINATION : begin -->
												<nav class="post-pagination">
													<h6 class="screen-reader-text">Posts navigation</h6>
													<ul class="post-pagination__list">
													 	
														<li class=" post-pagination__item post-pagination__item--prev">
															<a  <?php if($page_no > 1){
															echo "href='?page_no=$previous_page'";
															} ?> class="post-pagination__item-link">Previous</a>
														</li>

														<?php
															if ($total_no_of_pages <= 10){  	 
															for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
															if ($counter == $page_no) {
															echo "<li class='post-pagination__item post-pagination__item--number post-pagination__item--active'><a class='post-pagination__item-link'>$counter</a></li>";	
																	}else{
																echo "<li class='post-pagination__item post-pagination__item--number'><a href='?page_no=$counter' class='post-pagination__item-link'>$counter</a></li>";
																		}
																}
														}
														elseif ($total_no_of_pages > 10){
															if($page_no <= 4) {			
																for ($counter = 1; $counter < 8; $counter++){		 
																   if ($counter == $page_no) {
																	echo "<li class='post-pagination__item post-pagination__item--number post-pagination__item--active'><a class='post-pagination__item-link'>$counter</a></li>";		
																	   }else{
																		echo "<li class='post-pagination__item post-pagination__item--number'><a href='?page_no=$counter' class='post-pagination__item-link'>$counter</a></li>";
																			   }
															   }
															   echo "<li class='post-pagination__item post-pagination__item--number'><a class='post-pagination__item-link'>...</a></li>";
															   echo "<li class='post-pagination__item post-pagination__item--number'><a href='?page_no=$second_last' class='post-pagination__item-link'>$second_last</a></li>";
															   echo "<li class='post-pagination__item post-pagination__item--number'><a href='?page_no=$total_no_of_pages' class='post-pagination__item-link'>$total_no_of_pages</a></li>";
															   }
															elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
																echo "<li class='post-pagination__item post-pagination__item--number'><a href='?page_no=1' class='post-pagination__item-link'>1</a></li>";
															   echo "<li class='post-pagination__item post-pagination__item--number'><a href='?page_no=2' class='post-pagination__item-link'>2</a></li>";
															   echo "<li class='post-pagination__item post-pagination__item--number'><a class='post-pagination__item-link'>...</a></li>";
																for (
																	 $counter = $page_no - $adjacents;
																	 $counter <= $page_no + $adjacents;
																	 $counter++
																	 ) {		
																	 if ($counter == $page_no) {
																		echo "<li class='post-pagination__item post-pagination__item--number post-pagination__item--active'><a class='post-pagination__item-link'>$counter</a></li>";		
																	}else{
																	 echo "<li class='post-pagination__item post-pagination__item--number'><a href='?page_no=$counter' class='post-pagination__item-link'>$counter</a></li>";
																			}               
																	   }
																	   echo "<li class='post-pagination__item post-pagination__item--number'><a class='post-pagination__item-link'>...</a></li>";
																echo "<li class='post-pagination__item post-pagination__item--number'><a href='?page_no=$second_last' class='post-pagination__item-link'>$second_last</a></li>";
																echo "<li class='post-pagination__item post-pagination__item--number'><a href='?page_no=$total_no_of_pages' class='post-pagination__item-link'>$total_no_of_pages</a></li>";
																}
																else {
																	echo "<li class='post-pagination__item post-pagination__item--number'><a href='?page_no=1' class='post-pagination__item-link'>1</a></li>";
															   echo "<li class='post-pagination__item post-pagination__item--number'><a href='?page_no=2' class='post-pagination__item-link'>2</a></li>";
															   echo "<li class='post-pagination__item post-pagination__item--number'><a class='post-pagination__item-link'>...</a></li>";
																	for (
																		 $counter = $total_no_of_pages - 6;
																		 $counter <= $total_no_of_pages;
																		 $counter++
																		 ) {
																		 if ($counter == $page_no) {
																			echo "<li class='post-pagination__item post-pagination__item--number post-pagination__item--active'><a class='post-pagination__item-link'>$counter</a></li>";		
																		}else{
																		 echo "<li class='post-pagination__item post-pagination__item--number'><a href='?page_no=$counter' class='post-pagination__item-link'>$counter</a></li>";
																				}                    
																		 }
																		}
																	}
														?>
														
														<li class=" post-pagination__item post-pagination__item--next">
															<a <?php if($page_no < $total_no_of_pages) {
															echo "href='?page_no=$next_page'";
															} ?> class="post-pagination__item-link">Next</a>
														</li>
													
													</ul>

												</nav>
												<!-- PAGINATION : end -->

											</div>
											<!-- POST ARCHIVE : end -->

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
			<!-- FOOTER : end -->

		</div>
		<!-- WRAPPER : end -->

		<!-- SCRIPTS : begin -->
		<script src="../assets/js/jquery-3.6.0.min.js"></script>
		<script src="../assets/js/wordbench-third-party-scripts.min.js"></script>
		<script src="../assets/js/wordbench-scripts.js"></script>
		<!-- SCRIPTS : end -->

	</body>
</html>