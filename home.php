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
            }
        ?>
    </h3>
</header>

<main class="home">

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

                    echo '
                        <div class="todo">
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
                        </div>
                    ';
                }

            } else {
                echo '<div class="todo">
                        <p>Nenhuma tarefa ainda</p>
                    </div>';
            }
        }
    
    ?>

<a href="home.php?remove=$task_id">

</a>
    
</main>

<form method="POST" action="actions.php" class="todo-input">
    <input type="hidden" name="action" value="insert">
    <input type="text" name="task">
    <br>
    <div class="button-container">
        <input type="submit" name="submit" value="Adicionar" style="border: none; font-size: 20px; font-weight: 700; width: auto" class="clickable button">
    </div>
</form>