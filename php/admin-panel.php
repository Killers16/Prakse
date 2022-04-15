<!DOCTYPE html>
<html lang="en-US">
  <!-- STYLESHEETS : begin -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->
	<head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../images/favicon.ico">

        <!-- STYLESHEETS : begin -->
		<link rel="stylesheet" type="text/css" href="../assets/css/general.css"><!-- Default styles generated from assets/scss/general.scss (do not edit) -->
        <link rel="stylesheet" type="text/css" href="../assets/css/color-schemes/default.css"><!-- Default color scheme generated from assets/scss/color-schemes/default.scss (change to other pre-defined or custom color scheme) -->
		<link rel="stylesheet" type="text/css" href="../style.css"><!-- Place your own CSS into this file -->
		<!-- STYLESHEETS : end -->
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Galvenā lapa | Kolka</title>
        <link rel="shortcut icon" href="../images/favicon.ico">
        
          <link rel="stylesheet" type="text/css" href="../assets/css/panel.css">
          <link rel="stylesheet" type="text/css" href="../assets/css/sidebar.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
            <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
        </head>
        <body>
        <?php
                            include_once '../database_config.php';?>
        <div class="sidebar-container">
  <div class="sidebar-logo">
    Admin Kolka
  </div>
  <ul class="sidebar-navigation">
    <li class="header">Navigācija</li>
    <li>
      <a href="../index.html">
        <i class="fa fa-home" aria-hidden="true"></i> Mājas
      </a>
    </li>
    <li class="header">Modificēšanas opcijas</li>
    <li>
      <a onclick="openTab(event, 'paragraph-container')" class="tablink2">
        <i class="fa fa-cog" aria-hidden="true"></i> Paragrāfi
      </a>
    </li>
    <li>
      <a onclick="openTab(event, 'activities-container')" class="tablink2">
        <i class="fa fa-cog" aria-hidden="true"></i> Vietas
      </a>
    </li>
    <li>
      <a onclick="openTab(event, 'documents-container')" class="tablink2">
        <i class="fa fa-cog" aria-hidden="true"></i> Dokumenti
      </a>
    </li>
    <li>
      <a onclick="openTab(event, 'events-container')" class="tablink2">
        <i class="fa fa-cog" aria-hidden="true"></i> Pasākumi
      </a>
    </li>
    <li>
      <a onclick="openTab(event, 'gallery-container')" class="tablink2">
        <i class="fa fa-cog" aria-hidden="true"></i> Galerija
      </a>
    </li>
    <li>
      <a onclick="openTab(event, 'category-container')" class="tablink2">
        <i class="fa fa-cog" aria-hidden="true"></i> Paragrāfu Kategorijas
      </a>
    </li>
    <li>
      <a onclick="openTab(event, 'act-container')" class="tablink2">
        <i class="fa fa-cog" aria-hidden="true"></i> Vietu Kategorijas
      </a>
    </li>
    <li>
      <a onclick="openTab(event, 'doc-container')" class="tablink2">
        <i class="fa fa-cog" aria-hidden="true"></i> Dokumentu Kategorijas
      </a>
    </li>
    <li>
      <a onclick="openTab(event, 'ent-container')" class="tablink2">
        <i class="fa fa-cog" aria-hidden="true"></i> Pasākumu Kategorijas
      </a>
    </li>
    <li>
      <a onclick="openTab(event, 'gal-container')" class="tablink2">
        <i class="fa fa-cog" aria-hidden="true"></i> Galerijas Kategorijas
      </a>
    </li>
  </ul>
</div>

<div class="content-container">

  <div class="container-fluid">

    <div class="jumbotron">
        <!-- Paragraph container start-->
    <div class="container tab" id="paragraph-container" style="display: block;">
              <div class="title">
                <h3>Paragrāfi</h3>
              </div>
              <div class="row">
                   
                    <div class="col-lg-30 col-md-30 ml-auto mr-auto">
                        <div class="table-responsive">
                            <a type="button" rel="tooltip" class="btn btn-info btn-sm" data-original-title="" title="" href="crud/add-paragraph.php">
                                <i class="">Pievienot Paragrāfu</i>
                            </a>
                            <?php
                                $result = mysqli_query($conn,"SELECT * FROM blogs INNER JOIN blg_category ON blogs.category_id = blg_category.id_category ORDER BY id_blogs ASC");
                            ?>
                            <?php
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Virsraksts</th>
                                    <th class="text-center">Paragrāfs</th>
                                    <th class="text-center">Raksta autors</th>
                                    <th class="text-center">Kategorija</th>
                                    <th class="text-center">Attēls</th>
                                    <th class="text-center">Publicēšanas laiks</th>
                                    <th class="text-right">Konfigurācija</th>
                                </tr>
                            </thead>
                            <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" value=""><?php echo $row["id_blogs"]; ?></td>
                                    <td><p class="line-limit"><?php echo $row["title"]; ?></p></td>
                                    <td><p class="line-limit"><?php echo $row["content"]; ?></p></td>
                                    <td><p class="text-center"><?php echo $row["blog_author"]; ?></p></td>
                                    <td><p class="text-center"><?php echo $row["cname"]; ?></p></td>
                                    <td class="text-center"><?php echo '<img height="100px" width="100px" src="data:image/png;base64,' . $row['picture'] . '" />'; ?></td>
                                    <td class="text-center"><?php echo $row["created_at"]; ?></td>
                                    <td class="td-actions text-right">
                                    <a href="blog-detail.php?id=<?php echo $row["id_blogs"] ?>" type="button" rel="tooltip" class="btn btn-info btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        <a href="crud/edit-paragraph.php?id=<?php echo $row["id_blogs"] ?>" type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="crud/delete-paragraph.php?id=<?php echo $row["id_blogs"] ?>" type="button" rel="tooltip" name="deleteBlog" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons" >delete</i>
                                        </a>
                                    </td>
                                  </tr>
                            </tbody>
                            <?php
                                $i++;
                                }
                            ?>
                        </table>
                        <?php
                            }
                            else{
                            echo "No result found";
                            }
                        ?>
                    </div>
                 </div>
                 </div>
    </div>
<!-- Paragraph container end-->

<!-- Activitie container start-->
    <div class="container tab" id="activities-container" style="display: none;">
              <div class="title">
                <h3>Vietas</h3>
              </div>
              <div class="row">
                   
                    <div class="col-lg-16 col-md-10 ml-auto mr-auto">
                        <div class="table-responsive">
                            <a type="button" rel="tooltip" class="btn btn-info btn-sm" data-original-title="" title="" href="crud/add-activitie.php">
                                <i class="">Pievienot Vietu</i>
                            </a>
                            <?php
                                $result = mysqli_query($conn,"SELECT * FROM activities INNER JOIN act_category ON activities.category_id = act_category.id_category ORDER BY id_activities ASC");
                            ?>
                            <?php
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nosaukums</th>
                                    <th class="text-center">Atvērts plkst.</th>
                                    <th class="text-center">Aizvērts plkst.</th>
                                    <th class="text-center">Informācija</th>
                                    <th class="text-center">Attēls</th>
                                    <th class="text-center">Kategorija</th>
                                    <th class="text-right">Opcijas</th>
                                </tr>
                            </thead>
                            <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" value=""><?php echo $row["id_activities"]; ?></td>
                                    <td><?php echo $row["aname"]; ?></td>
                                    <td><p class="text-center"><?php echo $row["opened_at"]; ?></p></td>
                                    <td><p class="text-center"><?php echo $row["closed_at"]; ?></p></td>
                                    <td><p class="line-limit"><?php echo $row["content"]; ?></p></td>
                                    <td class="text-center"><?php echo '<img height="100px" width="100px" src="data:image/png;base64,' . $row['picture'] . '" />'; ?></td>
                                    <td><p class="text-center"><?php echo $row["cname"]; ?></p></td>
                                    <td class="td-actions text-right">
                                        <a href="crud/edit-activitie.php?id=<?php echo $row["id_activities"] ?>" type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="crud/delete-activitie.php?id=<?php echo $row["id_activities"] ?>" type="button" rel="tooltip" name="deleteBlog" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons" >delete</i>
                                        </a>
                                    </td>
                                  </tr>
                            </tbody>
                            <?php
                                $i++;
                                }
                            ?>
                        </table>
                        <?php
                            }
                            else{
                            echo "No result found";
                            }
                        ?>
                    </div>
                 </div>
    </div>
                        </div>
    <!-- Activitie container end-->

    <!-- Document container start-->
    <div class="container tab" id="documents-container" style="display: none;">
              <div class="title">
                <h3>Dokumenti</h3>
              </div>
              <div class="row">
                   
                    <div class="col-lg-16 col-md-10 ml-auto mr-auto">
                        <div class="table-responsive">
                            <a type="button" rel="tooltip" class="btn btn-info btn-sm" data-original-title="" title="" href="crud/add-document.php">
                                <i class="">Pievienot Dokumentu</i>
                            </a>
                            <?php
                                $result = mysqli_query($conn,"SELECT * FROM documents INNER JOIN doc_category ON documents.category_id = doc_category.id_category ORDER BY id_doc ASC");
                            ?>
                            <?php
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Virsraksts</th>
                                    <th class="text-center">Informācija</th>
                                    <th class="text-center">Publicēšanas laiks</th>
                                    <th class="text-center">Fails</th>
                                    <th class="text-center">Kategorija</th>
                                    <th class="text-right">Opcijas</th>
                                </tr>
                            </thead>
                            <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" value=""><?php echo $row["id_doc"]; ?></td>
                                    <td><?php echo $row["title"]; ?></td>
                                    <td><p class="line-limit"><?php echo $row["content"]; ?></p></td>
                                    <td class="text-center"><?php echo $row["created_at"]; ?></td>
                                    <td class="text-center"><?php echo $row["file_name"]; ?></td>
                                    <td><p class="text-center"><?php echo $row["cname"]; ?></p></td>
                                    <td class="td-actions text-right">
                                        <a href="crud/edit-activitie.php?id=<?php echo $row["id_doc"] ?>" type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="crud/delete-activitie.php?id=<?php echo $row["id_doc"] ?>" type="button" rel="tooltip" name="deleteBlog" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons" >delete</i>
                                        </a>
                                    </td>
                                  </tr>
                            </tbody>
                            <?php
                                $i++;
                                }
                            ?>
                        </table>
                        <?php
                            }
                            else{
                            echo "No result found";
                            }
                        ?>
                    </div>
                 </div>
    </div>
                        </div>
    <!-- Document container end-->

     <!-- EVENT container start-->
     <div class="container tab" id="events-container" style="display: none;">
              <div class="title">
                <h3>Pasākumi</h3>
              </div>
              <div class="row">
                   
                    <div class="col-lg-20 col-md-20 ml-auto mr-auto">
                        <div class="table-responsive">
                            <a type="button" rel="tooltip" class="btn btn-info btn-sm" data-original-title="" title="" href="crud/add-event.php">
                                <i class="">Pievienot Pasākumu</i>
                            </a>
                            <?php
                                $result = mysqli_query($conn,"SELECT * FROM events INNER JOIN ent_category ON events.category_id = ent_category.id_category ORDER BY id_event ASC");
                            ?>
                            <?php
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nosaukums</th>
                                    <th class="text-center">Informācija</th>
                                    <th class="text-center">Sākuma laiks</th>
                                    <th class="text-center">Beigu laiks</th>
                                    <th class="text-center">Sākumaa datums</th>
                                    <th class="text-center">Lokācijas Nosaukums</th>
                                    <th class="text-center">Adrese</th>
                                    <th class="text-center">Attēls</th>
                                    <th class="text-center">Kategorija</th>
                                    <th class="text-right">Opcijas</th>
                                </tr>
                            </thead>
                            <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" value=""><?php echo $row["id_event"]; ?></td>
                                    <td><?php echo $row["title"]; ?></td>
                                    <td><p class="line-limit"><?php echo $row["content"]; ?></p></td>
                                    <td class="text-center"><?php echo $row["ent_from"]; ?></td>
                                    <td class="text-center"><?php echo $row["ent_to"]; ?></td>
                                    <td class="text-center"><?php echo $row["ent_date_start"]; ?></td>
                                    <td><p class="text-center"><?php echo $row["location_name"]; ?></p></td>
                                    <td><p class="line-limit"><?php echo $row["location_address"]; ?></p></td>
                                    <td class="text-center"><?php echo '<img height="100px" width="100px" src="data:image/png;base64,' . $row['picture'] . '" />'; ?></td>
                                    <td><p class="text-center"><?php echo $row["cname"]; ?></p></td>
                                    <td class="td-actions text-right">
                                        <a href="crud/edit-event.php?id=<?php echo $row["id_event"] ?>" type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="crud/delete-event.php?id=<?php echo $row["id_event"] ?>" type="button" rel="tooltip" name="deleteBlog" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons" >delete</i>
                                        </a>
                                    </td>
                                  </tr>
                            </tbody>
                            <?php
                                $i++;
                                }
                            ?>
                        </table>
                        <?php
                            }
                            else{
                            echo "No result found";
                            }
                        ?>
                    </div>
                 </div>
    </div>
                        </div>
    <!-- EVENT container end-->

    <!-- Gallery container start-->
    <div class="container tab" id="gallery-container" style="display: none;">
              <div class="title">
                <h3>Galerija</h3>
              </div>
              <div class="row">
                   
                    <div class="col-lg-16 col-md-10 ml-auto mr-auto">
                        <div class="table-responsive">
                            <a type="button" rel="tooltip" class="btn btn-info btn-sm" data-original-title="" title="" href="crud/add-gallery.php">
                                <i class="">Pievienot Galeriju</i>
                            </a>
                            <?php
                                $result = mysqli_query($conn,"SELECT * FROM gallery INNER JOIN gal_category ON gallery.category_id = gal_category.id_category ORDER BY id_gal ASC");
                            ?>
                            <?php
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nosaukums</th>
                                    <th class="text-center">Informācija</th>
                                    <th class="text-center">Fotogrāffs</th>
                                    <th class="text-center">Attēls</th>
                                    <th class="text-center">Kategorija</th>
                                    <th class="text-right">Opcijas</th>
                                </tr>
                            </thead>
                            <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" value=""><?php echo $row["id_gal"]; ?></td>
                                    <td><?php echo $row["title"]; ?></td>
                                    <td><p class="line-limit"><?php echo $row["content"]; ?></p></td>
                                    <td class="text-center"><?php echo $row["photo_by"]; ?></td>
                                    <td class="text-center"><?php echo '<img height="100px" width="100px" src="data:image/png;base64,' . $row['picture'] . '" />'; ?></td>
                                    <td><p class="text-center"><?php echo $row["cname"]; ?></p></td>
                                    <td class="td-actions text-right">
                                        <a href="crud/edit-gallery.php?id=<?php echo $row["id_gal"] ?>" type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="crud/delete-gallery.php?id=<?php echo $row["id_gal"] ?>" type="button" rel="tooltip" name="deleteBlog" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons" >delete</i>
                                        </a>
                                    </td>
                                  </tr>
                            </tbody>
                            <?php
                                $i++;
                                }
                            ?>
                        </table>
                        <?php
                            }
                            else{
                            echo "No result found";
                            }
                        ?>
                    </div>
                 </div>
    </div>
                        </div>
    <!-- Gallery container end-->

    <!-- BLG_Category container start-->
    <div class="container tab" id="category-container" style="display: none;">
              <div class="title">
                <h3>Paragrāfu kategorijas</h3>
              </div>
              <div class="row">
                   
                    <div class="col-lg-16 col-md-10 ml-auto mr-auto">
                        <div class="table-responsive">
                            <a type="button" rel="tooltip" class="btn btn-info btn-sm" data-original-title="" title="" href="crud/add-blg-category.php">
                                <i class="">Pievienot Kategoriju</i>
                            </a>
                            <?php
                                $result = mysqli_query($conn,"SELECT * FROM blg_category");
                            ?>
                            <?php
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-left">Nosaukums</th>
                                    <th class="text-right">Opcijas</th>
                                </tr>
                            </thead>
                            <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" value=""><?php echo $row["id_category"]; ?></td>
                                    <td><?php echo $row["cname"]; ?></td>
                                    <td class="td-actions text-right">
                                        <a href="crud/edit-blg-category.php?id=<?php echo $row["id_category"] ?>" type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="crud/delete-blg-category.php?id=<?php echo $row["id_category"] ?>" type="button" rel="tooltip" name="deleteBlog" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons" >delete</i>
                                        </a>
                                    </td>
                                  </tr>
                            </tbody>
                            <?php
                                $i++;
                                }
                            ?>
                        </table>
                        <?php
                            }
                            else{
                            echo "No result found";
                            }
                        ?>
                    </div>
                 </div>
    </div>
                        </div>
    <!-- BLG_Category container end-->

    <!-- ACT_Category container start-->
    <div class="container tab" id="act-container" style="display: none;">
              <div class="title">
                <h3>Vietu kategorijas</h3>
              </div>
              <div class="row">
                   
                    <div class="col-lg-16 col-md-10 ml-auto mr-auto">
                        <div class="table-responsive">
                            <a type="button" rel="tooltip" class="btn btn-info btn-sm" data-original-title="" title="" href="crud/add-act-category.php">
                                <i class="">Pievienot Kategoriju</i>
                            </a>
                            <?php
                                $result = mysqli_query($conn,"SELECT * FROM act_category");
                            ?>
                            <?php
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-left">Nosaukums</th>
                                    <th class="text-right">Opcijas</th>
                                </tr>
                            </thead>
                            <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" value=""><?php echo $row["id_category"]; ?></td>
                                    <td><?php echo $row["cname"]; ?></td>
                                    <td class="td-actions text-right">
                                        <a href="crud/edit-act-category.php?id=<?php echo $row["id_category"] ?>" type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="crud/delete-act-category.php?id=<?php echo $row["id_category"] ?>" type="button" rel="tooltip" name="deleteBlog" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons" >delete</i>
                                        </a>
                                    </td>
                                  </tr>
                            </tbody>
                            <?php
                                $i++;
                                }
                            ?>
                        </table>
                        <?php
                            }
                            else{
                            echo "No result found";
                            }
                        ?>
                    </div>
                 </div>
    </div>
                        </div>
    <!-- ACT_Category container end-->

    <!-- DOC_Category container start-->
    <div class="container tab" id="doc-container" style="display: none;">
              <div class="title">
                <h3>Dokumentu kategorijas</h3>
              </div>
              <div class="row">
                   
                    <div class="col-lg-16 col-md-10 ml-auto mr-auto">
                        <div class="table-responsive">
                            <a type="button" rel="tooltip" class="btn btn-info btn-sm" data-original-title="" title="" href="crud/add-act-category.php">
                                <i class="">Pievienot Kategoriju</i>
                            </a>
                            <?php
                                $result = mysqli_query($conn,"SELECT * FROM doc_category");
                            ?>
                            <?php
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-left">Nosaukums</th>
                                    <th class="text-right">Opcijas</th>
                                </tr>
                            </thead>
                            <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" value=""><?php echo $row["id_category"]; ?></td>
                                    <td><?php echo $row["cname"]; ?></td>
                                    <td class="td-actions text-right">
                                        <a href="crud/edit-doc-category.php?id=<?php echo $row["id_category"] ?>" type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="crud/delete-doc-category.php?id=<?php echo $row["id_category"] ?>" type="button" rel="tooltip" name="deleteBlog" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons" >delete</i>
                                        </a>
                                    </td>
                                  </tr>
                            </tbody>
                            <?php
                                $i++;
                                }
                            ?>
                        </table>
                        <?php
                            }
                            else{
                            echo "No result found";
                            }
                        ?>
                    </div>
                 </div>
    </div>
                        </div>
    <!-- DOC_Category container end-->

    <!-- ENT_Category container start-->
    <div class="container tab" id="ent-container" style="display: none;">
              <div class="title">
                <h3>Pasākumu kategorijas</h3>
              </div>
              <div class="row">
                   
                    <div class="col-lg-16 col-md-10 ml-auto mr-auto">
                        <div class="table-responsive">
                            <a type="button" rel="tooltip" class="btn btn-info btn-sm" data-original-title="" title="" href="crud/add-act-category.php">
                                <i class="">Pievienot Kategoriju</i>
                            </a>
                            <?php
                                $result = mysqli_query($conn,"SELECT * FROM ent_category");
                            ?>
                            <?php
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-left">Nosaukums</th>
                                    <th class="text-right">Opcijas</th>
                                </tr>
                            </thead>
                            <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" value=""><?php echo $row["id_category"]; ?></td>
                                    <td><?php echo $row["cname"]; ?></td>
                                    <td class="td-actions text-right">
                                        <a href="crud/edit-ent-category.php?id=<?php echo $row["id_category"] ?>" type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="crud/delete-ent-category.php?id=<?php echo $row["id_category"] ?>" type="button" rel="tooltip" name="deleteBlog" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons" >delete</i>
                                        </a>
                                    </td>
                                  </tr>
                            </tbody>
                            <?php
                                $i++;
                                }
                            ?>
                        </table>
                        <?php
                            }
                            else{
                            echo "No result found";
                            }
                        ?>
                    </div>
                 </div>
    </div>
                        </div>
    <!-- ENT_Category container end-->

    <!-- GAL_Category container start-->
    <div class="container tab" id="gal-container" style="display: none;">
              <div class="title">
                <h3>Galerijas kategorijas</h3>
              </div>
              <div class="row">
                   
                    <div class="col-lg-16 col-md-10 ml-auto mr-auto">
                        <div class="table-responsive">
                            <a type="button" rel="tooltip" class="btn btn-info btn-sm" data-original-title="" title="" href="crud/add-act-category.php">
                                <i class="">Pievienot Kategoriju</i>
                            </a>
                            <?php
                                $result = mysqli_query($conn,"SELECT * FROM gal_category");
                            ?>
                            <?php
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-left">Nosaukums</th>
                                    <th class="text-right">Opcijas</th>
                                </tr>
                            </thead>
                            <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" value=""><?php echo $row["id_category"]; ?></td>
                                    <td><?php echo $row["cname"]; ?></td>
                                    <td class="td-actions text-right">
                                        <a href="crud/edit-gal-category.php?id=<?php echo $row["id_category"] ?>" type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="crud/delete-gal-category.php?id=<?php echo $row["id_category"] ?>" type="button" rel="tooltip" name="deleteBlog" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons" >delete</i>
                                        </a>
                                    </td>
                                  </tr>
                            </tbody>
                            <?php
                                $i++;
                                }
                            ?>
                        </table>
                        <?php
                            }
                            else{
                            echo "No result found";
                            }
                        ?>
                    </div>
                 </div>
    </div>
                        </div>
    <!-- GAL_Category container end-->
    
                        </div>
  </div>
</div>
<script>
   function openTab(evt, tabName) {
                var i, x, tablinks;
                x = document.getElementsByClassName("tab");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablink2");
                for (i = 0; i < x.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace("active", ""); 
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }
</script>    
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
            <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
            <script src="assets/js/jquery-3.6.0.min.js"></script>
		<script src="../assets/js/wordbench-third-party-scripts.min.js"></script>
		<script src="../assets/js/wordbench-scripts.js"></script>
        </body>
        </html>