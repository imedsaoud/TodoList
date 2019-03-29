<?php

require_once "./php/connect.php";

echo  "youhouuuuuu";

?>

<form action="./php/add.php" method="post">
  <div>
    <label for="todo_content">Title :</label>
    <input type="text" id="todo_content" name="todo_content" />
  </div>
  <div>
    <label for="todo_git">Git link :</label>
    <input type="text" id="todo_git" name="todo_git" />
  </div>
  <div>
    <select name="todo_priority">
      <option value="low" selected="selected">Low</option>
      <option value="medium">Medium</option>
      <option value="hight">Hight</option>
    </select>
  </div>
  <input type="submit" value="Add" name="new" style="background: green" />
</form>
