/* LOGIN */
const hide_pass = document.getElementById('hide-password');
const show_pass = document.getElementById('show-password');

//Quando o botão pra esconder a senha é pressionado o typo do input muda pra password
//e o botão de esconder some e o de mostrar aparece
hide_pass.addEventListener('click', function(){
    hide_pass.style.visibility = 'hidden';
    show_pass.style.visibility = 'visible';
    document.getElementById('login_pass').type = 'password';
}) 
//Função contrária à de esconder a senha
show_pass.addEventListener('click', function(){
    hide_pass.style.visibility = 'visible';
    show_pass.style.visibility = 'hidden';
    document.getElementById('login_pass').type = 'text';
}) 

/* REGISTER */
//hide/show first password
//reg-show-password, reg-hide-password e input: reg-pass

//hide/show second password
//con-show-password, con-hide-password e input: con-pass
