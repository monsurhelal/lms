<?php require_once('header.php');

if(isset($_POST['book_issu_btn'])){
    $student_id = $_POST['student_id'];
    $book_id = $_POST['book_id'];
    $book_issu_date = $_POST['book_issu_date'];

    $issu_book_query = mysqli_query($con,"INSERT INTO `issu_books`(`student_id`, `book_id`, `book_issu_date`) VALUES ('$student_id','$book_id','$book_issu_date')");
    if($issu_book_query){
        mysqli_query($con,"UPDATE `books` SET `available_qty`= `available_qty` - 1 WHERE `id` = '$book_id'");
    }
}

?>
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><a href="javascript:Avoid(0)">issu book</a></li>   
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-<li><a href="#">Test</a></li>=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="panel">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-inline" method="POST" action="<?= $_SERVER['PHP_SELF']?>"> 
                                            <select name="student_id" class="form-control">
                                                <option value="">select</option>
                                                <?php 
                                                $student_query = mysqli_query($con,"SELECT * FROM `students` WHERE `status` = '1'");
                                                while($row = mysqli_fetch_assoc($student_query)){
                                                    ?>
                                                    <option value="<?= $row['id']?>">
                                                        <?= $row['fname'].' '.$row['lname'] .'-('.$row['roll'].')'?>
                                                        
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                                
                                            </select>
                                            <div class="form-group">
                                                <button type="submit" name="search_btn" class="btn btn-primary">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php
                                if(isset($_POST['search_btn'])){
                                    $student_query_id = $_POST['student_id'];
                                    $student_query = mysqli_query($con,"SELECT * FROM `students` WHERE `id` = '$student_query_id' AND `status` = '1'");
                                    $student_row = mysqli_fetch_assoc($student_query); ?>

                                        <div class="panel">
                                            <div class="panel-content">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
                                                            <div class="form-group">
                                                                <label for="name">student name</label>
                                                                <input type="email" class="form-control" id="name" value="<?= $student_row['fname'].' '.$student_row['lname']?>"readonly>
                                                                <input type="hidden" name="student_id" value="<?= $student_row['id']?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="book_id">book name</label>
                                                                <select name="book_id" class="form-control">
                                                                    <option value="">select</option>
                                                                        <?php 
                                                                        $student_query = mysqli_query($con,"SELECT * FROM `books` WHERE `available_qty`>0");
                                                                        while($row = mysqli_fetch_assoc($student_query)){
                                                                            ?>
                                                                            <option value="<?= $row['id']?>">
                                                                                <?= $row['book_name']?>
                                                                            </option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="issu_book">Book Issu Date</label>
                                                                <input type="text" class="form-control" name="book_issu_date" value="<?= date("d-m-y")?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" name="book_issu_btn" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   
                                   <?php } ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
<?php require_once('footer.php'); ?>      