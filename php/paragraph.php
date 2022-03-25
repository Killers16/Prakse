<div class="container">
              <div class="title">
                <h3>Paragrāfi</h3>
              </div>
              <div class="row">
                   
                    <div class="col-lg-16 col-md-10 ml-auto mr-auto">
                        <div class="table-responsive">
                            <a type="button" rel="tooltip" class="btn btn-info btn-sm" data-original-title="" title="" href="add-paragraph.php">
                                <i class="">Pievienot Paragrāfu</i>
                            </a>
                            <?php
                            include_once '../database_config.php';
                                $result = mysqli_query($conn,"SELECT * FROM blogs");
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
                                    <th class="text-center">Attēls</th>
                                    <th class="text-center">Publicēšanas laiks</th>
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
                                    <td><p class="text-center"><?php echo $row["blog_author"]; ?></p></td>
                                    <td class="text-center"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['picture']).'"/>'; ?></td>
                                    <td class="text-center"><?php echo $row["created_at"]; ?></td>
                                    <td class="td-actions text-right">
                                        <a href="edit-paragraph.php?id=<?php echo $row["id_blogs"] ?>" type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="delete-paragraph.php?id=<?php echo $row["id_blogs"] ?>" type="button" rel="tooltip" name="deleteBlog" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
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
