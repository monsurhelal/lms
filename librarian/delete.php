<?php
require_once('../dbcon.php');

if(isset($_GET['deletebook'])){

    $deletebook = $_GET['deletebook'];
    $image = mysqli_query($con,"SELECT `book_image` FROM `books` WHERE `id` = $deletebook");
    $image_name_fatch = mysqli_fetch_assoc($image);
    $image_name =  $image_name_fatch['book_image'];
    $image_name;
    mysqli_query($con,"DELETE FROM `books` WHERE `id` = '$deletebook'");
    unlink('../image/books/'.$image_name);
    header('location: manage_book.php');
}

?>