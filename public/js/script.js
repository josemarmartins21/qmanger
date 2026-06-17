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