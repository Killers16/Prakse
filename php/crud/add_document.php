<?php
$title = $content = $category_id = "";
$title_err = $content_err = $category_id_err = "";
// Check if a file has been uploaded
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_title = trim($_POST["title"]);
    if(empty($input_title)){
        $title_err = "Ievadiet nosaukumu.";
    } else{
        $title = $input_title;
    }
    $input_content = trim($_POST["content"]);
    if(empty($input_content)){
        $content_err = "Ievadiet aprakstu.";
    } else{
        $content = $input_content;
    }
    // Make sure the file was sent without errors
    if($_FILES['document']['error'] == 0) {
        // Connect to the database
        require_once "../../database_config.php";
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        // Gather all required data
        $name = $conn->real_escape_string($_FILES['document']['name']);
        $mime = $conn->real_escape_string($_FILES['document']['type']);
        $data = $conn->real_escape_string(file_get_contents($_FILES  ['document']['tmp_name']));
        $size = intval($_FILES['document']['size']);
        $param_title = $title;
        $param_content = $content;
        $param_category_id = $category_id;
 
        // Create the SQL query
        $query = "
            INSERT INTO `documents` (
                `title`, `content`,`file_namee`, `file_type`, `file_size`, `files`
            )
            VALUES (
                '{$param_title}', '{$param_content}','{$name}', '{$mime}', '{$size}', '{$data}'
            )";
 
        // Execute the query
        $result = $conn->query($query);
 
        // Check if it was successfull
        if($result) {
            echo 'Success! Your file was successfully added!';
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre>{$conn->error}</pre>";
        }
    }
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['document']['error']);
    }
 
    // Close the mysql connection
    $conn->close();
}
else {
    echo 'Error! A file was not sent!';
}

 
// Echo a link back to the main page
echo '<p>Click <a href="./index.php">here</a> to go back</p>';
?>
 
 