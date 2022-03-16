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
                <h3>Paragrāfa pievienošana</h3>
              </div>
              <div class="col-lg-5 col-md-10 ml-auto mr-auto">
<form action="">
  <label for="title">Virsraksts:</label><br>
  <input type="text" id="title" name="title" value=""><br>

  <label for="content">Paragrāfs:</label><br>
  <textarea name="content" style="resize: none;" rows="5" cols="30">
</textarea>

  <label for="author">Raksta autors:</label><br>
  <input type="text" id="author" name="author" value=""><br><br>


  <input type="file" id="myFile" name="picture"><br><br>

  <input type="submit" name="newParagraph" value="Pievienot">

  <?php

if(isset($_GET['newParagraph'])){
                    if($_GET['title'] != "" && $_GET['content'] != ""  && $_GET['author'] != ""  && $_GET['picture'] != ""){
                        $title = $_GET['title'];
                        $content = $_GET['content'];
                        $full_name = $_GET['author'];
                        $picture = $_GET['picture'];
                    }
                    if(trim($title)=='' || trim($content)=='' || trim($author)==''){
                        echo '<strong>Error! </strong>All fields are requiered!';}else{
                            $posted_by = 1;
                            $info = $blogService->insertBlog($conn, $title, $content,$full_name,$picture,$posted_by);
                            header('Location: admin-panel.php');
                        }
                }
                ?>
</form> 
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