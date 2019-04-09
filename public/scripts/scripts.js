var newTodo = document.querySelector('.new');
var formTodo = document.querySelector('.hidden');

newTodo.addEventListener('click', function () {
    formTodo.classList.toggle('formOpen');
})