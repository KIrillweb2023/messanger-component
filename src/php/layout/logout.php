<?php
   session_start();
   require ('php/functions/func_logout.php');
   if(isset($_SESSION['unique_id'])){
        header("location: ./index-chat.php");
   }    
?>

    <div class="main__wrapper__registr">
        <div class="main__wrapper__registr__title">RoomChat</div>
        <div class="main__wrapper__registr__subtitle">Создайте учетную запись</div>
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" class="main__wrapper__registr__add">
            <div class="main__wrapper__registr__add-input name">
                <label for="name" class="main__wrapper__registr__add-input__label">Ваше ник</label>
                <input type="text" name="fname" id="name" placeholder="Глебасик" class="main__wrapper__registr__add-input__input">
            </div>
            <div class="main__wrapper__registr__add-input email">
                <label for="email-reg" class="main__wrapper__registr__add-input__label">Ваша почта</label>
                <input type="text" name="email" id="email-reg" placeholder="exaple@mail.ru" class="main__wrapper__registr__add-input__input">
            </div>
            <div class="main__wrapper__registr__add-input password">
                <label for="password-reg" class="main__wrapper__registr__add-input__label">Ваше пароль</label>
                <input type="password" name="password" id="password-reg"  placeholder="****" class="main__wrapper__registr__add-input__input">
            </div>
            <div class="main__wrapper__registr__add-button exitReg"><img src="./icons/arrow/arrow-left.svg" alt=""><div class="text">Назад</div></div>
            <button type="submit" class="main__wrapper__registr__add-button registr">Создать</button>
        </form>
        <div class="main__wrapper__registr__line"></div>
        <button class="main__wrapper__registr__btn">Войти</button>
    </div> 
</div>