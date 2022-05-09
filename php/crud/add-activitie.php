<?php
// Include config file
require_once "../../database_config.php";
 
// Define variables and initialize with empty values
$aname = $content = $picture = $category_id = $maps = $number = $location_address = $email = $link = "";
$aname_err = $content_err = $picture_err = $category_id_err = $maps_err = $number_err = $location_address_err = $email_err = $link_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_aname = trim($_POST["aname"]);
    if(empty($input_aname)){
        $aname_err = "Ievadiet virsrakstu.";
    } else{
        $aname = $input_aname;
    }
    
    // Validate content
    $input_content = trim($_POST["content"]);
    if(empty($input_content)){
        $content_err = "Ievadiet tekstu.";     
    } else{
        $content = $input_content;
    }
    
    // Validate category
    $input_category = trim($_POST["category_id"]);
    if(empty($input_category)){
        $category_id_err = "Atlasiet kategoriju.";     
    } else{            
        $category_id = $input_category;
    }

    $input_location_address = trim($_POST["location_address"]);
    if(empty($input_location_address)){
        $location_address_err = "Ievadiet adresi.";     
    } else{            
        $location_address = $input_location_address;
    }
    $input_link = trim($_POST["url_link"]);
    if(empty($input_link)){
        $link_err = "Ievadiet adresi.";     
    } else{            
        $link = $input_link;
    }
    $input_number = trim($_POST["number"]);
    if(empty($input_number)){
        $number_err = "Ievadiet adresi.";     
    } else{            
        $number = $input_number;
    }
    $input_maps = trim($_POST["maps"]);
    if(empty($input_maps)){
        $maps_err = "Ievadiet adresi.";     
    } else{            
        $maps = $input_maps;
    }
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Ievadiet adresi.";     
    } else{            
        $email = $input_email;
    }

    // Validate picture
    if (isset($_POST['newActivitie'])) {
    if (getimagesize($_FILES['picture']['tmp_name']) == false) {
        $picture_err = "<br />Please Select An Image.";
        } else {  
        //declare variables
        $file = $_FILES['picture']['tmp_name'];
        $picture = base64_encode(file_get_contents(addslashes($file)));}}
    
    // Check input errors before inserting in database
    if(empty($aname_err) && empty($content_err) && empty($picture_err) && empty($category_id_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO activities (aname,content, picture, category_id, location_address,phone, maps, email, link ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_aname, $param_content, $param_picture, $param_category_id, $param_location_address, $param_number, $param_maps,$param_email,$param_link);
            
            // Set parameters
            $param_aname = $aname;
            $param_content = $content;
            $param_picture = $picture;
            $param_category_id = $category_id;
            $param_location_address = $location_address;
            $param_number = $number;
            $param_maps = $maps;
            $param_email = $email;
            $param_link = $link;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ../admin-panel.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>


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
                <h3>Aktivitātes pievienošana</h3>
              </div>
              <div class="col-lg-5 col-md-10 ml-auto mr-auto">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="post">
<!--  Name -->
  <label for="title">Nosaukums:</label><br>
  <input type="text" id="aname" name="aname" value="<?php echo $aname; ?>"><br><br>

<!--  Content -->
  <label for="content">Apraksts:</label><br>
  <textarea name="content" style="resize: none;" rows="5" cols="30" value="<?php echo $content; ?>">
</textarea>
<!--  Address -->
<label for="title">Vietas adrese:</label><br>
  <input type="text" id="location_address" name="location_address" value="<?php echo $location_address; ?>"><br><br>
  <!--  Google Iframe -->
  <label for="title">Ievietojiet Google Maps IFRAME:</label><br>
  <input type="text" id="maps" name="maps" value="<?php echo $maps; ?>"><br><br>
  <!--  URL Link -->
  <label for="title">Tīmekļu vietnes adrese:</label><br>
  <input type="text" id="url_link" name="url_link" value="<?php echo $link; ?>"><br><br>
  <!--  E-Mail -->
  <label for="title">E-pasta adrese:</label><br>
  <input type="text" id="email" name="email" value="<?php echo $email; ?>"><br><br>
  <!--  Phone Number -->
  <label for="title">Telefona numurs:</label><br>
  <input type="text" id="number" name="number" value="<?php echo $number; ?>"><br><br>
<!--  Category -->
<label for="category">Kategorija:</label><br>

<select name="category_id" id="category_id">
<?php
  $result2 = $conn->query("SELECT * FROM act_category");
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
<!--  Picture -->
  <input type="file" name="picture" value="<?php echo $picture; ?>"><br><br>
<!--  Submit -->
  <input type="submit" name="newActivitie" value="Pievienot">

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