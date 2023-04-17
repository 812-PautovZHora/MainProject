const formInsert = document.getElementById("form-insert-student");
const msg = document.querySelector(".message");
const content = document.querySelector(".content");

formInsert.addEventListener("submit",(event)=>{
event.preventDefault();// отменяем стандартную отправку формы

let formData = new FormData(formInsert); // работает только с формами (собирает данные с формы которые ввёл пользователь) formData
let xhr = new XMLHttpRequest(); // запрос html разметки (создаём объект отправки на сервер)
xhr.open("POST", "insertStudent.php"); // открывавем соединение
xhr.send(formData); // отправка данных на сервер 
xhr.onload = () => 
{if(xhr.response =="ok"){         //ожидает пока не случится ивент и выполняется по его приходу
    
    msg.innerHTML="Студент добавлен!";
    msg.classList.add("success");
    msg.classList.add("show-message");
    let div = document.createElement("div");
    let fname = formData.get("fname");
    let lname = formData.get("lname");
    let gender = formData.get("gender");
    let age = formData.get("age");
    div.innerHTML = `${lname},${fname}, ${gender},${age}`;
    content.append(div);

}
else{
    msg.innerHTML="Что-то пошло не так! Проверь правильность заполнения!";
    msg.classList.add("reject");
    msg.classList.add("show-message");
}
}; 
}
);