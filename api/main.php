<?php
require "ConnectDB.php";
require "Review.php";
$method = $_SERVER['REQUEST_METHOD'];
$arrayList = array();
$arrayStatus = array();
if ($method === 'POST'){
    $add_Review = new Review;
    $add_Review -> CreateReview($mysqli, $_POST);
    header("Location: http://reviewonthemap/index.php"); // перенаправление на главную страницу  
    /**
     * Если GET передаёт id_review происходит вывод отзыва по его id,
     * если GET передаёт reviews=1(т.е. TRUE) возвращается весь список отзывов.
     */
}elseif ($method === 'GET') {
    if ($_GET['id_review']){
        $id = $_GET['id_review'];
        $show_Review = new Review;
        echo $show_Review->ShowReview($mysqli, $id);
    }elseif ($_GET['reviews']){
        $show_List_Review = new Review;
        echo $show_List_Review->ListReviews($mysqli);
    }    
}

?>