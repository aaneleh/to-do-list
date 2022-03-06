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
    <script src="script.js"></script>

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

        <div class="config-container">
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
                    <a class="clickable black button title" href="index.php?pg=entrance">Sair</a>
                </div>
            </div>

            <div class="colors">
                <h3 class="title config">&nbsp&nbspCores</h3>

                <script>
                    function changeMode(){
                        const root = document.querySelector(':root');
                        const cssEstilos = getComputedStyle(root);
                        background = String(cssEstilos.getPropertyValue('--background')).trim();
                        main = String(cssEstilos.getPropertyValue('--main')).trim();
                        font = String(cssEstilos.getPropertyValue('--font')).trim();
                        //se no tema claro, muda para escuro
                        if(background == "#FFF") {
                            //localStorage.setItem('mode', JSON.stringify("light"));
                            root.style.setProperty('--background', '#000');
                            root.style.setProperty('--font', '#FFF');
                            root.style.setProperty('--main', '#FFF');

                            /* if(main == "#000") {
                            } */
                        } else {
                            root.style.setProperty('--background', '#FFF');
                            root.style.setProperty('--font', '#000');
                            root.style.setProperty('--main', '#000');
                            /* if(main == "#FFF") {
                            } */
                        }
                    }

                    function changeColor(){
                        const root = document.querySelector(':root');
                        const input = document.getElementById('input-color').value;
                        root.style.setProperty('--main', input);
                    }

                    function saveChanges(){
                        const root = document.querySelector(':root');
                        const cssEstilos = getComputedStyle(root);
                        background = String(cssEstilos.getPropertyValue('--background')).trim();
                        font = String(cssEstilos.getPropertyValue('--font')).trim();
                        main = String(cssEstilos.getPropertyValue('--main')).trim();
                        localStorage.setItem("background", JSON.stringify(background));
                        localStorage.setItem("font", JSON.stringify(font));
                        localStorage.setItem("main", JSON.stringify(main));
                    }

                    window.onload = function() {
                        const root = document.querySelector(':root');
                        var background = localStorage.getItem("background");
                        var font = localStorage.getItem("font");
                        var main = localStorage.getItem("main");
                        if(background != null || main != null) {
                            root.style.setProperty('--background', background);
                            root.style.setProperty('--font', font);

                        }
                        if(main != null || main != "") {
                            root.style.setProperty('--font', main);
                        }
                    };
                </script>

                <div class="config">
                    <p>Modo escuro</p>
                    <div class="skeuo">
                        <input type="checkbox" name="" id="mode" onchange="changeMode()">
                        <div class="skeou-circle"></div>
                    </div>
                </div>
                <div class="config">
                    <p>Cor destaque</p>
                    <input type="color" name="" id="input-color" onchange="changeColor()">
                </div>
            </div>
            
            
            <div class="button-container save">          
                <br>
                <br>
                <p class="clickable black button title" onclick="saveChanges()">
                    Salvar Alterações
                </p>
                <br>
            </div>

        </div>
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

</body>
</html>