const darkBTN = document.querySelector('.main__block__theme');
const section = document.querySelector('.main');

function darkTheme(button, section){
    button.addEventListener('click', (e) => {
        section.classList.toggle('active');
        button.setAttribute('src', './icons/theme/theme.svg');
        button.style.animation = "icon-animate-theme 0.3s";
        if(!section.classList.contains('active')){
            button.setAttribute('src', './icons/theme/dark.svg');
            button.style.animation = "";
        }
    });
   
}
darkTheme(darkBTN, section);

const buttonMain = document.querySelector('.main__wrapper__item__btn');
const buttonExit = document.querySelector('.exit');
const wrapperBlock = document.querySelector('.main__wrapper__item');
const modalLog = document.querySelector('.main__wrapper__login');
const modalReg = document.querySelector('.main__wrapper__registr');
const regbutton = document.querySelector('.main__wrapper__login__btn');
const logbutton = document.querySelector('.main__wrapper__registr__btn');
const regExit = document.querySelector('.exitReg');

function showModal(button, exitbutton, mainBlock, modalLog, modalReg, regbutton, logbutton, exitButtonReg){
    button.addEventListener('click', (e) =>{
        mainBlock.style.display = 'none';
        modalLog.classList.add('active');
    });
    exitbutton.addEventListener('click', (e) =>{
        mainBlock.style.display = '';
        modalLog.classList.remove('active');
    });
    if(exitButtonReg){
        exitButtonReg.addEventListener('click', (e) =>{
            modalLog.classList.add('active');
            modalLog.style.display = '';
            modalReg.classList.remove('active');
        });
    }
    regbutton.addEventListener('click', () =>{
        modalLog.style.display = 'none';
        modalReg.classList.add('active');
    });

    if(logbutton){
        logbutton.addEventListener('click', (e) =>{
            modalLog.classList.add('active');
            modalLog.style.display = '';
            modalReg.classList.remove('active');
        });
    }
}

showModal(buttonMain, buttonExit, wrapperBlock, modalLog, modalReg, regbutton, logbutton, regExit);