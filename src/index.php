<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RoomChat</title>
        <!-- Favicon  -->
        <link rel="icon" type="image/png" sizes="16x16" href="./icons/Favicon/Logo-fav.svg">
        <link rel="stylesheet" href="./css/style.min.css">
    </head>
<body>
    <section class="main">
        <div class="main__language">
            <img src="./icons/lang-icon/lang-icon.svg" alt="lang" class="main__language-img">
            <p class="main__language-text">RU</p>
        </div>
        <div class="main__block">
            <img src="./icons/theme/dark.svg" alt="theme" class="main__block__theme">
        </div>
        <?php require ('php/layout/login.php'); require ('php/layout/logout.php'); require ('php/functions/func_logout.php'); ?>
    </section>
    <script async src="./js/script.js"></script>
</body>
</html>