<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create review</title>
    
</head>
<body>
    <a href = "http://reviewonthemap/showReviews.php">Список отзывов</a></br>
    <a href = "http://reviewonthemap/viewReview.php">Одиночные отзывы</a></br>
    <form action="api/main.php" method="POST">
       <lable>Ссылка на фото</lable>
       <input type="text" size="20" name="link" required></br> 
       
       <lable>Введите имя</lable></br>
       <input type="text" size="20" name="name" maxlength="50" required></br>
       <lable>Напишите отзыв</lable></br>
       <textarea name="description" cols="60" rows="5" maxlength="1000" required></textarea></br>
       <lable><b>Поставте оценку</b></lable></br>
       <lable><input name="rating" type="radio" value="1">1</lable>
       <lable><input name="rating" type="radio" value="2">2</lable>
       <lable><input name="rating" type="radio" value="3">3</lable>
       <lable><input name="rating" type="radio" value="4">4</lable>
       <lable><input name="rating" type="radio" value="5">5</lable></br>
       <input type="submit" value="Добавить отзыв">
    </form>
    
</body>
</html>