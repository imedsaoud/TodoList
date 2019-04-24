<header>
    <div class="firstHeader">
        <h1>To do List</h1>
        <div class="new">New</div>
    </div>
    <!---------------------------------------------TodosForm--------------------------------------------------->
    <div id="addTodoForm" class="hidden">
        <form action="/add" method="post">
            <input name="task" type="text" placeholder="Tâche" required/>
            <input name="url" type="text" placeholder="URL du Github" required/>
            <select name="category" required>
                <option value="">All</option>
                <option value="psr">PSR</option>
                <option value="design patterns">Design Patterns</option>
                <option value="maths">Maths</option>
                <option value="algo">Algo</option>
            </select>
            <select name="priority" required>
                <option value="">Priority</option>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
            <select name="state" required>
                <option value="">Status</option>
                <option value="to Do">To Do</option>
                <option value="doing">Doing</option>
                <option value="need review">Need Review</option>
                <option value="done">Done</option>
            </select>
            <input type="submit"/>
        </form>
    </div>
    <!---------------------------------------------CategoryList--------------------------------------------------->
    <ul class="category">
        <li><a href="/All">All</a></li>
        <li><a href="/Psr">Psr</a></li>
        <li><a href="/Maths">Maths</a></li>
        <li><a href="/Algo">Algo</a></li>
    </ul>
    <!---------------------------------------------TodosColumn--------------------------------------------------->
    <ul class="columns">

        <li>Todo</li>

        <li>Github Link</li>

        <li class = column__priority>
            <ul class = "effect">
                <li>Priority</li>
                <li><a href="/Low">Low</a></li>
                <li><a href="/Medium">Medium</a></li>
                <li><a href="/High">High</a></li>
            </ul>
        </li>

        <li class="column__status">
            <ul class = "effect">
                <li>Status</li>
                <li><a href="/Todo">To Do</a></li>
                <li><a href="/Doing">Doing</a></li>
                <li><a href="/NeedReview">Need Review</a></li>
                <li><a href="/Done">Done</a></li>
            </ul>
        </li>
        <li>
            DELETE
        </li>
    </ul>
</header>

<!--------------------------------------Todos----------------------------------->
<?php

foreach ($dataTodos["content"] as $data) {
    echo ' 
        <ul class = "todos">
             <li class = "todo todo__task">'.$data["task"].'</li>
             <li class = "todo todo__url">'.$data["url"].'</li>
             <li class = "todo todo__priority">'.$data["priority"].'</li>
             <li class = "todo todo__status">'.$data["status"].'</li>
             <form class="delete-todo" action="/delete" method="post">
                <input name ="delete" class="hidden"  value = '.$data["id"].'>
                <input id="delete_todo" class="hidden" type="submit">
                <label for="delete_todo"><img src="https://image.flaticon.com/icons/svg/63/63260.svg" width="28px"></label>
             </form>
         </ul>
    ';
}
