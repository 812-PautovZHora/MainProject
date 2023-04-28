<?php
    $result= $this->connect->query("SELECT * FROM students WHERE id_student=$id");
    if (!$result) {
        echo "<p>Данных нет</p>";
    } else {
    
        echo "<p class='back'><a href='/'>Назад</a></p>";
        $myrow  =  $result->fetch_assoc();

        echo "<div>
            $myrow[lname],$myrow[fname],$myrow[age], $myrrow[group_id]
        </div>"; 
    }
