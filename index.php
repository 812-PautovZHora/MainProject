<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Клиент-серверное приложение</title>
    <script defer src="script.js"></script>
</head>
<body>

<!-- добавление студентов формаs -->
     <form id="form-insert-student"> <!--action="insertStudent.php" method="POST" это раньше было частью редиректа -->
        <input type="text" name="fname" id="fname" placeholder="Введите имя" required><br>
        <input type="text" name="lname" id="lname" placeholder="Введите фамилию" required><br>
        <input type="number" name="age" id="age" placeholder="Введите возраст" required><br>
        <input type="radio" name="gender" id="m" value="m" checked>
        <label for="m">мужской</label><br>
        <input type="radio" name="gender" id="f" value="f">
        <label for="f">женский</label><br>
        <input type="submit" value="добавить"><br>

    </form>
    <?php



    // соединение с БД 
    require_once("config.php");
    $connect = new mysqli(HOST, USER, PASSWORD, DB);
    if ($connect->connect_error){
        exit("Ошибка подключения к базе данных: ".$connect->connect_error);
    }
   
    // установка кодировки UTF 8
    $connect->set_charset("utf8"); 
    //код запроса 
    $sql = "SELECT * FROM `students`";
    // выполнить запрос
    $result = $connect->query($sql);
    //вывести результаты запроса на страницу
    while ($row = $result->fetch_assoc()){// fetch как get(получить), assoc = ассоциативный массив, num = численный, all
        echo "<div>
                $row[lname], $row[fname], $row[gender], $row[age],
             </div>";
    } 

    
    ?>
    
</body>
</html>