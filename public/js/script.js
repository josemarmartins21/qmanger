var overlay = document.getElementById('overlay')
var btn = document.getElementById('modal-btn')
var modal = document.getElementById('modal')
var btnTheme = document.getElementById('btn-theme')
var btnCloseModal = document.getElementById('close-modal-btn')


overlay.addEventListener('click', showModal) // Modal
btnCloseModal.addEventListener('click', showModal) // Modal

document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.card')
    
    cards.forEach(card => {
        const cardBtn = card.querySelector('.ver-mais')
        const item = card.dataset.item
        let instacia = null

        if (item) {
            try {
                instacia = JSON.parse(item)
            } catch (error) {
                console.warn('Dados do card inválidos:', item)
            }
        }

        if (cardBtn) {
            cardBtn.addEventListener('click', () => {
                showModal(instacia)
            })
        }
    });
})

function showModal(dado) {
    var title = document.getElementById('modal-title')
    var price = document.getElementById('modal-price')
    var velocity = document.getElementById('modal-velocity')
    var description = document.getElementById('modal-description')
    
    var wantOpen = overlay.classList.contains('hidden')
    var o = overlay
    var m = modal

    if (wantOpen) {
        setBoxPositionToOpen(o)   
        setBoxPositionToOpen(m)
    }
    
    if (! wantOpen) {
        alternarClass(o) 
        alternarClass(m) 
    } 

    title.innerText = dado.name;
    price.innerText = 'AOA' + dado.price;
    velocity.innerText = dado.velocity_download + ' Mbps';
    description.innerText = dado.description;
    
}


function alternarClass(o) {
    o.classList.toggle('hidden') 
}

function setBoxPositionToOpen(o) {
    alternarClass(o)
    o.classList.add('abrir') 
}




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