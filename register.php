<form method="POST" action="actions.php" class="login">
    <input type="hidden" name="action" value="register">

    <br> <h1> Registrar </h1> <br>

    <div class="user">
        <h3> <label for="user"> Usuario </label> </h3>
        <br>
        <input type="text" name="user">
    </div>


    <div>
        <h3> <label for="password">Senha</label> </h3> <br>
        
        <div class="pass-icons">
            <i onclick="toggleRegisPass()" id="reg-show-pass" style="visibility: visible" class="bi bi-eye-fill clickable"></i>
            <i onclick="toggleRegisPass()" id="reg-hide-pass" style="visibility: hidden" class="bi bi-eye-slash-fill clickable"></i>
        </div>

        <input type="password" name="password" id="reg-pass">
    </div>

    <div>
        <h3> <label for="">Confirme senha</label> </h3> <br>
        
        <div class="pass-icons">
            <i onclick="toggleConfPass()" id="con-show-pass" style="visibility: visible" class="bi bi-eye-fill clickable"></i>
            <i onclick="toggleConfPass()" id="con-hide-pass" style="visibility: hidden" class="bi bi-eye-slash-fill clickable"></i>
        </div>
        <input type="password" name="password-confirm" id="con-pass">

        <?php 
        //se tem um status, e não ta vazio e é "passwordmatch", mostra o aviso
            if (isset($_GET['status']) and !empty($_GET['status'] and $_GET['status'] == 'passwordmatch')) {
                echo '<p style="color:red"><br>&nbsp&nbspAs senhas não são iguais!</p>';
            }
        ?>
    </div>

    <br>
    <input class="clickable button"type="submit" name="submit" value="Criar conta"  style="border: none; font-size: 19px; font-weight: 700">
    <br>
</form>
