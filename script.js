const formInsert = document.getElementById("form-insert-student");
const msg = document.querySelector(".message");
const content = document.querySelector(".content");


// отправка данных через форму
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
// отправка данных без формы метод Get
// лайки у студентов 
const btnsLike = document.querySelectorAll(".like");
function setLike(str1, str2){

    return function
    (event){
    let idStudent = event.target.closest(".student").dataset.id; //создаём переменную id берём ближайшего родителя с классом студент и берём его id
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "setLike.php?id=" + idStudent);
    xhr.onload = function(){
        if (xhr.response=="ok"){
            let num = +event.target.closest(".student").querySelector(".num-like").textContent; //селектор мы берём из спан в index
            event.target.closest(".student").querySelector(".num-like").textContent = num +1;
            console.log(str1);

        }          
         else {
                console.log(str2);
            }
    }
    xhr.send();
}
}

for(btn of btnsLike){
    btn.addEventListener('click', setLike("успешно", "1 ошибка и ты ошибся")); // калбек на сетлайк

}

// // генерация рандомного числа  
// function getRandomInt(max){
//     return Math.floor(Math.random()*max);
// }
// // пример промиса 
// const myPromise = new Promise((resolve, reject)=>{
//     console.log("я - кот Борис");
//     let num;
//     setTimeout(()=>{
//         num = getRandomInt(10);
//         console.log(num);   
//          if(num >= 5){
//         resolve(num);
//     }
//     else{
//         reject("типичный макрос Илюши");
//     }
//     },3000);

// });

// myPromise
// .then( //неудачное выполнение
//     (result)=>{console.log(result);
//     result++;
//     console.log(result);
//     return result;
//     },
// )
// .then((result)=>{console.log(result*2)})
// .catch( //удачное выполнение
//     (result)=>{console.log(result)}
// )
// .finally( //во всех случаях
//     ()=>{
//         console.log("конец промиса")
//     }
// );
