<?php
/*
require_once("Review.php");
require_once("connectDB.php");
$arrayStatus = array();
if ($_POST["link"] and $_POST["name"] and $_POST["name"] and $_POST["description"] and $_POST["rating"]){
    $link = $_POST["link"];
    $name = $_POST["name"];
    $review = $_POST["description"];
    $rating = $_POST["rating"];
    $add_Review = new Review;
    $arrayStatus = $add_Review -> CreateReview($name, $review, $rating, $link);
    $status = $arrayStatus['status'];
    $id = $arrayStatus['id'];
    header("Location: http://reviewonthemap/index.php?status=$status&id=$id"); // перенаправление на главную страницу
}else{
    echo '<p>Произошла ошибка, данные не были переданны</p>';
    echo "<a href=index.php>Вернутся на главную страницу</a>";
}

*/
?>