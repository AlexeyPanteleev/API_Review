<?php
class Review{

    public function CreateReview($mysqli, $data)
    {
        $Status = array();
        $link = $data["link"];
        $name = $data["name"];
        $review = $data["description"];
        $rating = $data["rating"];
        $datetime = date("Y-m-d H:i:s");
        $query = "INSERT INTO `reviews` (name, review, rating, foto, date) VALUES ('$name', '$review', '$rating', '$link', '$datetime')";
        $Status['status'] = mysqli_query($mysqli, $query);
        $Status['id'] = $mysqli->insert_id;
        return $Status;
    }

    public function ShowReview($mysqli, $id)
    {
        $query = mysqli_query($mysqli, 'SELECT `name`,`rating`, `foto`, `review` FROM `reviews` WHERE `id`= '.$id.'');
        $arrayList = array();

        while ($result = mysqli_fetch_assoc($query)) {
            $arrayList[] = $result;
        }
        return json_encode($arrayList);
        
    }

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