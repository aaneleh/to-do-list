/* CONFIG */
function toggleConfig(){
    const container = document.getElementById('config');
    container.classList.toggle('active');
}

/* LOGIN */
function toggleLoginPass(){
    const login_pass = document.getElementById('login_pass');
    const hide_pass = document.getElementById('hide-password');
    const show_pass = document.getElementById('show-password');

    //if hidden, show
    if(login_pass.type == 'password') {
        hide_pass.style.visibility = 'visible';
        show_pass.style.visibility = 'hidden';
        login_pass.type = 'text';
    }
    //if shown, hide
    else if (login_pass.type == 'text') {
        hide_pass.style.visibility = 'hidden';
        show_pass.style.visibility = 'visible';
        login_pass.type = 'password';
    }
    else {       
        console.log('error on toggle login password visibility function');
    }
}

/* REGISTER */
function toggleRegisPass(){
    const regisPass = document.getElementById('reg-pass');
    const regis_show = document.getElementById('reg-show-pass');
    const regis_hide = document.getElementById('reg-hide-pass');
    //if hidden, show
    if(regisPass.type == "password"){
        regisPass.type = 'text';
        regis_hide.style.visibility = 'visible';
        regis_show.style.visibility = 'hidden';
    } //if shown, hide
    else if (regisPass.type == "text"){
        regisPass.type = "password";
        regis_hide.style.visibility = 'hidden';
        regis_show.style.visibility = 'visible';
    } else {
        console.log('error');
    }
}
function toggleConfPass(){
    const confPass = document.getElementById('con-pass');
    const conf_show = document.getElementById('con-show-pass');
    const conf_hide = document.getElementById('con-hide-pass');
    //if hidden, show
    if(confPass.type == "password"){
        confPass.type = 'text';
        conf_hide.style.visibility = 'visible';
        conf_show.style.visibility = 'hidden';
    } //if shown, hide
    else if (confPass.type == "text"){
        confPass.type = "password";
        conf_hide.style.visibility = 'hidden';
        conf_show.style.visibility = 'visible';
    } else {
        console.log('error');
    }
}

/*** HOME ***/

//no caso de adicionar um novo 

