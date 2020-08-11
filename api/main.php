<?php
/**
 * Данный скрипт реализует API который предоставляет данные в формате JSON 
 * в зависимости от запроса.
 */

// CORS методы дающие разрешения на доступ к выбранным ресурсам.
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Gredentials: true");
header("Content-Type: application/json; charset=UTF-8");
// Подключение файлов со сриптами подключения к БД и классам работы с БД.
require "ConnectDB.php";
require "Review.php";
/**
 * Проверка на получаемый запрос.
 * Если скрипт принимает POST запрос то выполняется создание экзеплара класса
 * для обращению к методы добавления данных в БД.
 */
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST'){
    $add_Review = new Review;
    $add_Review -> CreateReview($mysqli, $_POST);
    header("Location: http://reviewonthemap/index.php"); // перенаправление на страницу добавления отзыва. 
    /**
     * Если GET запрос передаёт id_review происходит обращение к методу ShowReview который 
     * возвращает отзыв которые соответствует идентификатору.
     * Если запрос имеет параметр reviews то происходит обращение к методу ListReviews который
     * возвращает все отзывы хранящиеся в БД.
     */
}elseif ($method === 'GET') {
    if (is_numeric($_GET['url'])){
        $id = $_GET['url'];
        $show_Review = new Review;
        print_r ($show_Review->ShowReview($mysqli, $id));
    }elseif ($_GET['url'] == 'reviews'){
        $show_List_Review = new Review;
        print_r ($show_List_Review->ListReviews($mysqli));
    }    
}

?>