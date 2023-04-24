<?php



$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$age = $_POST['age'];
require_once("config.php"); 

  // соединение с БД 
 require_once("config.php");
$connect = new mysqli(HOST, USER, PASSWORD, DB);
if ($connect->connect_error){
     exit("Ошибка подключения к базе данных: ".$connect->connect_error);
 }

// установка кодировки UTF 8
$connect->set_charset("utf8"); 

//код запроса 
$sql= "INSERT INTO `students`(`fname`, `lname`, `gender`, `age`) VALUES('$fname','$lname', '$gender', $age)";
// выполнение запроса
$result = $connect -> query($sql);
sleep(1);// задержка в секундах
if($result){
     echo "ok";
    //  header("Location:index.php"); это был редирект(перезагрузка страницы)
}   else    {
    echo "Что-то пошло не так. ";
}
?>