<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
</head>
<body>
<form id="form-insert-groups"> <!--action="insertStudent.php" method="POST" это раньше было частью редиректа -->
        <input type="text" name="fname" id="group_id" placeholder="Введите свою" required><br>
        <input type="text" name="lname" id="lname" placeholder="Введите фамилию" required><br>
        <input type="number" name="age" id="age" placeholder="Введите возраст" required><br>
        <input type="radio" name="gender" id="m" value="m" checked>
        <label for="m">мужской</label><br>
        <input type="radio" name="gender" id="f" value="f">
        <label for="f">женский</label><br>
        <input type="submit" value="добавить"><br>

    </form>
    
</body>
</html>