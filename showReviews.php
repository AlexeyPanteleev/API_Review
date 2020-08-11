<?php
/**
 * Скрипт который получает через API из БД с помощью метода file_get_contents,
 * данные в формате JSON декодирует их в обычные массив. 
 */

 // Проверка запроса для вывода коректной страницы
if ($_GET["page"]){
    $page = $_GET["page"];
}else{
    $page = 0;
}

echo'<a href = "http://reviewonthemap/index.php">На главную</a>'; // Ссылка на главную страницу

$data = file_get_contents('http://reviewonthemap/api/reviews'); // Получение данных с помощью метода file_get_contents
$arrayReview = json_decode($data,TRUE); // Декодирование данных JSON в обычный массив
$k = 10; // Количество отзывов отображаемое на странице

// Выбор нескольких видов сортировок при необходимости
echo '<h3 align="center">Список отзывов</h3></br>';
echo '<lable>Сортировка по рейтингу</lable></br>';
echo '<li class="page-item"><a  href="?sort=DESC_rating">Сортировка по убыванию</a></li>';
echo '<li class="page-item"><a  href="?sort=ASC_rating">Сортировка по возврастанию</a></li></br>';
echo '<lable>Сортировка по дате</lable></br>';
echo '<li class="page-item"><a  href="?sort=DESC_date">Сортировка по убыванию</a></li>';
echo '<li class="page-item"><a  href="?sort=ASC_date">Сортировка по возврастанию</a></li></br>';
echo '<li class="page-item"><a  href="http://reviewonthemap/showReviews.php">Отменить сортировку</a></li></br>';

/**
 * Реализвция сортировок по дате добовления и рейтингу с условие возрастания и убывания. 
 * Оператор switch служит для определения выбранной сортировки, запрос которой происходит
 * посредством метода GET.
 */
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
/**
 * Вывод Массива данных в форму для более удобного представления.
 * С помощью цикла For происходит извлечение данных из массива в
 * соответствии с указанной страницей.
 */
echo '<div class="container" style="border:1px solid #cecece;">';
for ($i = $page * $k; $i < ($page+1)*$k; $i++){
    if($i == count($arrayReview)) {
        break;
    }
    echo 'ID: '.$arrayReview[$i]['id'].'<br>';
    echo 'Имя: '.$arrayReview[$i]['name'].'<br>';
    echo 'Отзыв: '.$arrayReview[$i]['review'].'<br>';
    echo 'Рейтинг: '.$arrayReview[$i]['rating'].'<br>';
    echo 'Фото: '.$arrayReview[$i]['foto'].'<br>';
    echo 'Дата: '.$arrayReview[$i]['date'].'<br>';  
    echo '<hr>';         
}
echo '</div>';

// Реализация простой пагинации.
$len = floor(count($arrayReview)/$k); // Количество страниц.
echo '<nav class="navbar"><ul class="pagination">';
for ($i = 0; $i <= $len; $i++){
    echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.($i + 1).'</a></li>';
}
echo '</ul></nav>';
