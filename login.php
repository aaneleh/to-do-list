
<form method="POST" action="actions.php" class="login">
    <input type="hidden" name="action" value="login">

    <br> <h1> Login </h1> <br>

    <div class="user">
        <h3> <label for=""> Usuario </label> </h3>
        <br>
        <input type="text" name="user" id="user_input">
    </div>

    <div class="pass">
        <h3> <label for="">Senha</label> </h3> <br>
        
        <div class="pass-icons">
            <i id="show-password" onclick="toggleLoginPass()" class="bi bi-eye-fill clickable"></i>
            <i style="visibility: hidden" onclick="toggleLoginPass()" id="hide-password" class="bi bi-eye-slash-fill clickable"></i>
        </div>

        <input type="password" name="password" id="login_pass">
    </div>

    <?php 
        //se tem um status e não ta vazio
        if (isset($_GET['status']) and !empty($_GET['status'])) {
            //se o usuario não existe
            if ($_GET['status'] == 'usernotfound'){
                echo '<p style="color:red"><br>&nbsp&nbspUsuário não encontrado!</p>';
            //se a senha está errada
            } else if ($_GET['status'] == 'wrongpass') {
                echo '<p style="color:red"><br>&nbsp&nbspSenha incorreta!</p>';
            }
        }
    ?>

    <br>
        <input class="clickable button"type="submit" name="submit" value="Logar"  style="border: none; font-size: 24px; font-weight: 700">
        <h3> <a href="index.php?pag=register" class="link"> Criar conta </a> </h3>
    <br>
</form>
