<?php
	echo '
        <form action="" class="login">
            <br> <h1> Login </h1> <br>

            <div class="user">
                <h3> <label for=""> Usuario </label> </h3>
                <br>
                <input type="text" name="" id="">
            </div>

            <div class="pass">
                <h3> <label for="">Senha</label> </h3> <br>
                
                <div class="pass-icons">
                    <i id="show-password" onclick="toggleLoginPass()" class="bi bi-eye-fill clickable"></i>
                    <i style="visibility: hidden" onclick="toggleLoginPass()" id="hide-password" class="bi bi-eye-slash-fill clickable"></i>
                </div>

                <input type="password" name="" id="login_pass">
            </div>

            <br>
                <h2> <a href="index.php?pag=home" class="button"> Logar </a> </h2>
                <h3> <a href="index.php?pag=register" class="link"> Criar conta </a> </h3>
            <br>
        </form>
    ';
?>