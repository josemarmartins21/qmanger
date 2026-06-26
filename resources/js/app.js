

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

var overlay = document.getElementById('overlay')
//var btn = document.getElementById('float-btn')
var modal = document.getElementById('modal')

overlay.addEventListener('click', showModal) // Modal
btn.addEventListener('click', showModal) // Modal



function showModal(texto) {
    var wantOpen = overlay.classList.contains('hidden')
    var o = overlay
    var m = modal
    
    if (wantOpen) {
        setBoxPositionToOpen(o)   
        setBoxPositionToOpen(m)
        
        paragrafo.innerText = texto
    }
    
    if (! wantOpen) {
        alternarClass(o) 
        alternarClass(m) 
    } 
}


function alternarClass(o) {
    o.classList.toggle('hidden') 
}

function setBoxPositionToOpen(o) {
    alternarClass(o)
    o.classList.add('abrir') 
}


var btnTheme = document.getElementById('btn-theme')

// Persistência do tema
const temasalvo = localStorage.getItem('tema');
changeMode(temasalvo === 'escuro')

btnTheme.addEventListener('click', () => {
  var corpo = document.getElementById('corpo')
  const isescuro = corpo.classList.toggle('dark');

  changeMode(isescuro);
  localStorage.setItem('tema', isescuro ? 'escuro' : 'claro');
}) // Dark Mode

function changeMode(tipo) {
    if (tipo == true) {
        corpo.classList.add('dark')
        btnTheme.innerHTML = '<i class="fa-solid fa-sun"></i>';
        return
    } 

    if (tipo == false) {
        corpo.classList.remove('dark')
        btnTheme.innerHTML = '<i class="fa-solid fa-moon"></i>';
        return
    }
}