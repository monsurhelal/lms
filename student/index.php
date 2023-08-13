<?php require_once('header.php');?>
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            
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
                                <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Issu Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $student_id = $_SESSION['student_id'];
                                            $result = mysqli_query($con,"SELECT `issu_books`.`book_issu_date`,`books`.`book_name`,`books`.`book_image`
                                                                FROM `books`
                                                                INNER JOIN `issu_books` ON `books`.`id` = `issu_books`.`book_id`
                                                                WHERE `issu_books`.`student_id` = $student_id");
                                            while($row = mysqli_fetch_assoc($result)){ ?>
                                            <tr>
                                                <td><?= $row['book_name']?></td>
                                                <td><img style="width: 50px;" src="../image/books/<?= $row['book_image']?>" alt=""></td>
                                                <td><?= $row['book_issu_date']?></td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                    
                </div>
<?php require_once('footer.php'); ?>           