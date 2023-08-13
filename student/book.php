<?php require_once('header.php');



?>
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><a href="#">Test</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-content">
                                <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                                    <div class="row pt-md">
                                        <div class="form-group col-sm-9 col-lg-10">
                                            <span class="input-with-icon">
                                            <input type="text" name="book_name_search" class="form-control" id="lefticon" placeholder="Search">
                                            <i class="fa fa-search"></i>
                                        </span>
                                        </div>
                                        <div class="form-group col-sm-3  col-lg-2 ">
                                            <button type="submit" name="book_search" class="btn btn-primary btn-block">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST['book_search'])){ 
                        
                        $book_name_search = $_POST['book_name_search'];
                        ?>

                            <div class="col-sm-12">
                                <div class="panel">
                                        <div class="panel-content">
                                            <div class="row">
                                                <?php
                                                $data = mysqli_query($con,"SELECT * FROM `books` WHERE `book_name` LIKE '%$book_name_search%'");
                                                while($row = mysqli_fetch_assoc($data)){ ?>

                                                        <div class="col-sm-3 col-md-2">
                                                            <img src="../image/books/<?= $row['book_image']?>" alt="" srcset="">
                                                            <p><?= $row['book_name']?></p>
                                                            <span><b><?= $row['available_qty']?></b></span>
                                                        </div>
                                            <?php }

                                                ?>
                                                
                                            </div>
                                        </div>
                                </div>
                            </div>


                      <?php  
                    }else{ ?>
                    
                            <div class="col-sm-12">
                                <div class="panel">
                                        <div class="panel-content">
                                            <div class="row">
                                                <?php
                                                $data = mysqli_query($con,"SELECT * FROM `books`");
                                                while($row = mysqli_fetch_assoc($data)){ ?>

                                                        <div class="col-sm-3 col-md-2">
                                                            <img src="../image/books/<?= $row['book_image']?>" alt="" srcset="">
                                                            <p><?= $row['book_name']?></p>
                                                            <span><b><?= $row['available_qty']?></b></span>
                                                        </div>
                                            <?php }

                                                ?>
                                                
                                            </div>
                                        </div>
                                </div>
                                </div>

                    <?php
                    }

                    ?>
                    
                    
                </div>
<?php require_once('footer.php'); ?>           