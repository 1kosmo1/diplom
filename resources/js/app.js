import './bootstrap';
import '@fortawesome/fontawesome-free/css/all.min.css';

let authBtn = document.getElementsByClassName('auth-btn')[0]
let regBtn = document.getElementsByClassName('reg-btn')[0]
let modalAuth = document.getElementsByClassName('modal-auth')[0]
let modalReg = document.getElementsByClassName('modal-reg')[0]
let closeModalBtnAuth = modalAuth.getElementsByClassName('close-modal-btn')[0]
let closeModalBtnReg = modalReg.getElementsByClassName('close-modal-btn')[0]

authBtn.onclick = function(){
    if(modalAuth.style.display === "none"){
        modalAuth.style.display = "block"
    }
    else{
        modalAuth.style.display = "none"
    }
}

regBtn.onclick = function () {
    if(modalReg.style.display === "none"){
        modalReg.style.display = "block"
    }
    else{
        modalReg.style.display = "none"
    }
}

closeModalBtnAuth.onclick = function (){
    modalAuth.style.display = "none"
}

closeModalBtnReg.onclick = function (){
    modalReg.style.display = "none"
}
