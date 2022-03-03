<header>
    <h3 class="title">
        <a href="index.php?pag=entrance">
            <i class="bi bi-box-arrow-left"></i>
            Sair
        </a>
    </h3>

    <h3 id="header_display">
        <?php            
            //FAZER POR SESSION E NÃO URL
            session_start();
            
            //
            
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

<main class="home">
    <div class="todo">
        <div>
            <input type="checkbox" class="clickable">
            <p class="todo-text">placeholder</p>
        </div>
        <div>
            <i class="clickable bi bi-pencil-fill"></i>
            <i class="clickable bi bi-x-lg"></i>
        </div>
    </div>
    <div class="todo">
        <div>
            <input type="checkbox" class="clickable">
            <p class="todo-text">placeholder</p>
        </div>
        <div>
            <i class="clickable bi bi-pencil-fill"></i>
            <i class="clickable bi bi-x-lg"></i>
        </div>
    </div>
    <div class="todo">
        <div>
            <input type="checkbox" class="clickable">
            <p class="todo-text">placeholder</p>
        </div>
        <div>
            <i class="clickable bi bi-pencil-fill"></i>
            <i class="clickable bi bi-x-lg"></i>
        </div>
    </div>
    <div class="todo">
        <div>
            <input type="checkbox" class="clickable">
            <p class="todo-text">placeholder</p>
        </div>
        <div>
            <i class="clickable bi bi-pencil-fill"></i>
            <i class="clickable bi bi-x-lg"></i>
        </div>
    </div>
    <div class="todo">
        <div>
            <input type="checkbox" class="clickable">
            <p class="todo-text">placeholder</p>
        </div>
        <div>
            <i class="clickable bi bi-pencil-fill"></i>
            <i class="clickable bi bi-x-lg"></i>
        </div>
    </div>
    <div class="todo">
        <div>
            <input type="checkbox" class="clickable">
            <p class="todo-text">placeholder</p>
        </div>
        <div>
            <i class="clickable bi bi-pencil-fill"></i>
            <i class="clickable bi bi-x-lg"></i>
        </div>
    </div>
</main>

<section class="todo-input">
    <input type="text">
    <br>
    <p class="button clickable"> Adicionar </p>
</section>