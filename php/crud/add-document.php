<?php 
        require_once "../../database_config.php";
$title = $content = $category_id = $document = ""; ?>

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
        <link rel="shortcut icon" href="../../images/favicon.ico">

        <!-- STYLESHEETS : begin -->
		<link rel="stylesheet" type="text/css" href="../../assets/css/general.css"><!-- Default styles generated from assets/scss/general.scss (do not edit) -->
        <link rel="stylesheet" type="text/css" href="../../assets/css/color-schemes/default.css"><!-- Default color scheme generated from assets/scss/color-schemes/default.scss (change to other pre-defined or custom color scheme) -->
		<link rel="stylesheet" type="text/css" href="../../style.css"><!-- Place your own CSS into this file -->
		<!-- STYLESHEETS : end -->
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Galvenā lapa | Kolka</title>
        <link rel="shortcut icon" href="../../images/favicon.ico">
        
            <link rel="stylesheet" type="text/css" href="../../assets/css/panel.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
            <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
        </head>
        <body>

            <div class="container">
              <div class="title">
                <h3>Dokumenta pievienošana</h3>
              </div>
              <div class="col-lg-5 col-md-10 ml-auto mr-auto">
<form action="add_document.php" enctype="multipart/form-data" method="post">
  <label for="title">Virsraksts:</label><br>
  <input type="text" id="title" name="title" value="<?php echo $title; ?>"><br><br>

  <label for="content">Apraksts:</label><br>
  <textarea name="content" style="resize: none;" rows="5" cols="30" value="<?php echo $content; ?>">
</textarea>


<label for="document">Fails:</label><br>
    <input type="file" name="document" value="<?php echo $document; ?>"><br><br>

  <label for="category">Kategorija:</label><br>

    <select name="category_id" id="category_id">
    <?php
    $result2 = $conn->query("SELECT * FROM doc_category");
    if (mysqli_num_rows($result2) > 0) {
    $i=0;
    while($row = mysqli_fetch_array($result2)) {
    ?>
    <option value="<?php echo $row["id_category"]; ?>"><?php echo $row["cname"]; ?></option>
    <?php
        $i++;
        }
        $row["id_category"] = $row["category_id"];
    }
    else{
    echo "No result found";
    }
    ?>
    </select><br><br>

    <input type="submit" name="newDoc" value="Pievienot">

</form> 
</div>
</div>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
            <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
            <script src="../../assets/js/jquery-3.6.0.min.js"></script>
	        	<script src="../../assets/js/wordbench-third-party-scripts.min.js"></script>
	        	<script src="../../assets/js/wordbench-scripts.js"></script>
</body>
</html>