<?php require_once('header.php');?>
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Manage Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-<li><a href="#">Test</a></li>=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    
                <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>Books</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Author Name</th>
                                        <th>Publicatin Name</th>
                                        <th>purches Date</th>
                                        <th>Book Price</th>
                                        <th>Book Quantity</th>
                                        <th>Available Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                       $data = mysqli_query($con,"SELECT * FROM `books`");
                                       while($row = mysqli_fetch_assoc($data)){ ?>
                                            <tr>
                                                <td><?= $row["book_name"] ?></td>
                                                <td><img style="width: 60px;" src="../image/books/<?= $row["book_image"] ?>"></td>
                                                <td><?= $row["book_author_name"] ?></td>
                                                <td><?= $row["book_publication_name"] ?></td>
                                                <td><?= date('d-M-y',strtotime($row["book_purchase_date"])) ?></td>
                                                <td><?= $row["book_price"] ?></td>
                                                <td><?= $row["book_qty"] ?></td>
                                                <td><?= $row["available_qty"] ?></td>
                                                <td>
                                                <a href="javascript:avoid(9)" data-toggle="modal" data-target="#book-info-<?= $row['id']?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:avoid(9)" data-toggle="modal" data-target="#book-update-<?= $row['id']?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                <a href="delete.php?deletebook=<?= $row["id"] ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>

                                                </td>
                                               
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
                    $data = mysqli_query($con,"SELECT * FROM `books`");
                    while($row = mysqli_fetch_assoc($data)){ ?>

                        <div class="modal fade" id="book-info-<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header state modal-info">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Information</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Book Name</th>
                                                <td><?= $row["book_name"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Book Image</th>
                                                <td><img style="width: 60px;" src="../image/books/<?= $row["book_image"] ?>"></td>
                                            </tr>
                                            <tr>    
                                                <th>Author Name</th>
                                                <td><?= $row["book_author_name"] ?></td>
                                            </tr>
                                            <tr>    
                                                <th>Publicatin Name</th>
                                                <td><?= $row["book_publication_name"] ?></td>
                                            </tr>
                                            <tr>    
                                                 <th>purches Date</th>
                                                 <td><?= date('d-M-y',strtotime($row["book_purchase_date"])) ?></td>
                                            </tr>
                                            <tr>    
                                                <th>Book Price</th>
                                                <td><?= $row["book_price"] ?></td>
                                            </tr>
                                            <tr>    
                                                 <th>Book Quantity</th>
                                                 <td><?= $row["book_qty"] ?></td>
                                            </tr>
                                            <tr>    
                                                <th>Available Quantity</th>
                                                <td><?= $row["available_qty"] ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php } ?>
                <?php
                    
                    $data = mysqli_query($con,"SELECT * FROM `books`");
                    while($row = mysqli_fetch_assoc($data)){ 
                        $book_update_id = $row['id'];
                        $book_information = mysqli_query($con,"SELECT * FROM `books` WHERE `id` = '$book_update_id'");
                        $singel_row = mysqli_fetch_assoc($book_information);

                        ?>

                        <div class="modal fade" id="book-update-<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header state modal-info">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book Information</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="panel">
                                            <div class="panel-content">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form method="POST" action="" >
                                                            <input type="hidden" name="update_id" value="<?= $singel_row['id'] ?>">
                                                                    <div class="form-group">
                                                                        <label for="bookname">Book Name</label>
                                                                        <input type="text" class="form-control" name="book_name" value="<?= $singel_row['book_name'] ?>" id="bookname" placeholder="book name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="book_author_name">Book Author Name</label>
                                                                        
                                                                            <input type="text" class="form-control" name="book_author_name" value="<?= $singel_row['book_author_name'] ?>" id="book_author_name" placeholder="Book Author Name">
                                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="book_publication_name">Book Publication Name</label>
                                                                        
                                                                            <input type="text" class="form-control" name="book_publication_name" value="<?= $singel_row['book_publication_name'] ?>" id="book_publication_name" placeholder="Book Publication Name">
                                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="book_purchase_date">Book Purchase Date</label>
                                                                        <input type="date" class="form-control" name="book_purchase_date" value="<?= $singel_row['book_purchase_date'] ?>" id="book_purchase_date" placeholder="Book Purchase Date">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="book_price">Book price</label>
                                                                        <input type="number" class="form-control" name="book_price" value="<?= $singel_row['book_price'] ?>" id="book_price" placeholder="Book price">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="book_qty">Book Qty</label>
                                                                        <input type="text" class="form-control" name="book_qty" value="<?= $singel_row['book_qty'] ?>" id="book_qty" placeholder="Book Qty">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="available_qty">Available Qty</label>
                                                                        <input type="text" class="form-control" name="available_qty" value="<?= $singel_row['available_qty'] ?>" id="available_qty" placeholder="Available Qty">
                                                                    </div>
                                                            
                                                            <div class="form-group">
                                                                <button type="submit" name="book_update_btn"class="btn btn-primary">update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php } ?>
<?php 
if(isset($_POST["book_update_btn"])){
    $book_name = $_POST['book_name'];
    $book_author_name = $_POST['book_author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    $available_qty = $_POST['available_qty'];
    $librarian_username = $_SESSION["librarian_username"];
    $update_id = $_POST['update_id'];
    $result = mysqli_query($con,"UPDATE `books` SET `book_name`='$book_name',`book_author_name`=' $book_author_name',`book_publication_name`=' $book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty',`librarian_username`='$librarian_username' WHERE `id` = '$update_id'");

    if($result){ ?>

    <script>
        javascript:history.go(-1);
    </script>

    <?php    
    }else{
        $error = "some thing went wrong";
    }

}

?>
<?php require_once('footer.php'); ?>      