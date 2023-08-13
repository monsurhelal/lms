<?php require_once('header.php');
$students = mysqli_query($con,"SELECT * FROM `students`");
$total_students = mysqli_num_rows($students);

$libraian = mysqli_query($con,"SELECT * FROM `libraian`");
$total_libraian = mysqli_num_rows($libraian);

$books = mysqli_query($con,"SELECT * FROM `books`");
$total_books = mysqli_num_rows($books);

$total_available_books = mysqli_query($con,"SELECT SUM(`book_qty`) as total_book FROM `books`");
$total_book_qtn = mysqli_fetch_assoc($total_available_books);

$total_available_books_qtn = mysqli_query($con,"SELECT SUM(`available_qty`) as total_book FROM `books`");
$total_book_avl_qtn = mysqli_fetch_assoc($total_available_books_qtn);
?>
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
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                                    <a href="http://localhost/lms/librarian/students.php">
                                        <div class="panel-content">
                                            <h1 class="title color-darker-2"> <i class="fa fa-book"></i> <?= $total_books .' ('. $total_book_qtn['total_book'] .'-'.$total_book_avl_qtn['total_book'].')' ?> </h1>
                                            <h4 class="subtitle color-darker-1">Total books</h4>
                                        </div>
                                    </a>
                                </div>
                                
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                                    <a href="http://localhost/lms/librarian/students.php">
                                        <div class="panel-content">
                                            <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?= $total_students ?> </h1>
                                            <h4 class="subtitle color-darker-1">Total Student</h4>
                                        </div>
                                    </a>
                                </div>
                                
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                                    <a href="http://localhost/lms/librarian/students.php">
                                        <div class="panel-content">
                                            <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?= $total_libraian ?> </h1>
                                            <h4 class="subtitle color-darker-1">Total libraian</h4>
                                        </div>
                                    </a>
                                </div>
                                
                            </div>
                        
                        </div>
                    </div>
                    
                </div>
<?php require_once('footer.php'); ?>           