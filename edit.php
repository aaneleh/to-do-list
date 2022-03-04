

<header>
    <h3 class="title">
        <a href="index.php?pag=home">
            <i class="bi bi-arrow-left"></i>
            Voltar
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


<main >
    
    <form class="edit" method="POST" action="actions.php" style="height: 90vh;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            text-align: center;"
    >
        <input type="hidden" name="action" value="edit">


        <br> <h1> Editando a tarefa 
            <?php
                $task = $_GET['id_task']; //7
                $user = $_SESSION['user_id']; //9
                
                $query = 'SELECT * FROM tasks WHERE task_id ="'.$task.'"';
                $res = mysqli_query($link, $query) or die(mysqli_error($link));
                
                $row = mysqli_fetch_array($res);
                
                if($row['user'] == $user){
                    echo $task;
                    
                //CASO A TASK NÃO PERTENÇA AO USUARIO LOGADO, VOLTA À HOME
                } else {
                    echo 'ueepaaa';
                    /* header('Location: index.php?pag=home'); 
                    exit; */
                }
            ?> 
        </h1> <br><br><br>

        <input type="hidden" name="task_id" value="<?php echo $task ?>">

        <div class="description">
            <h2> <label for=""> Descrição: </label> </h2>
            <br>
            <input type="text" name="description" id="description_input" value="<?php echo $row['description']?>">
        </div>

        <?php
            if (isset($_GET['status']) and !empty($_GET['status'])) {
                if ($_GET['status'] == 'error'){
                    echo '<p style="color:red"><br>Houve algum erro durante a edição!</p>';
                } else if($_GET['status'] == 'ok'){
                    echo '<p style="color:green"><br>Tarefa editada com sucesso!</p>';
                }
            }
        ?>

        <br>
        <input class="clickable button" type="submit" name="submit" value="Salvar Alteração"  style="border: none; font-size: 24px; font-weight: 700">
        <br>
    </form>

</main>