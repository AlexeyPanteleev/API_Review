<?php
if ($_GET["page"]){
    $page = $_GET["page"];
}else{
    $page = 0;
}
require "api/connectDB.php";
require "api/Review.php";
echo'<a href = "http://reviewonthemap/index.php">На главную</a>';
$show_List_Review = new Review;
$arrayReview = json_decode($show_List_Review->ListReviews($mysqli));
$k = 10;
      echo '<h3 align="center">Список отзывов</h3></br>';
      echo '<lable>Сортировка по рейтингу</lable></br>';
      echo '<li class="page-item"><a  href="?sort=DESC_rating">Сортировка по убыванию</a></li>';
      echo '<li class="page-item"><a  href="?sort=ASC_rating">Сортировка по возврастанию</a></li></br>';
      echo '<lable>Сортировка по дате</lable></br>';
      echo '<li class="page-item"><a  href="?sort=DESC_date">Сортировка по убыванию</a></li>';
      echo '<li class="page-item"><a  href="?sort=ASC_date">Сортировка по возврастанию</a></li></br>';
      echo '<li class="page-item"><a  href="http://reviewonthemap/showReviews.php">Отменить сортировку</a></li></br>';
      switch ($_GET['sort']) {
        case 'DESC_rating':
          $rating = array_column($arrayReview, 'rating');
          array_multisort($rating, SORT_DESC, $arrayReview);
          break;
       case 'ASC_rating':
          $rating = array_column($arrayReview, 'rating');
          array_multisort($rating, SORT_ASC, $arrayReview);
          break;
      case 'DESC_date':
          $date = array_column($arrayReview, 'date');
          array_multisort($date, SORT_DESC, $arrayReview);
          break;
      case 'ASC_date':
          $date = array_column($arrayReview, 'date');
          array_multisort($date, SORT_ASC, $arrayReview);
          break;
      }

    echo '<div class="container" style="border:1px solid #cecece;">';
      
        for ($i = $page * $k; $i < ($page+1)*$k; $i++){
            echo $arrayReview[$i]->id.'<br>';
            echo $arrayReview[$i]->name.'<br>';
            echo $arrayReview[$i]->review.'<br>';
            echo $arrayReview[$i]->rating.'<br>';
            echo $arrayReview[$i]->foto.'<br>';
            echo $arrayReview[$i]->date.'<br>';
            echo "<hr>";         
        }
    echo '</div>';
        //длинна пагинации (количество страниц)
        $len = floor(count($arrayReview)/$k);
        echo '<nav class="navbar"><ul class="pagination">';
        for ($i = 0; $i <= $len; $i++){
            echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.($i + 1).'</a></li>';
        };
        echo '</ul></nav>';
?>