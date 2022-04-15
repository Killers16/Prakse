<?php
// Include config file
require_once "../../database_config.php";
 
// Define variables and initialize with empty values
$aname = $opened_at = $closed_at = $content = $picture = "";
$aname_err = $opened_at_err = $closed_at_err = $content_err = $picture_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
   // Validate name
   $input_aname = trim($_POST["aname"]);
   if(empty($input_aname)){
       $aname_err = "Ievadiet virsrakstu.";
   } else{
       $aname = $input_aname;
   }
    // Validate time
    $input_opened_at = trim($_POST["opened_at"]);
    if(empty($input_opened_at)){
        $opened_at_err = "Ierakstiet atvēršanās laiku.";     
    } else{
        $opened_at = $input_opened_at;
    }
   $input_closed_at = trim($_POST["closed_at"]);
   if(empty($input_closed_at)){
       $closed_at_err = "Ierakstiet aizvēršanās laiku.";     
   } else{
       $closed_at = $input_closed_at;
   }
   
   // Validate content
   $input_content = trim($_POST["content"]);
   if(empty($input_content)){
       $content_err = "Ievadiet tekstu.";     
   } else{
       $content = $input_content;
   }
   
   // Validate picture
   if (isset($_POST['editActivitie'])) {
    if (getimagesize($_FILES['picture']['tmp_name']) == false) {
        $picture_err = "<br />Please Select An Image.";
        } else {  
        //declare variables
        $file = $_FILES['picture']['tmp_name'];
        $picture = base64_encode(file_get_contents(addslashes($file)));}}
    
    // Check input errors before inserting in database
    if(empty($aname_err) && empty($opened_at_err) && empty($closed_at_err) && empty($content_err) && empty($picture_err)){
        // Prepare an update statement
        $sql = "UPDATE activities SET aname=?, opened_at=?, closed_at=?, content=?, picture=? WHERE id_activities=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssi", $param_aname, $opened_at, $closed_at, $param_content, $param_picture, $param_id);
            
            // Set parameters
            $param_aname = $aname;
            $param_opened_at = $opened_at;
            $param_closed_at = $closed_at;
            $param_content = $content;
            $param_picture = $picture;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM activities WHERE id_activities = ?";
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
                    $picture = $row["picture"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
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
        header("location: error.php");
        exit();
    }
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
                <h3>Paragrāfa labošana</h3>
              </div>
              <div class="col-lg-5 col-md-10 ml-auto mr-auto">
<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" enctype="multipart/form-data" method="post">
    <!--SELECT DATABASE DATA -->
                          
  <label for="aname">Nosaukums:</label><br>
  <input type="text" name="aname" value="<?php echo $aname; ?>"><br>

  <label for="opened_at">Atvērts plkst:</label><br>
  <input type="text" name="opened_at" value="<?php echo $opened_at; ?>"><br><br>
  <label for="closed_at">Aizvērts plkst:</label><br>
  <input type="text" name="closed_at" value="<?php echo $closed_at; ?>"><br><br>

  <label for="content">Apraksts:</label><br>
  <textarea name="content" style="resize: none;" rows="5" cols="30"><?php echo $content; ?></textarea>

  <input type="file" name="picture" value="<?php echo $picture; ?>"><br><br>
  <input type="hidden" name="id" value="<?php echo $id; ?>"/>
  <input type="submit" name="editActivitie" value="Labot">

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