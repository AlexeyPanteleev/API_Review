<?php
require "api/connectDB.php";
require "api/Review.php";
if ($_GET["id_review"]){
    $id = $_GET["id_review"];
    $id_Review = new Review;
    $review = json_decode($id_Review ->ShowReview($mysqli, $id));
}else{
    $review = null;
}
echo '<lable>Отзыв</lable>';
echo '<div class="container" style="border:1px solid #cecece;">';
echo 'имя : '.$review[0] ->name.'</br>';
echo 'рейтинг : '.$review[0] ->rating.'</br>';
echo 'фото : '.$review[0] ->foto.'</br>';
echo 'отзыв : '.$review[0] ->review.'</br>';
echo '</div>';

?>
<form action="viewReview.php" method="GET">
       <lable>Введите ID отзыва</lable>
       <input type="text" name="id_review" required></br> 
       <input type="submit" value="Добавить отзыв">
    </form>
<a href = "http://reviewonthemap/index.php">На главную</a>