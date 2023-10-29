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
if(darkBTN){
    darkTheme(darkBTN, section);
}

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
if(modalLog){
    showModal(buttonMain, buttonExit, wrapperBlock, modalLog, modalReg, regbutton, logbutton, regExit);
}

const searchWrapper = document.querySelector('.chat__wrapper__aside__search');
const btnSearch = document.querySelector('.chat__wrapper__aside__search-close');
const block = document.querySelector('.chat__wrapper__aside__items');
function showSearchBlock(wrapper, btn, block){
    btn.addEventListener('click', (e) =>{
        wrapper.classList.toggle('active');
        if(wrapper.classList.contains('active')){
            block.style.marginTop = '-20px';
            console.log(1);
        } else {
            block.style.marginTop = '';
        }
    });
    
}
showSearchBlock(searchWrapper, btnSearch, block);



const menu = document.querySelector('.menu');
const open = document.querySelector('.chat__wrapper__aside__header-hamburger');
const close = document.querySelector('.menu__block__header-close');



function showMenu(open, menu, close){
    open.addEventListener('click', () =>{
        menu.classList.add('active');
        open.style.background = '#ffffff6d';
        setTimeout(() =>{
            open.style.background = '';
        }, 200);
    });
    close.addEventListener('click', () =>{
        menu.classList.remove('active');
    });
}

if(menu){
    showMenu(open, menu, close);
}



// chat 

const form = document.querySelector('.chat__wrapper__main__send');
const incoming_id = form.querySelector(".incoming_id").value
const chatbox = document.querySelector('.chat__wrapper__main__messange-block');
const btnbox = document.querySelector('.active');
const search = document.querySelector('.chat__wrapper__main__send__search__input');


form.onsubmit = (e)=>{
    e.preventDefault();
}

search.focus();

search.onkeyup = ()=>{
    if(search.value != ""){
        btnbox.classList.add("active");
    }else{
        btnbox.classList.remove("active");
    }
}



btnbox.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/functions/func_chat_get.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              search.value = "";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
chatbox.onmouseenter = ()=>{
    chatbox.classList.add("active");
}

chatbox.onmouseleave = ()=>{
    chatbox.classList.remove("active");
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/functions/func_chat_get.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatbox.innerHTML = data;
            if(!chatbox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500);

function scrollToBottom(){
    chatbox.scrollTop = chatbox.scrollHeight;
  }
  