<?php
	echo '
        <form action="" class="login">
            <br> <h1> Registrar </h1> <br>

            <div class="user">
                <h3> <label for="user"> Usuario </label> </h3>
                <br>
                <input type="text" name="user" id="user">
            </div>



            <div>
                <h3> <label for="">Senha</label> </h3> <br>
                
                <div class="pass-icons">
                    <i onclick="toggleRegisPass()" id="reg-show-pass" style="visibility: visible" class="bi bi-eye-fill clickable"></i>
                    <i onclick="toggleRegisPass()" id="reg-hide-pass" style="visibility: hidden" class="bi bi-eye-slash-fill clickable"></i>
                </div>

                <input type="password" name="" id="reg-pass">
            </div>

            <div>
                <h3> <label for="">Confirme senha</label> </h3> <br>
                
                <div class="pass-icons">
                    <i onclick="toggleConfPass()" id="con-show-pass" style="visibility: visible" class="bi bi-eye-fill clickable"></i>
                    <i onclick="toggleConfPass()" id="con-hide-pass" style="visibility: hidden" class="bi bi-eye-slash-fill clickable"></i>
                </div>
                <input type="password" name="" id="con-pass">
            </div>

            <br> <h2> <a href="index.php?pag=home" class="button"> Criar conta </a> </h2> <br>
        </form>
    ';
?>