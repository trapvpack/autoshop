<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/SingletonConnection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/deal/DealService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/deal/DealRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/user/UserRouter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/user-init.php';


$service = new DealService(
    new DealRepository(SingletonConnection::connection()),
    new CarRepository(SingletonConnection::connection())
);
$userRouter = new UserRouter(
    new UserService(
        new UserRepository(SingletonConnection::connection())
    )
);

$userRouter->handle();
$repo = new CarRepository(SingletonConnection::connection());
$cars = $repo->fetchCars();

$userRouter->handle();
$deals = $service->deals();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="#">Модели</a>
                    <a class="nav-link" href="#">Выбор и покупка</a>
                    <a class="nav-link" href="#">Авто в наличии</a>
                    <a class="nav-link" href="#">Авто с пробегом</a>
                    <a href="/autoshop">
                        <div class="main-image">
                            <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 18" width="80" height="18" preserveAspectRatio="xMidYMid" class="color-black site-header__logo-icon"><path id="Layer" d="M46.64 15.92c0 .15.04.23.13.23.07 0 .13-.03.2-.07L71.75.63c.44-.28.83-.43 1.43-.43h5.45c.84 0 1.4.54 1.4 1.35v9.97c0 1.2-.27 1.9-1.4 2.55l-6.61 3.8c-.08.06-.16.08-.22.08-.08 0-.15-.05-.15-.27V6.03c0-.13-.04-.23-.14-.23-.07 0-.12.03-.19.07L53.2 17.16c-.51.32-.92.41-1.39.41H39.79c-.83 0-1.4-.54-1.4-1.34V1.86c0-.1-.05-.19-.13-.19-.07 0-.13.02-.2.06L26.11 8.62c-.12.07-.15.14-.15.19 0 .05.02.09.11.17l8.53 8.18c.11.11.19.2.19.28 0 .09-.12.14-.27.14H26.8c-.6 0-1.07-.09-1.4-.4l-5.18-4.97c-.06-.06-.1-.08-.15-.08a.45.45 0 00-.17.05l-8.65 5c-.52.3-.88.39-1.4.39H1.88c-.84 0-1.4-.54-1.4-1.34V6.44c0-1.22.27-1.9 1.4-2.55L8.53.06c.07-.04.12-.05.18-.05.09 0 .15.1.15.31v13.1c0 .13.04.2.14.2.05 0 .12-.04.19-.08L31.65.59c.53-.31.86-.4 1.48-.4h12.09c.84 0 1.4.54 1.4 1.34l.02 14.39z" fill="currentColor"></path></svg>
                        </div>
                    </a>
                    <a class="nav-link" href="#">Авто по подписке</a>
                    <a class="nav-link" href="#">Владельцам</a>
                    <a class="nav-link" href="#">Бренд Kia</a>
                    <a class="nav-link" href="#">Дилеры</a>
                </div>
                <div>





                    <?php if (isset($_SESSION['USER_ID']) == false):?>
                        <a href = "/autoshop/view/authview.php">
                            <button class="btn btn-primary">Войти</button>
                        </a>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['USER_ID']) == false):?>
                        <a href = "/autoshop/view/registrationview.php">
                            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                        </a>
                    <?php endif; ?>



                    <?php if (isset($_SESSION['USER_ID'])):?>

                        <span><?= htmlspecialchars($current['fio'])?></span>
                        <a href="/autoshop/logout.php">
                            <button class="btn btn-primary" >Log out</button>
                        </a>
                    <?php endif; ?>
                    <a class="header-svg" href="#"><svg class="item-shop" width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" class="block" data-v-ecf83df2=""><path d="M1 2l5-1 1 11 13-2V4H6" stroke="currentColor" stroke-width="1.5" data-v-ecf83df2=""></path><circle cx="8" cy="17" r="1.75" stroke="currentColor" stroke-width="1.5" data-v-ecf83df2=""></circle><circle cx="18" cy="17" r="1.75" stroke="currentColor" stroke-width="1.5" data-v-ecf83df2=""></circle></svg></a>
                    <a class="header-svg" href="#"><svg class="item-favorite" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" class="block" data-v-7920c350=""><path d="M10.739 17.243l.016-.016.018-.015c2.353-2.01 4.237-3.644 5.54-5.176 1.297-1.524 1.937-2.855 1.937-4.253 0-2.258-1.8-4.033-4.2-4.033-1.315 0-2.64.603-3.486 1.57L10 5.964l-.564-.644c-.847-.967-2.17-1.57-3.486-1.57-2.4 0-4.2 1.775-4.2 4.033 0 1.398.64 2.73 1.936 4.253 1.304 1.532 3.188 3.165 5.541 5.176l.018.015.016.016.739.714.739-.714z" stroke="currentColor" stroke-width="1.5" data-v-7920c350=""></path></svg></a>



                </div>
            </div>
        </div>
    </nav>
    <div class="bottom-nav-container">
        <div class="rio">
            <a class="rio-color"  href="">Rio</a>
        </div>
        <div class="price-container">
            <span class="header-price">от 1 434 900 ₽</span>
            <a class="item-bott" href="#"><svg class="item-bottom" data-v-93845752="" data-v-20163e07="" width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none" preserveAspectRatio="xMidYMid" class="cursor-pointer button-icon__icon color-white button-icon__icon_white"><circle data-v-93845752="" cx="10" cy="10" r="9.25" stroke="currentColor" stroke-width="1.5"></circle><path data-v-93845752="" d="M9 15h2V8.5H9V15z" fill="currentColor"></path><circle data-v-93845752="" cx="10" cy="6.25" r="1.25" fill="currentColor"></circle></svg></a>
        </div>
        <div class="botom-header-rightside-link-padding">
            <a class="botom-header-rightside-link" href="#">Конфигуратор</a>
        </div>
        <div class="bottom-header-links">
            <a class="bottom-nav-link" href="#">Обзор</a>
            <a class="bottom-nav-link" href="#">Комплектации и цены</a>
            <a class="bottom-nav-link" href="#">Характеристики</a>
            <a class="bottom-nav-link" href="#">Тест-драйв</a>


            <div class="mark-bottom-header">
                <button type="button" class="header-mark-button" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg data-v-44167c65="" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" class=""><path data-v-44167c65="" d="M5 8l5 5 5-5" stroke="currentColor" stroke-width="2"></path></svg>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><button class="dropdown-item" type="button">Рассчитать кредит</button></li>
                    <li><button class="dropdown-item" type="button">Рассчитать трейд-ин</button></li>
                    <li><button class="dropdown-item" type="button">Авто в наличии</button></li>
                    <li><button class="dropdown-item" type="button">Заявка диллеру</button></li>
                    <li><button class="dropdown-item" type="button">Брошюра</button></li>
                    <li><button class="dropdown-item" type="button">Галерея</button></li>
                </ul>
            </div>



        </div>

    </div>
</header>


<main>

    <div class="picture-loader-container">
        <form enctype="multipart/form-data" method="post"
              action="/autoshop/change-picture.php">
            <div class="mb-3">
                <label for="formFile" class="form-label">Выбирете новую
                    картинку</label>
                <input name="picture-input" class="form-control" type="file"
                       id="formFile">
                <div class="change-picture-submit">
                    <button type="submit" class="btn btn-primary mb-2 "> Изменить
                        картинку
                    </button>
                </div>
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>"/>
            </div>
        </form>
    </div>

</main>

<footer class="background-color">
    <div >
        <div class="foo-text-container"><span class="foo-text1">На автомобилях Kia Rio и Rio X, произведенных с 16 ноября 2020 года, изготовителем может быть установлена «Телематическая система Mobikey (базовая версия)» в качестве дополнительного оборудования. <br>
          Информацию о наличии/отсутствии данного устройства на автомобиле можно получить у Дилера Kia.</span>
            <br>
            <br>
            <span class="foo-text2"><p>Сведения о ценах на продукцию бренда Kia, содержащиеся на сайте, носят исключительно информационный характер. Указанные цены могут отличаться от действительных цен дилеров Kia.</p></span>
            <span class="footer-more">Подробнее</span>
            <a href="#"><svg data-v-44167c65="" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" class="foo-mark"><path data-v-44167c65="" d="M5 8l5 5 5-5" stroke="currentColor" stroke-width="2"></path></svg></a>

        </div>
    </div>

    <div class="footer-logo"><svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 18" width="80" height="18" preserveAspectRatio="xMidYMid" class="footer__logo"><path id="Layer" d="M46.64 15.92c0 .15.04.23.13.23.07 0 .13-.03.2-.07L71.75.63c.44-.28.83-.43 1.43-.43h5.45c.84 0 1.4.54 1.4 1.35v9.97c0 1.2-.27 1.9-1.4 2.55l-6.61 3.8c-.08.06-.16.08-.22.08-.08 0-.15-.05-.15-.27V6.03c0-.13-.04-.23-.14-.23-.07 0-.12.03-.19.07L53.2 17.16c-.51.32-.92.41-1.39.41H39.79c-.83 0-1.4-.54-1.4-1.34V1.86c0-.1-.05-.19-.13-.19-.07 0-.13.02-.2.06L26.11 8.62c-.12.07-.15.14-.15.19 0 .05.02.09.11.17l8.53 8.18c.11.11.19.2.19.28 0 .09-.12.14-.27.14H26.8c-.6 0-1.07-.09-1.4-.4l-5.18-4.97c-.06-.06-.1-.08-.15-.08a.45.45 0 00-.17.05l-8.65 5c-.52.3-.88.39-1.4.39H1.88c-.84 0-1.4-.54-1.4-1.34V6.44c0-1.22.27-1.9 1.4-2.55L8.53.06c.07-.04.12-.05.18-.05.09 0 .15.1.15.31v13.1c0 .13.04.2.14.2.05 0 .12-.04.19-.08L31.65.59c.53-.31.86-.4 1.48-.4h12.09c.84 0 1.4.54 1.4 1.34l.02 14.39z" fill="currentColor"></path></svg></div>
    <br>
    <br>



    <div class="footer-lists">
        <div class="container text-center foo-list">
            <div class="row row-cols-5 ">
                <div class="col all-lists-settings">
                    <a class=" list1-sets" href="#">Модели</a> <br> <br>
                    <a class=" list1-sets" href="#">Авто в наличии</a> <br> <br>
                    <a class=" list1-sets" href="#">Авто с пробегом</a> <br> <br>
                    <a class=" list1-sets" href="#">Дилеры</a> <br> <br>
                </div>

                <div class="col all-lists-settings">
                    <span class=" list1-sets" href="#">Выбор и покупка</span> <br> <br>
                    <div class="margin-bot"> <a class=" list2-sets" href="#">Запись на тест-драйв</a></div>
                    <div class="margin-bot"><a class=" list2-sets" href="#">Рассчёт кредита</a></div>
                    <div class="margin-bot"><a class=" list2-sets" href="#">Конфигуратор</a></div>
                    <div class="margin-bot"><a class=" list2-sets" href="#">Автомобили по подписке</a></div>
                    <div class="margin-bot"><a class=" list2-sets" href="#">Корпоративным клиентам</a></div>
                </div>

                <div class="col all-lists-settings">
                    <span class=" list1-sets" href="#">Владельцам</span> <br> <br>
                    <div class="margin-bot"> <a class=" list2-sets" href="#">Онлайн запись на сервис</a></div>
                    <div class="margin-bot"><a class=" list2-sets" href="#">Аксессуары</a></div>
                    <div class="margin-bot"><a class=" list2-sets" href="#">Запчасти</a></div>
                    <div class="margin-bot"><a class=" list2-sets" href="#">Рассчет стоимости ТО</a></div>
                    <div class="margin-bot"><a class=" list2-sets" href="#">Документация</a></div>
                </div>
                <div class="col all-lists-settings">
                    <span class=" list1-sets" href="#">Бренд Kia</span> <br> <br>
                    <div class="margin-bot"><a class=" list2-sets" href="#">Новый бренд Kia</a></div>
                    <div class="margin-bot"><a class=" list2-sets" href="#">Дизайн</a></div>
                    <div class="margin-bot"><a class=" list2-sets" href="#">История Киа</a></div>
                    <div class="margin-bot"><a class=" list2-sets" href="#">Технология</a></div>
                    <div class="margin-bot"><a class=" list2-sets" href="#">Журнал E-MOTION</a></div>
                </div>
                <div class="col all-lists-settings contacts-foo">
                    <div class="kia-chat">
                        <span class=" list1-sets" href="#">Чат с Kia</span> <br> <br>
                        <a class="text-contacts" href="#"><div class="img"><img class="img-scale" src="images/chat-bot.png" alt=""></div>&emsp;Веб-чат
                        </a>

                        <br> <br>

                        <a class="text-contacts" href="#">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" data-v-5d78d8cb=""><g clip-path="url(#clip0_25257_80032)" data-v-5d78d8cb=""><path d="M14.93 4.08334e-05C10.9639 0.0185495 7.16654 1.60707 4.36862 4.41811C1.5707 7.22915 -4.31863e-05 11.0339 8.90544e-10 15C8.90551e-10 18.9783 1.58035 22.7936 4.3934 25.6066C7.20644 28.4197 11.0218 30 15 30C18.9782 30 22.7936 28.4197 25.6066 25.6066C28.4196 22.7936 30 18.9783 30 15C30 11.0218 28.4196 7.20648 25.6066 4.39344C22.7936 1.58039 18.9782 4.08334e-05 15 4.08334e-05C14.9767 -1.36111e-05 14.9533 -1.36111e-05 14.93 4.08334e-05V4.08334e-05ZM21.1325 9.03004C21.2575 9.02754 21.5338 9.05879 21.7138 9.20504C21.8334 9.30891 21.9096 9.45388 21.9275 9.61129C21.9475 9.72754 21.9725 9.99379 21.9525 10.2013C21.7275 12.5738 20.75 18.3288 20.2525 20.985C20.0425 22.11 19.6287 22.4863 19.2275 22.5225C18.3575 22.6038 17.6963 21.9475 16.8525 21.395C15.5325 20.5288 14.7862 19.99 13.505 19.145C12.0237 18.17 12.9838 17.6325 13.8275 16.7575C14.0488 16.5275 17.8863 13.0363 17.9613 12.72C17.97 12.68 17.9787 12.5325 17.8912 12.455C17.8037 12.3775 17.6738 12.4038 17.58 12.425C17.4475 12.455 15.3388 13.85 11.2538 16.6063C10.6538 17.0188 10.1125 17.2188 9.62625 17.2063C9.09125 17.1963 8.06125 16.905 7.295 16.6563C6.355 16.35 5.60875 16.1888 5.67375 15.67C5.7075 15.4 6.08 15.1238 6.79 14.8413C11.1625 12.9363 14.0775 11.68 15.5375 11.0738C19.7025 9.34129 20.5688 9.04004 21.1325 9.03004V9.03004Z" fill="white" data-v-5d78d8cb=""></path></g> <defs data-v-5d78d8cb=""><clipPath id="clip0_25257_80032" data-v-5d78d8cb=""><rect width="30" height="30" fill="white" data-v-5d78d8cb=""></rect></clipPath></defs></svg>
                            &emsp;Telegram
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" data-v-5d78d8cb="" class=""><path d="M8.5 14l4-4-4-4" stroke="currentColor" stroke-width="2" data-v-5d78d8cb=""></path></svg>
                        </a>

                        <br> <br>

                        <a class="text-contacts" href="#">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" data-v-5d78d8cb=""><circle cx="15" cy="15" r="15" fill="white" data-v-5d78d8cb=""></circle> <path d="M14.4037 16.5916C15.2006 17.417 16.1648 18.0543 17.2285 18.4587L18.6677 17.2893C18.7103 17.2593 18.7609 17.2432 18.8127 17.2432C18.8645 17.2432 18.9151 17.2593 18.9578 17.2893L21.6299 19.0473C21.7314 19.1096 21.8172 19.1951 21.8808 19.2971C21.9443 19.3991 21.9837 19.5148 21.9959 19.635C22.0081 19.7553 21.9928 19.8767 21.9512 19.9899C21.9095 20.103 21.8427 20.2047 21.7559 20.2869L20.5038 21.5499C20.3245 21.7308 20.1041 21.8636 19.8623 21.9364C19.6205 22.0092 19.3649 22.0197 19.1181 21.967C16.6568 21.4479 14.3881 20.2322 12.5714 18.4587C10.795 16.6677 9.56575 14.3887 9.03275 11.8983C8.98009 11.6502 8.99108 11.3925 9.06465 11.15C9.13822 10.9076 9.27187 10.6887 9.45265 10.5145L10.7505 9.23591C10.8309 9.15163 10.9288 9.08699 11.0371 9.04684C11.1453 9.00669 11.261 8.99207 11.3756 9.00407C11.4902 9.01607 11.6006 9.05438 11.6986 9.11613C11.7966 9.17788 11.8797 9.26147 11.9415 9.36064L13.7204 12.0542C13.7511 12.0965 13.7677 12.1478 13.7677 12.2004C13.7677 12.253 13.7511 12.3043 13.7204 12.3466L12.5485 13.785C12.9553 14.8495 13.589 15.8082 14.4037 16.5916Z" fill="#05141F" data-v-5d78d8cb=""></path></svg>
                            &emsp;WhatsApp
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" data-v-5d78d8cb="" class=""><path d="M8.5 14l4-4-4-4" stroke="currentColor" stroke-width="2" data-v-5d78d8cb=""></path></svg>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="contacts-two">

        <div class="space-footer"></div>
        <div class="kia-socials">
            <div class="kia-social-text">

                <div class="kia-number">
                    <div class="kia-number-text">
                        Информационная линия Kia
                        <br>
                        <a class="number-font" href="#">8 800 301 08 80</a>
                    </div>
                </div>

                Kia в соцсетях



                <p></p>
                <a class="foo-items-color" href="#"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" data-v-5d78d8cb="" class=""><circle cx="15" cy="15" r="14.25" stroke="currentColor" stroke-width="1.5"></circle><path fill-rule="evenodd" clip-rule="evenodd" d="M20.403 11.143c.36.372.477 1.217.477 1.217s.12.993.12 1.985v.93c0 .993-.12 1.985-.12 1.985s-.117.845-.477 1.217c-.411.44-.867.486-1.125.512l-.077.008c-1.68.124-4.201.128-4.201.128s-3.12-.03-4.08-.123c-.046-.01-.1-.016-.163-.023-.304-.038-.781-.096-1.16-.502-.36-.372-.477-1.217-.477-1.217S9 16.268 9 15.276v-.93c0-.993.12-1.986.12-1.986s.117-.845.477-1.217c.412-.44.868-.485 1.126-.51l.076-.009c1.68-.124 4.198-.124 4.198-.124h.006s2.518 0 4.198.124l.076.008c.258.026.714.07 1.126.511zm-6.644 1.815v3.445l3.243-1.717-3.243-1.728z" fill="currentColor"></path></svg></a>

                <a class="foo-items-color" href="#"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" data-v-5d78d8cb="" class=""><circle cx="15" cy="15" r="14.25" stroke="currentColor" stroke-width="1.5"></circle><path fill-rule="evenodd" clip-rule="evenodd" d="M15.662 19.528s.244-.026.368-.158c.115-.12.11-.348.11-.348s-.014-1.062.488-1.219c.495-.154 1.131 1.027 1.806 1.482.51.343.897.268.897.268l1.803-.025s.943-.057.496-.784c-.037-.06-.261-.54-1.34-1.523-1.132-1.03-.98-.863.382-2.645.829-1.085 1.16-1.747 1.057-2.03-.099-.271-.709-.2-.709-.2l-2.03.013s-.15-.02-.262.045c-.109.064-.18.214-.18.214s-.32.84-.749 1.554c-.904 1.506-1.265 1.586-1.413 1.492-.344-.218-.258-.876-.258-1.343 0-1.46.226-2.07-.439-2.227-.22-.052-.383-.086-.947-.092-.725-.008-1.338.002-1.685.169-.23.11-.41.358-.3.373.134.017.438.08.599.295.208.278.2.902.2.902s.12 1.718-.279 1.932c-.273.146-.648-.153-1.454-1.52a12.6 12.6 0 01-.725-1.473s-.06-.145-.168-.223c-.13-.094-.311-.123-.311-.123l-1.929.012s-.29.008-.396.132c-.094.11-.007.337-.007.337s1.51 3.468 3.22 5.216c1.568 1.602 3.348 1.497 3.348 1.497h.807z" fill="currentColor"></path></svg></a>

                <a class="foo-items-color" href="#"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" data-v-5d78d8cb="" class=""><circle cx="15" cy="15" r="14.25" stroke="currentColor" stroke-width="1.5"></circle><path fill-rule="evenodd" clip-rule="evenodd" d="M16.352 18.084c.68-.15 1.336-.41 1.94-.776a.926.926 0 00.307-1.303 1 1 0 00-1.35-.297 4.372 4.372 0 01-4.499 0 .999.999 0 00-1.35.297.926.926 0 00.307 1.303c.604.366 1.26.626 1.94.776l-1.868 1.803a.922.922 0 000 1.337.995.995 0 00.693.276c.25 0 .501-.092.693-.276L15 19.452l1.836 1.772a1.003 1.003 0 001.384 0 .921.921 0 000-1.337l-1.868-1.803zM18.333 12.226c0 1.778-1.498 3.225-3.341 3.225-1.843 0-3.342-1.447-3.342-3.225C11.65 10.446 13.15 9 14.992 9s3.341 1.447 3.341 3.226zm-1.96 0c0-.737-.62-1.335-1.384-1.335-.762 0-1.383.598-1.383 1.335 0 .736.62 1.335 1.383 1.335s1.384-.6 1.384-1.335z" fill="currentColor"></path></svg></a>

                <a class="foo-items-color" href="#"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" data-v-5d78d8cb="" class=""><circle cx="15" cy="15" r="14.25" stroke="currentColor" stroke-width="1.5"></circle><path d="M4.003 15.136c.681.027 1.362.045 2.042.079 1.296.062 2.596.124 3.87.402 1.115.244 2.115.701 2.933 1.513.829.822 1.293 1.832 1.537 2.957.2.904.288 1.818.34 2.74.055 1.055.096 2.114.14 3.173h.276c.034-.863.062-1.726.107-2.589.065-1.251.14-2.503.474-3.72.598-2.18 2.021-3.503 4.2-4.033.956-.233 1.929-.326 2.905-.378 1.055-.058 2.114-.096 3.173-.14v-.276c-.68-.027-1.361-.045-2.042-.079-1.296-.062-2.595-.124-3.87-.402-1.114-.244-2.115-.701-2.933-1.513-.828-.822-1.292-1.832-1.536-2.957-.2-.907-.289-1.829-.34-2.757-.056-1.052-.097-2.104-.142-3.156h-.274c-.028.68-.049 1.361-.08 2.039-.058 1.244-.12 2.492-.367 3.72-.241 1.179-.702 2.248-1.571 3.108-.818.811-1.819 1.268-2.933 1.512-.904.2-1.818.29-2.74.34-1.054.056-2.113.097-3.172.142.003.093.003.182.003.275z" fill="currentColor"></path></svg></a>



            </div>
        </div>
    </div>

    <div class="space-footer"></div>
    <div class="space-footer"></div>


    <div class="last-info-foo">
        <div class="feedback-settings"><a class="feedback" href="#"> <div class="feedback-padding">Обратная связь</div> </a></div>
        <p class="text-foo-last">ООО «Киа Россия и СНГ» (115054, г. Москва, Валовая ул., д. 26) ведет деятельность на территории РФ в соответствии с законодательством РФ. Реализуемые товары доступны к получению на территории РФ. Мониторинг потребительского поведения субъектов, находящихся за пределами РФ, не ведется. Информация о соответствующих моделях и комплектациях и их наличии, ценах, возможных выгодах и условиях приобретения доступна у дилеров Kia. Товар сертифицирован. Не является публичной офертой.</p>


    </div>

    <div class="infoo">
        <div class="infootext"> © 2022 ООО «Киа Россия и СНГ»</div>
        <div class="for3bottom">
            <div class="container text-center infootexxxt">
                <div class="row row-cols-3">
                    <div class="col all-lists-settings2"><a class="lastfoo" href="#">Правовая Информация</a></div>
                    <div class="col all-lists-settings2"><a class="lastfoo" href="#">Обработка персольнахы данных</a> </div>
                    <div class="col all-lists-settings2"><a class="lastfoo" href="#">Сообщить об ошибке на сайте</a></div>
                </div>
            </div>
        </div>

    </div>

</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

