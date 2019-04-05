<header>
    <div class="firstHeader">
        <h1>To do List</h1>
        <div class="new">New</div>
    </div>

    <div id="addTodoForm" class="hidden">
        <form action="/form" method="post">
            <input name="todo_task" type="text" placeholder="Tâche" />
            <input name="todo_url" type="text" placeholder="URL du Github" />
            <select name="todo_category">
                <option value="all">All</option>
                <option value="psr">PSR</option>
                <option value="design patterns">Design Patterns</option>
                <option value="maths">Maths</option>
                <option value="algo">Algo</option>
            </select>
            <select name="todo_priority">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
            <select name="todo_state">
                <option value="to Do">To Do</option>
                <option value="doing">Doing</option>
                <option value="need review">Need Review</option>
                <option value="done">Done</option>
            </select>
            <input type="submit" />
        </form>
    </div>
    <ul class="category">
        <li>All</li>
        <li>Psr</li>
        <li>Design Patterns</li>
        <li>Maths</li>
        <li>Algo</li>
    </ul>
    <ul class="columns">

        <li>Todo</li>

        <li>Github Link</li>

        <li class = column__priority>
            <ul class = "effect">
                <li >Priority</li>
                <li >Low</li>
                <li >Medium</li>
                <li >High</li>
            </ul>
        </li>

        <li class="column__status">
            <ul class = "effect">
                <li >Status</li>
                <li >To do</li>
                <li >Doing</li>
                <li >Need review</li>
                <li >done</li>
            </ul>
        </li>
        <li>
            DELETE
        </li>

    </ul>
</header>