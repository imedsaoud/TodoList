

<ul class = "todos">
    <li class = "todo todo__task"><?=$_POST["todo_content"]?> </li>
    <li class = "todo todo__url"><?=$_POST["todo_git"]?></li>
    <li class = "todo todo__priority"><?=$_POST["todo_priority"]?></li>
    <li class = "todo todo__status"><?=$_POST["todo_status"]?></li>
    <form class="delete-todo" action="/delete" method="post">
        <input id="delete_todo" class="hidden" type="submit">
        <label for="delete_todo"><img src="https://image.flaticon.com/icons/svg/63/63260.svg" width="28px"></label>
    </form>
    </li>
</ul>

