<?php
/**
 * Скрипт отправляющий id отзыва и получающий данные через API с помощью метода file_get_contents.
 */
if ($_GET["id_review"]){
    $id = $_GET['id_review'];
    $data = file_get_contents("http://reviewonthemap/api/$id"); // Получение данных с помощью метода
    $arrayReview = json_decode($data,TRUE); // Декодирование данных JSON в обычный массив
}else{
    $review = null;
}

// Форма вывода данных отзыва
echo '<lable>Отзыв</lable>';
echo '<div class="container" style="border:1px solid #cecece;">';
    echo 'Имя: '.$arrayReview[0]['name'].'<br>';
    echo 'Отзыв: '.$arrayReview[0]['review'].'<br>';
    echo 'Рейтинг: '.$arrayReview[0]['rating'].'<br>';
    echo 'Фото: '.$arrayReview[0]['foto'].'<br>';
echo '</div>';

?>
<form action="viewReview.php" method="GET">
    <lable>Введите ID отзыва</lable>
    <input type="text" name = "id_review" required></br> 
    <input type="submit" value="Показать отзыв">
</form>
<a href = "http://reviewonthemap/index.php">На главную</a>