import './bootstrap';
import '@fortawesome/fontawesome-free/css/all.min.css';

var authBtn = document.getElementsByClassName('auth-btn')[0]
var regBtn = document.getElementsByClassName('reg-btn')[0]
var modalAuth = document.getElementsByClassName('modal-auth')[0]
var modalReg = document.getElementsByClassName('modal-reg')[0]
var closeModalBtnAuth = modalAuth.getElementsByClassName('close-modal-btn')[0]
var closeModalBtnReg = modalReg.getElementsByClassName('close-modal-btn')[0]

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

var images = document.querySelectorAll('.public-gallery .photo')

