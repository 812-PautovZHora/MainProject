const formInsert = document.getElementById("form-insert-student");

formInsert.addEventListener("submit",(event)=>{
event.preventDefault();// отменяем стандартную отправку формы
let formData = new FormData(formInsert); // работает только с формами (собирает данные с формы которые ввёл пользователь) formData
let xhr = new XMLHttpRequest(); // запрос html разметки (создаём объект отправки на сервер)
xhr.open("POST", "insertStudent.php"); // открывавем соединение
xhr.send(formData); // отправка данных на сервер 
xhr.onload = () => {console.log(xhr.response)}; //ожидает пока не случится ивент 

});