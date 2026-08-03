import './bootstrap';


/** MENU HAMBURGUER */
var menu = document.getElementById('menu')
var sideBar = document.getElementById('side-bar')
var janela = window
var corpo = document.getElementById('corpo')
var menuIcon = document.getElementById('menu-icon')
menu.addEventListener('click', mostrarMenu)

function mostrarMenu() {
    if (sideBar.classList.contains('hidden')) {
        sideBar.classList.toggle('hidden')
        corpo.classList.add('overflow-hidden')
        menuIcon.classList.remove('fa-solid fa-bars')
        menuIcon.classList.add('')

    } else {
        sideBar.classList.toggle('hidden')
        corpo.classList.remove('overflow-hidden')
        menuIcon.classList.remove('fa-solid fa-bars')
        menuIcon.classList.add('')
    }
}

janela.addEventListener('resize', removerMenu)

function removerMenu() {
    if (janela.innerWidth >= 1025) {
        sideBar.classList.remove('hidden')
        return
    } else {
        sideBar.classList.add('hidden')
        corpo.classList.remove('overflow-hidden')
    }
}
