<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
    <label for="age"></label>
    <input type="range" id="age" name="age" min="0" value="110" max="110" step="1" oninput="level.value = age.valueAsNumber - 1" >
    <output for="age" name="level">110</output>
    <input type="submit" value="Фильтровать">
</form>

<?php
$extra_sql = " ";
if(isset($_POST['age'])){
    $age = $this->formatstr($_POST['age']);
    $extra_sql .= "WHERE age < $age";
}

$result=$this->connect->query('SELECT * FROM students'.$extra_sql);
 
foreach ($result as $myrow) { //цикл от 0 до количество строк в массиве 
    echo "<div>
    <a href='?option=details&id=$myrow[student_id]'>$myrow[lname]</a>,$myrow[fname],$myrow[age]
    </div>"; //выводим строки таблицы

}
