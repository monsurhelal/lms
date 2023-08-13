<?php require_once('header.php');?>

<?php 
if(isset($_POST["book_save_btn"])){
$book_name = $_POST['book_name'];
$book_author_name = $_POST['book_author_name'];
$book_publication_name = $_POST['book_publication_name'];
$book_purchase_date = $_POST['book_purchase_date'];
$book_price = $_POST['book_price'];
$book_qty = $_POST['book_qty'];
$available_qty = $_POST['available_qty'];
$librarian_username = $_SESSION["librarian_username"];

$image = explode('.',$_FILES['book_image']['name']);
$image_ext = end($image);

$image = date('ymdhis').'.'.$image_ext;

$result = mysqli_query($con,"INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`) VALUES ('$book_name','$image','$book_author_name','$book_publication_name','$book_purchase_date','$book_price','$book_qty','$available_qty','$librarian_username')");

if($result){
    move_uploaded_file($_FILES['book_image']['tmp_name'],'../image/books/'.$image);
    $success = "data save successfully";
}else{
    $error = "some thing went wrong";
}

}

?>
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Add Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-<li><a href="#">Test</a></li>=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    
                    <div class="col-sm-6 col-sm-offset-3">
                    <?php 
                if(isset($success)){ ?>

                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= $success ?>
                    </div>

        <?php } ?>
        <?php 
                if(isset($error)){ ?>

                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= $error ?>
                    </div>

        <?php } ?>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="">
                                        <h5 class="mb-lg">Add Book</h5>
                                        <div class="form-group">
                                            <label for="bookname" class="col-sm-2 control-label">Book Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="book_name" id="bookname" placeholder="book name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_image" class="col-sm-2 control-label">Book Image</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="book_image" id="book_image" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_author_name" class="col-sm-2 control-label">Book Author Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="book_author_name" id="book_author_name" placeholder="Book Author Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_publication_name" class="col-sm-2 control-label">Book Publication Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="book_publication_name" id="book_publication_name" placeholder="Book Publication Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_purchase_date" class="col-sm-2 control-label">Book Purchase Date</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="book_purchase_date" id="book_purchase_date" placeholder="Book Purchase Date">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_price" class="col-sm-2 control-label">Book price</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="book_price" id="book_price" placeholder="Book price">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_qty" class="col-sm-2 control-label">Book Qty</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="book_qty" id="book_qty" placeholder="Book Qty">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="available_qty" class="col-sm-2 control-label">Available Qty</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="available_qty" id="available_qty" placeholder="Available Qty">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" name="book_save_btn" class="btn btn-primary">
                                                    Save book
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                </div>
<?php require_once('footer.php'); ?>      