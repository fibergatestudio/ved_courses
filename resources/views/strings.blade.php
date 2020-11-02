<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css"/>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- Burger-menu (begin)-->
    <ul class="menu_title-wrapper">
        <li class="menu_title-inner">
            <div class="menu_burger-clone">
                <span></span>
                <span></span>
                <span></span>
                <span></span>                
            </div>
        </li>
        <li class="menu_title-inner">
            <a class="menu_title-link" href="##">Про ресурс</a>
        </li>
        <li class="menu_title-inner">
            <a class="menu_title-link" href="##">Тематичні напрями</a>
        </li>
        <li class="menu_title-inner">
            <a class="menu_title-link" href="##">Студент</a>
        </li>
        <li class="menu_title-inner">
            <a class="menu_title-link" href="##">Викладач</a>
        </li>
        <li class="menu_title-inner">
            <a class="menu_title-link" href="##" data-toggle="modal" data-target="#exampleModal">Увійти</a>
        </li>
    </ul>
    <!-- Burger-menu (end)-->

        <!-- registration modal-page (begin) -->

        <div class="bootstrap-restyling modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                   
                    <div class="modal-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <img class="entrance-logo" src="assets/img/entrance-logo.svg" alt="logo">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Увійти</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Зареєструватися</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                               <div class="entrance-wrapper">
    
                                    <h3 class="entrance-title">Увійти  з допомогою </h3>
                                    <div class="entrance-social">
                                        <div class="entrance-social_item">
                                            <a href="##"><picture> <source srcset="assets/img/login-google-small.png" media="(max-width:768px"> <img  class="entrance-social_image" src="assets/img/login-google.png" alt="img"></a></picture> 
                                        </div>
                                        <div class="entrance-social_item">
                                            <a href="##"><picture> <source srcset="assets/img/login-facebook-small.png" media="(max-width:768px"> <img  class="entrance-social_image" src="assets/img/login-facebook.png" alt="img"></a></picture> 
                                        </div>
                                        <div class="entrance-social_item">
                                            <a href="##"><picture> <source srcset="assets/img/login-instagram-small.png" media="(max-width:768px"> <img  class="entrance-social_image" src="assets/img/login-instagram.png" alt="img"></a></picture> 
                                            </div>
                                        <div class="entrance-social_item">
                                            <a href="##"><picture> <source srcset="assets/img/login-mono-small.png" media="(max-width:768px"> <img  class="entrance-social_image" src="assets/img/login-mono.png" alt="img"></a></picture> 
                                            </div>
                                        <div class="entrance-social_item">
                                            <a href="##"><picture> <source srcset="assets/img/login-privatebank-small.png" media="(max-width:768px"> <img  class="entrance-social_image" src="assets/img/login-privatebank.png" alt="img"></a></picture> 
                                            </div>
                                    </div>
                                    <div class="entrance-separator"></div>
                                    <p>або</p>
                                    <label class="entrance-label">Електронна адреса</label>
                                    <input class="entrance-input" type="email" placeholder="mail@mail.com">
                                    <label class="entrance-label" >Пароль</label>
                                    <input class="entrance-input" placeholder="*********">
                                    <p> <a href="##"> Забули пароль?</a></p>
                               </div>
                                <div class="modal-footer">
                                 
                                    <button type="button" class="btn-entrance btn btn-secondary" data-dismiss="modal">Увійти</button>
                                  
                            </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                               
                               
                               
                                <div class="entrance-wrapper">                               
                                    <h3 class="entrance-title">Зареєструватися  з допомогою </h3>
                                    <div class="entrance-social">
                                        <div class="entrance-social_item">
                                            <a href="##"><picture> <source srcset="assets/img/login-google-small.png" media="(max-width:768px"> <img  class="entrance-social_image" src="assets/img/login-google.png" alt="img"></a></picture> 
                                        </div>
                                        <div class="entrance-social_item">
                                            <a href="##"><picture> <source srcset="assets/img/login-facebook-small.png" media="(max-width:768px"> <img  class="entrance-social_image" src="assets/img/login-facebook.png" alt="img"></a></picture> 
                                        </div>
                                        <div class="entrance-social_item">
                                            <a href="##"><picture> <source srcset="assets/img/login-instagram-small.png" media="(max-width:768px"> <img  class="entrance-social_image" src="assets/img/login-instagram.png" alt="img"></a></picture> 
                                            </div>
                                        <div class="entrance-social_item">
                                            <a href="##"><picture> <source srcset="assets/img/login-mono-small.png" media="(max-width:768px"> <img  class="entrance-social_image" src="assets/img/login-mono.png" alt="img"></a></picture> 
                                            </div>
                                        <div class="entrance-social_item">
                                            <a href="##"><picture> <source srcset="assets/img/login-privatebank-small.png" media="(max-width:768px"> <img  class="entrance-social_image" src="assets/img/login-privatebank.png" alt="img"></a></picture> 
                                            </div>
                                    </div>
                                    <div class="entrance-separator"></div>
                                    <p>або</p>
                                    <label class="entrance-label ">Прізвище</label>
                                    <input class="entrance-input capitalize-letter" type="email" placeholder="Іванов">
                                    <label class="entrance-label">Ім'я</label>
                                    <input class="entrance-input capitalize-letter" type="email" placeholder="Іван">
                                    <label class="entrance-label">По батькові</label>
                                    <input class="entrance-input capitalize-letter" type="email" placeholder="Іванович">
                                    <label class="entrance-label">Електронна адреса</label>
                                    <input class="entrance-input" type="email" placeholder="mail@mail.com">
                                    
                               </div>
    
                                <div class="modal-footer">
                                    <button type="button" class="btn-entrance btn btn-secondary" data-dismiss="modal">Зареєструватися</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <!-- registration modal-page (end) -->

    <header class="header header-narrow">


        <div class="topWhite-layer topWhite-layer-narrow">
            <div class="container">
                <div class="header-menu header-menu-narrow">
                    <div class="header-menu_inner">
                        <nav class="header-menu_left">
                            <ul>
                                <li><a class="top-btn" href="##"><span>Про ресурс</span></a></li>
                                <li><a class="top-btn" href="##"><span>Тематичні напрямки</span></a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-menu_inner">
                        <div class="header-menu_center header-menu_center--narrow">
                            <img class="header-menu_logo" src="assets/img/logo.png" alt="logo">
                        </div>
                    </div>
                    <div class="header-menu_inner">                       
                        <nav class="header-menu_right">
                            <ul>
                                <li><a class="top-btn" href="##"><span>Студент</span></a></li>
                                <li><a class="top-btn" href="##"><span>Викладач</span></a></li>
                                <li><a class="top-btn" href="##" data-toggle="modal" data-target="#exampleModal"><span>Увійти</span></a></li>
                            </ul>
                        </nav>

                        <!-- Burger-btn (begin) -->
                        <div class="menu_burger">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <!-- Burger-btn (end) -->

                    </div>
                </div>

            </div>
        </div>
    </header>
    <section class="direction">
        <div class="direction-separator">
            <div class="direction-separator_badge"><span>Глава шоста: Струни</span></div>
        </div>
        <div class="container">
       
            <ul class="breadcrumbs_list">
                <li class = "breadcrumbs_item">
                        <a href="##" class="breadcrumbs_link">Головна сторінка</a>
                </li>
                <li class = "breadcrumbs_item">
                        <a href="##" class="breadcrumbs_link">Курс</a>
                </li> 
                <li class = "breadcrumbs_item">
                    <a href="##" class="breadcrumbs_link breadcrumbs_active">Заняття 01</a>
            </li>                
            </ul>

          <div class="string-menu_wrapper">
              <div class="string-menu_inner">
                  <a class="string-menu_btn active" href="strings.html"><span>Як це працює</span></a>
              </div>
              <div class="string-menu_inner">
                <a class="string-menu_btn" href="video-collection.html"><span>Відеолекція</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn" href="protocol.html"><span>Протокол </span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn" href="test_a.html"><span>Тест</span></a>
            </div>

            <a class="control_btn-prev disable" href="##"><span></span></a>
            <a class="control_btn-next" href="video-collection.html"><span></span></a>

          </div>

          <div class="string-text">
            <p>Друзі! Вітаємо вас на третьому тижні курсу «Наука про освіту: Що повинен знати лідер освітнього стартапа». Ми дістались фіналу нашого курсу, і дуже раді, що пройшли цей шлях разом з вами!
            </p>
            <p>На цьому тижні ми розглянемо можливості краудфандинга освітніх проєктів, розберемося в хитрощах цифрової безпеки онлайн-навчання, а також дізнаємося, як надати психологічну підтримку вашим слухачам. Команда курсу поділиться з вами лайфхаками, як збирати гроші на освітній проєкт, як працювати з медіа та розкаже, що таке цифрова безпека в контексті онлайн-навчання. Ми розповімо про роботу з файлами Cookie, про персональні дані та про конфіденційність в інтернеті. А ще поговоримо про мотивацію та підтримку ваших слухачів і студентів.
            </p>
            <p>Вас чекають лекції від PR-менеджера платформи та популяризатора науки Антона Сененка, технічного директора платформи Андрія Пархоменка та редакторки платформи Радміли Сегол. Не забувайте про творчі завдання та тести! Обмінюйтеся ідеями, обговорюйте матеріали та діліться враженнями з іншими слухачами на форумі!
            </p>
            <p>Всі слухачі, які успішно впораються з курсом і всіма тестовими завданнями, отримають сертифікати про успішне закінчення вже за тиждень! А ваш майбутній освітній проєкт варто почати сьогодні!
            </p>
            <p>Вдалого та плідного тижня!</p>

          </div>

       


        </div>
    </section>
   

    @include('layouts.frontend.partial.footer')




    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>