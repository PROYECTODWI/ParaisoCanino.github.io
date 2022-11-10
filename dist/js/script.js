document.getElementById("btn_iniciar-sesion").addEventListener("click", login);
document.getElementById("btn_registrarse").addEventListener("click", register);
window.addEventListener("resize", anchoPagina);


//Variables
var container_login_register = document.querySelector(".container_login-register");
var formulario_login = document.querySelector(".formulario_login");
var formulario_register = document.querySelector(".formulario_register");
var caja_trasera_login = document.querySelector(".box_trasera-login");
var caja_trasera_register = document.querySelector(".box_trasera-register");

function anchoPagina(){
    if (window.innerWidth > 850) {
        caja_trasera_login.style.display = "block";
        caja_trasera_register.style.display = "block";
        // container_login_register.style.left = "10px";
    }else{
        caja_trasera_register.style.display = "block"
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        formulario_register.style.display = "none";
        container_login_register.style.left = "0px"
    }
}

anchoPagina();

function login(){
    if(window.innerWidth > 850){
        formulario_register.style.display = "none"; 
        container_login_register.style.left = "10px";
        formulario_login.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.opacity = "0";
    }else{
        formulario_register.style.display = "none"; 
        container_login_register.style.left = "0px";
        formulario_login.style.display = "block";
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "none";
    }
}

function register(){
    if(window.innerWidth > 850){
        formulario_register.style.display = "block"; 
        container_login_register.style.left = "410px";
        formulario_login.style.display = "none";
        caja_trasera_register.style.opacity = "0";
        caja_trasera_login.style.opacity = "1";
    }else{
        formulario_register.style.display = "block"; 
        container_login_register.style.left = "0px";
        formulario_login.style.display = "none";
        caja_trasera_register.style.display = "none";
        caja_trasera_login.style.display = "block";
        caja_trasera_login.style.opacity = "1";
    }
    
}