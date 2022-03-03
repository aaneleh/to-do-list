<?php
	require_once('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">

    <title>To-do-list</title>
</head>
<body>

    <?php
        if(isset($_GET['pag']) and !empty($_GET['pag']) ){ 
            $pg = $_GET['pag'];
            require_once($pg.'.php');  

        } else {
            require_once('entrance.php');
        }
    ?>

    <section id="config" class="">
        <header>
            <h3 class="title">
                <p class="clickable" onclick="toggleConfig()">
                    <i class="bi bi-arrow-left"></i>
                    Voltar
                </p>
            </h3>
        </header>

        <main class="config-container">
            <div class="account">
                <h3 class="title config">&nbsp&nbspConta</h3>
                <div class="config">
                    <p> Usuario: </p>
                    <p> Nome </p>
                </div>
                
                <div class="config">
                    <p> Senha: </p>
                    <p> ***** </p>
                </div>

                <div class="button-container">
                    <p class="clickable black button title">Sair</p>
                </div>
            </div>

            <div class="colors">
                <h3 class="title config">&nbsp&nbspCores</h3>

                <div class="config">
                    <p>Modo escuro</p>
                    <div class="skeuo">
                        <input type="checkbox" name="" id="mode">
                        <div class="skeou-circle"></div>
                    </div>
                </div>
                <div class="config">
                    <p>Cor destaque</p>
                    <input type="color" name="" id="mode">
                </div>
            </div>
            
            
            <div class="button-container save">          
                <br>
                <br>
                <p class="clickable black button title">
                    Salvar Alterações
                </p>
                <br>
            </div>

        </main>
    </section>

    <footer>
        <div>
            <p class="clickable" onclick="toggleConfig()">
                <i class="bi bi-gear-fill clickable"></i>
            </p>
        </div>

        <div class="social-container">
            <a href="https://www.twitter.com/" class="clickable">
                <i class="bi bi-twitter"></i>
            </a>
            <a href="https://www.instagram.com/" class="clickable">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="https://www.google.com/" class="clickable">
                <i class="bi bi-google"></i>
            </a>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>