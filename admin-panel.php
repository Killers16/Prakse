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
        <link rel="shortcut icon" href="images/favicon.ico">

        <!-- STYLESHEETS : begin -->
		<link rel="stylesheet" type="text/css" href="assets/css/general.css"><!-- Default styles generated from assets/scss/general.scss (do not edit) -->
        <link rel="stylesheet" type="text/css" href="assets/css/color-schemes/default.css"><!-- Default color scheme generated from assets/scss/color-schemes/default.scss (change to other pre-defined or custom color scheme) -->
		<link rel="stylesheet" type="text/css" href="style.css"><!-- Place your own CSS into this file -->
		<!-- STYLESHEETS : end -->
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Galvenā lapa | Kolka</title>
        <link rel="shortcut icon" href="images/favicon.ico">
        
          <link rel="stylesheet" type="text/css" href="assets/css/panel.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
            <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
        </head>
        <body>

            <div class="container">
              <div class="title">
                <h3>Paragrāfi</h3>
              </div>
              <div class="row">
                   
                    <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                        <div class="table-responsive">
                            <a type="button" rel="tooltip" class="btn btn-info btn-sm" data-original-title="" title="" href="add-paragraph.php">
                                <i class="">Pievienot Paragrāfu</i>
                            </a>
                            <?php
                            include_once 'database_config.php';
                                $result = mysqli_query($conn,"SELECT * FROM blogs");
                            ?>
                            <?php
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Virsraksts</th>
                                    <th>Paragrāfs</th>
                                    <th>Bilde</th>
                                    <th class="text-right">Publicēšanas laiks</th>
                                    <th class="text-right">Opcijas</th>
                                </tr>
                            </thead>
                            <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" value=""><?php echo $row["id_blogs"]; ?></td>
                                    <td><?php echo $row["title"]; ?></td>
                                    <td><p class="line-limit"><?php echo $row["content"]; ?></p></td>
                                    <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['picture']).'"/>'; ?></td>
                                    <td class="text-right"><?php echo $row["created_at"]; ?></td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" name="deleteBlog" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons" >close</i>
                                        </button>
                                        <?php
                                        if(isset($_GET['updateBlog'])){
                                            if($_GET['title'] != "" && $_GET['content'] != ""){
                                                $paragraph = $_GET['paragraph'];
                                                $oldTitle = explode(" ", $paragraph)[0];
                                                $oldContent = explode(" ", $paragraph)[1];
                                                
                                                $newTitle = $_GET['title'];
                                                $newContent = $_GET['title'];
                                                
                                                $id = $blog_service->getBlogID($conn, $oldTitle, $oldContent);
                                                
                                                $info = $blog_service->updateBlog($conn, $id, $newTitle, $newContent);
                                            }
                                            
                                            header('Location: index.php');
                                        }
                                        if(isset($_GET['deleteBlog'])){
                                              $paragraph = $_GET['paragraph'];
                                              $title = explode(" ", $paragraph)[0];
                                              $content = explode(" ", $paragraph)[1];
                        
                                              $id = $blog_service->getBlogID($conn, $title, $content);
                        
                                             $info = $blog_service->deleteBlog($conn, $id);
                    
                                             header('Location: admin-panel.php');
                                             }
                                         ?>
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
                
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
            <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
            <script src="assets/js/jquery-3.6.0.min.js"></script>
		<script src="assets/js/wordbench-third-party-scripts.min.js"></script>
		<script src="assets/js/wordbench-scripts.js"></script>
        </body>
        </html>