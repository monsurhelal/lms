<?php require_once('header.php');?>
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><a href="javascript:Avoid(0)">return book</a></li>  
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-<li><a href="#">Test</a></li>=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    
                <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>All Students</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Phone</th>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Book Issu Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                       $data = mysqli_query($con,"SELECT `issu_books`.`id`,`issu_books`.`book_id`,`issu_books`.`book_issu_date`,`students`.`fname`,`students`.`lname`,`students`.`roll`,`students`.`phone`,`books`.`book_name`,`books`.`book_image`
                                       FROM `issu_books`
                                       INNER JOIN `students` ON `students`.`id` = `issu_books`.`student_id`
                                       INNER JOIN `books` ON `books`.`id` = `issu_books`.`book_id` WHERE `issu_books`.`book_return_date` = ''");
                                       while($row = mysqli_fetch_assoc($data)){ ?>
                                            <tr>
                                                <td><?= $row["fname"] . $row["lname"] ?></td>
                                                <td><?= $row["roll"] ?></td>
                                                <td><?= $row["phone"] ?></td>
                                                <td><?= $row["book_name"] ?></td>
                                                <td><img style="width: 50px;"  src="../image/books/<?= $row["book_image"] ?>" alt=""></td>
                                                <td><?= $row["book_issu_date"] ?></td>
                                                <td><a href="return_book.php?id=<?=$row["id"]?>&bookid=<?=$row["book_id"]?>">Return Book</a></td>
                                                
                                            </tr>
                                        <?php } ?>
                                  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $bookid = $_GET['bookid']; 
                    $data = date("d-m-y");
                   $resutl = mysqli_query($con,"UPDATE `issu_books` SET `book_return_date` = '$data' WHERE `id` = '$id'");
                   
                   if($resutl){
                    mysqli_query($con,"UPDATE `books` SET `available_qty`= `available_qty` + 1 WHERE `id` = '$bookid'");
                    ?>

                        <script>
                            javascript:history.go(-1);
                        </script>

                    <?php
                   }else{
                    ?>

                    <script>
                        alert("book can not return");
                    </script>

                <?php
                   }
                }
            ?>
<?php require_once('footer.php'); ?>           