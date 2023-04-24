<?php
require_once("config.php"); 

// соединение с БД 
require_once("config.php");
$connect = new mysqli(HOST, USER, PASSWORD, DB);
if ($connect->connect_error){
   exit("Ошибка подключения к базе данных: ".$connect->connect_error);
}

// установка кодировки UTF 8
$connect->set_charset("utf8"); 

//
$id = $_GET['id'];

$sql = "UPDATE `students` 
SET `num_like`= `num_like` + 1
WHERE `student_id` = $id";

$result = $connect->query($sql);
if($result){
    echo "ok";
}   else    {
   echo "Что-то пошло не так.";
}
?>