const newTodo = document.querySelector('.new');
const formTodo = document.querySelector('.hidden');

newTodo.addEventListener('click', function () {
    formTodo.classList.toggle('formOpen');
});
