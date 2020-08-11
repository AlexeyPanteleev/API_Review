<?php
/**
 * Класс для работы с базой данных, имее 3 метода которые в
 * осуществляют SQL запросы в БД и возвращают запрощенные данные
 * в формате JSON.
 */
class Review{
    /**
     * Метод добавления данных в БД.
     * $data массив с данными.
     * $mysqli подключение к БД.
     * Метод возвращает id добавленной записи и статус добавления (true или false).
     */
    public function CreateReview($mysqli, $data)
    {
        $Status = array();
        $link = $data["link"];
        $name = $data["name"];
        $review = $data["description"];
        $rating = $data["rating"];
        $datetime = date("Y-m-d H:i:s");  // Дата добавления отзыва
        $query = "INSERT INTO `reviews` (name, review, rating, foto, date) VALUES ('$name', '$review', '$rating', '$link', '$datetime')";
        $Status['status'] = mysqli_query($mysqli, $query);
        $Status['id'] = $mysqli->insert_id;
        return $Status;
    }

    /**
     * Метод получения отзыва по его id. 
     * $id - идентификатор записи.
     * Метод возвращает данные отзыва в формате JSON.
     */
    public function ShowReview($mysqli, $id)
    {
        $query = mysqli_query($mysqli, 'SELECT `name`,`rating`, `foto`, `review` FROM `reviews` WHERE `id`= '.$id.'');
        $arrayList = array();
        // Получение и преобразование данных из БД в ассоциативный массив.
        while ($result = mysqli_fetch_assoc($query)) {
            $arrayList[] = $result;
        }
        return json_encode($arrayList); // Кодирование массива в формат JSON
    }

    /**
     * Метод получения всех отзывов хранимых в БД.
     * Метод возвращает масивв данных в формате JSON.
     */
    public function ListReviews($mysqli)
    {
        $query = mysqli_query($mysqli, 'SELECT * FROM `reviews`');
        $arrayList = array();

        while ($result = mysqli_fetch_assoc($query)) {
            $arrayList[] = $result;
        }
        return json_encode($arrayList);
    }
}

?>