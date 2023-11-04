<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: ./index-chat.php");
    }
?>
<div class="main__wrapper">
    <div class="main__wrapper__item">
        <div class="main__wrapper__item__logo">
            <h2 class="main__wrapper__item__logo-text">RC</h2>
        </div>
        <h1 class="main__wrapper__item__title">RoomChat</h1>
        <p class="main__wrapper__item__subtitle">Добро пожаловать в RoomChat</p>
        <button class="main__wrapper__item__btn">
            <h4 class="main__wrapper__item__btn-text">Продолжить</h4>
            <img src="./icons/arrow/arrow-right.svg" alt="rigth" class="main__wrapper__item__btn-img">
        </button>
    </div>

    <div class="main__wrapper__login">
        <div class="main__wrapper__login__title">RoomChat</div>
        <div class="main__wrapper__login__subtitle">Войдите в учетную запись</div>

        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" class="main__wrapper__login__add">
            <div class="main__wrapper__login__add-input name">
                <label for="name-login" class="main__wrapper__login__add-input__label">Ваша почта</label>
                <input type="text" name="email" id="name-login" placeholder="example@mail.ru" class="main__wrapper__login__add-input__input">
            </div>
            <div class="main__wrapper__login__add-input password">
                <label for="password-login" class="main__wrapper__login__add-input__label">Ваш пароль</label>
                <input type="password" name="password" id="password-login" placeholder="****" class="main__wrapper__login__add-input__input">
            </div>
            <div class="main__wrapper__login__add-button exit"><img src="./icons/arrow/arrow-left.svg" alt=""><div class="text">Назад</div></div>
            <button class="main__wrapper__login__add-button login">Войти</button>
        </form>

        <div class="main__wrapper__login__line"></div>
        <button class="main__wrapper__login__btn">Создать новый аккаунт</button>
    </div> 
    
    <?php require_once ("php/layout/logout.php"); require_once ('php/functions/func_login.php'); ?>
    
    <div class="main__subwrapper">
        <div class="main__subwrapper__line"></div>
        <p class="main__subwrapper__text">Все права защищены || RoomChat || 2023</p>
    </div>

    <div class="main__background"></div>
 </div>
