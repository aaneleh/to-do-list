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


<main>
    
    <form class="edit" method="POST" action="actions.php" style="height: 90vh;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            text-align: center;" >
        <input type="hidden" name="action" value="edit">


        <br> <h1> Editando a tarefa 
            <?php
                $task = $_GET['id_task'];
                if(isset($_SESSION['user_id']) and !empty($_SESSION['user_id'])){
                    $user = $_SESSION['user_id'];
                    $query = 'SELECT * FROM tasks WHERE task_id ="'.$task.'"';
                    $res = mysqli_query($link, $query) or die(mysqli_error($link));
                    
                    $row = mysqli_fetch_array($res);
                    
                    //CASO A TASK NÃO PERTENÇA AO USUARIO LOGADO, VOLTA À HOME
                    if($row['user'] != $user){
                        header('Location: index.php?pag=home'); 
                        exit;
                    } 
                } else {
                    if(isset($_GET['user']) and $_GET['user'] == "no" and !empty($_GET['task'])) {
                        $newtask = $_GET['task'];
                        $task = $_GET['id_task'];
                        echo '<script>  
                            var localList = localStorage.getItem("tasks");
                            var list = JSON.parse(localList);
                            list['.$task.'] = "'.$newtask.'";
                            localStorage.setItem("tasks", JSON.stringify(list));
                        </script>';
                    }
                }
            ?> 
        </h1> <br><br><br>

        <input type="hidden" name="task_id" value="<?php echo $task ?>">

        <div class="description">
            <h2> <label for=""> Descrição: </label> </h2>
            <br>
            <input type="text" name="description" id="description_input" value="">
            
            <?php 

                if (isset($_SESSION['user_id']) and !empty($_SESSION['user_id']) ){
                    echo '<script>
                                var input = document.getElementById("description_input");
                                input.value = "'.$row['description'].'";
                            </script>';
                } else {
                    echo '<script>
                        var input = document.getElementById("description_input");
                        var localList = localStorage.getItem("tasks");
                        var list = JSON.parse(localList);
                        input.value = list['.$task.'];
                    </script>';
                }
            ?>
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