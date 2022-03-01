<?php
	echo '
        <div class="entrance">

            <h1 id="welcome">Bem-vindo</h1> <!-- se houver algo no local storage (seja o user ou tarefas) muda pra "Bem-vindo de volta!"-->
            
            <div class="entrance-options">
                <h2> <a href="index.php?pag=login" class="button">Login</a> </h2>
                <br> <br>
                <h3> <a href="index.php?pag=home" class="link">Continuar sem login</a> </h3>
                <br>
            </div>
        </div>
    ';
?>