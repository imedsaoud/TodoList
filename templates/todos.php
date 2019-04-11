
<?php
    foreach ($dataTodos["content"] as $data){


   echo     ' 
                <ul class = "todos">
                     <li class = "todo todo__task">'.$data["task"].'</li>
                     <li class = "todo todo__url">'.$data["url"].'</li>
                     <li class = "todo todo__priority">'.$data["priority"].'</li>
                     <li class = "todo todo__status">'.$data["status"].'</li>
                     <form class="delete-todo" action="/delete" method="post">
                        <input id="delete_todo" class="hidden" type="submit">
                        <label for="delete_todo"><img src="https://image.flaticon.com/icons/svg/63/63260.svg" width="28px"></label>
                     </form>
                 </ul>
             ';
    }
?>





