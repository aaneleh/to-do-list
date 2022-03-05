<?php
	require_once('db.php');

    $data = $_POST;
    /* print_r($data); */

    $nextPage;

    //se sucesso: href="index.php?pag=home"
    //se não: aviso (fica em: index.php?pag=register)

    switch($data['action']){
        case 'register':
            if($data['password'] == $data['password-confirm']){
                $user = $data['user'];
                $password = $data['password'];
                $hash = password_hash($password,PASSWORD_DEFAULT);
                
                $query = 'INSERT INTO users (email, password) VALUES ("'.$user.'","'.$hash.'")' ;
                $res = mysqli_query($link, $query) or die(mysqli_error($link));

                /*pagina default:*/ $nextPage = "register&status=loginerror";

                //INICIA SESSÃO COM A FUNÇÃO DE LOGIN
                $query = 'SELECT * FROM users WHERE email ="'.$user.'"';
                $res = mysqli_query($link, $query) or die(mysqli_error($link));
                if(mysqli_num_rows($res) > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        $db_password = $row['password'];
                        if(password_verify($password, $db_password)){
                            echo '<br>senha top';
                            session_start();
                            $_SESSION['user_id'] = $row['user_id'];
                            $_SESSION['email'] = $row['email'];
                            $nextPage = "home";
                        } else {
                            echo '<br>senha não top';
                        }
                    }
                }

            //senhas não combinam, volta pro register com um aviso
            } else {
                $nextPage = "register&status=passwordmatch";
            }
            break;

        //login
        case 'login':
            $user = $data['user'];
            $password = $data['password'];
            $query = 'SELECT * FROM users WHERE email ="'.$user.'"';
            $res = mysqli_query($link, $query) or die(mysqli_error($link));
            
            //se o usuario existe
            if(mysqli_num_rows($res) > 0){
                $nextPage = "login&status=wrongpass"; //fica por default, se encontrar a senha muda
                //compara a senha inserida com a do bd
                while($row = mysqli_fetch_assoc($res)){
                    $db_password = $row['password'];
                    if(password_verify($password, $db_password)){
                        echo '<br>senha top';
                        session_start();
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['email'] = $row['email'];
                        $nextPage = "home";
                    } else {
                        echo '<br>senha não top';
                    }
                }
            //se o usuario não existe
            } else {
                echo '<br> user not found';
                $nextPage = "login&status=usernotfound";
            }
            break;
        
        //TASK RELATED
        //insert
        case 'insert':
            $task = $data['task'];
            $nextPage = "home";
            if(isset($task) and !empty($task)) {
                session_start();
                //se tem um user
                if ( isset($_SESSION['email']) and !empty($_SESSION['email']) ) {
                    echo 'user top';

                    $user = $_SESSION['user_id'];
                    $query = 'INSERT INTO tasks (user, description) VALUES ("'.$user.'","'.$task.'")';
                    $res = mysqli_query($link, $query) or die(mysqli_error($link));
                //se não tem user
                } else {
                    $nextPage = 'home&task='.$task;
                }
            }
            
            break;
        
        //delete
        case 'delete':
            $task_id = $data['task_id'];
            
            session_start();
            if(isset($_SESSION['email']) and !empty($_SESSION['email'])) {
                $query = 'DELETE FROM tasks WHERE task_id ="'.$task_id.'"';
                $res = mysqli_query($link, $query) or die(mysqli_error($link));
                $nextPage = "home";
            } else {
                $nextPage = 'home&delete='.$task_id;
            }
            break;

        //edit
        case 'edit':
            //caso algo de errado, essa pagina fica como 'default' já
            $task_id = $data['task_id'];
            $new_description = $data['description'];

            $nextPage = 'edit&id_task='.$task_id.'status=error';

            session_start();
            if(isset($_SESSION['email']) and !empty($_SESSION['email'])) {
                $query = 'UPDATE tasks SET description = "'.$new_description.'" WHERE task_id = "'.$task_id.'"';
                $res = mysqli_query($link, $query) or die(mysqli_error($link));
                $nextPage = 'edit&id_task='.$task_id.'&status=ok';
            } else {
                $nextPage = 'edit&id_task='.$task_id.'&user=no&status=ok&task='.$new_description;
            }
            break;

        default:
            echo "ueepaaa ação errada";
            break;
    }

    header('Location: index.php?pag='.$nextPage); 
    exit;

?>