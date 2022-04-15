<!DOCTYPE html>
<html>
    
<?php mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
require_once '../database_config.php';?>
    <body>
    <?php
                                $result = mysqli_query($conn,"SELECT * FROM blogs");
                                if (mysqli_num_rows($result) > 0) {
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                            ?>
<?php 


echo '<img src="data:image/png;base64,' . $row['picture'] . '" />';
     ?>  
     
     
     
     
     <?php
                                $i++;
                                }
                            ?>
                        <?php
                            }
                            else{
                            echo "No result found";
                            }
                        ?>
</body>
</html>