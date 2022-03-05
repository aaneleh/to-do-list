<header>
    <h3 class="title">
        <a href="index.php?pag=entrance">
            <i class="bi bi-box-arrow-left"></i>
            Sair
        </a>
    </h3>

    <h3 id="header_display">
        <?php            
            session_start();
            if ( isset($_SESSION['email']) and !empty($_SESSION['email']) ) {
                $user = $_SESSION['email'];
                echo $user.'&nbsp&nbsp';
            //se não tem user
            } else {
                echo '<a class="white button" href="index.php?pag=login"> Login </a>';

                //ADICIONA NOVA TASK AO LOCAL STORAGE
                if( isset($_GET['task']) and !empty($_GET['task'])){
                    $task = $_GET['task'];
                    echo '<script>
                            var localList = localStorage.getItem("tasks");
                            var list = JSON.parse(localList);
                            if(list == null){
                                var newList = ["'.$task.'"];
                                localStorage.setItem("tasks", JSON.stringify(newList));
                            } else {
                                list.push("'.$task.'");
                                localStorage.setItem("tasks", JSON.stringify(list));
                            }
                        </script>';
                }

                //DELETA TASK DO LOCAL STORAGE
                if( isset($_GET['delete'])){
                    $delete = $_GET['delete']; //passa o id a ser deletado no action.php
                    echo '<script>
                            var localList = localStorage.getItem("tasks");
                            var list = JSON.parse(localList);
                            list.splice('.$delete.', 1);
                            localStorage.setItem("tasks", JSON.stringify(list));
                        </script>';
                }
            }
        ?>
    </h3>
</header>

<main class="home" id="home">

    <?php
        //MOSTRA AS TAREFAS DO BANCO DE DADOS
        if ( isset($_SESSION['user_id']) and !empty($_SESSION['user_id']) ) {
            $user = $_SESSION['user_id'];
            $query = 'SELECT * FROM tasks WHERE user ="'.$user.'"';
            $res = mysqli_query($link, $query) or die(mysqli_error($link));
            if(mysqli_num_rows($res) > 0){

                while($task = mysqli_fetch_array($res)){
                    $description = $task['description'];
                    $task_id = $task['task_id'];

                    echo '<div class="todo">
                            <div>
                                <input type="checkbox" class="clickable">
                                <p class="todo-text">'.$description.'</p>
                            </div>

                            <div>
                                <!-- EDIT PENCIL -->
                                <a href="index.php?pag=edit&id_task='.$task_id.'"> 
                                    <i class="clickable bi bi-pencil-fill"></i>
                                </a>
                        
                                <!-- DELETE X -->
                                <form method="POST" action="actions.php">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="task_id" value='.$task_id.'>

                                    <input type="submit" name="submit" value="X" style="border: none; background: transparent; font-size: 20px; font-weight: 700; width: auto" class="clickable">
                                </form>
                            </div>
                        </div>';
                }

            } else {
                echo '<div class="todo">
                        <p>Nenhuma tarefa ainda</p>
                    </div>';
            }
        } else {
            $noTask = '<div class=todo><p>Nenhuma tarefa ainda</p></div>';

            $text1 = '<div class=todo> <div> <input type=checkbox class=clickable> <p class=todo-text>';
            $text2 = '</p> </div> <div> <a href=index.php?pag=edit&id_task=';
            $text3 = '> <i class=bi-pencil-fill></i></a><form method=POST action=actions.php><input type=hidden name=action value=delete><input type=hidden name=task_id value=';
            $text4 = '><input type=submit name=submit value=X style=border:none;background:transparent;font-size:20px;font-weight:700; width: auto class=clickable></form></div></div>';
            
            echo '<script>
                    var home = document.getElementById("home");
                    home.innerHTML = "";
                    var localList = localStorage.getItem("tasks");
                    var list = JSON.parse(localList);
                    if(list == null || list.length == 0) {
                        home.innerHTML = "'.$noTask.'";
                    } else {
                        for(var i =0;i<list.length; i++) {
                            home.innerHTML += "'.$text1.'" + list[i] + "'.$text2.'" + i + "'.$text3.'" + i + "'.$text4.'";

                        }
                    }
                    
                </script>';
        }
    
    ?>

</main>

<form method="POST" action="actions.php" class="todo-input">
    <input type="hidden" name="action" value="insert">
    <input type="text" name="task">
    <br>
    <div class="button-container">
        <input type="submit" name="submit" value="Adicionar" style="border: none; font-size: 20px; font-weight: 700; width: auto" class="clickable button">
    </div>
</form>