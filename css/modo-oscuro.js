const boton = document.querySelector('#boton');
const localConfig = localStorage.getItem('tema');

if (localConfig === 'dark') {
    document.body.classList.add('modo-oscuro')

} else if (localConfig === 'light') {
    document.body.classList.remove('modo-oscuro')
}

boton.addEventListener('click', () => {
    let colorTema;
    if (document.body.classList.contains('modo-oscuro')){
        document.body.classList.remove('modo-oscuro')
        colorTema = 'light'
    }
    else{
        document.body.classList.add('modo-oscuro') 
        colorTema = 'dark'
    }
    localStorage.setItem('tema', colorTema)
}) 
    
