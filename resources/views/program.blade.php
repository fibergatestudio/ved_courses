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
                    <!-- <div class="modal-header">               
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div> -->
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
            <div class="direction-separator_badge"><span>Назва розділу підрозділу</span></div>
        </div>
        <div class="container">

            <ul class="breadcrumbs_list">
                <li class = "breadcrumbs_item">
                        <a href="##" class="breadcrumbs_link">Головна сторінка</a>
                </li>
                <li class = "breadcrumbs_item">
                        <a href="##" class="breadcrumbs_link breadcrumbs_active">Курс назва</a>
                </li>                
            </ul>

            <div class="main-menu">
                <div class="main-menu_inner">
                    <a class="main-menu_btn" href="about-course.html"><span>Про курс</span></a>
                </div>
                <div class="main-menu_inner ">
                    <a class="main-menu_btn" href="teachers.html"><span>Викладачі</span></a>
                </div>
                <div class="main-menu_inner active">
                    <a class="main-menu_btn" href="program.html"><span>Програма курсу</span></a>
                </div>
                <div class="main-menu_inner">
                    <a class="main-menu_btn" href="questions.html"><span>Поширені запитання</span></a>
                </div>
                <div class="main-menu_inner">
                    <div class="main-menu_social"><a href="##"><img src="assets/img/facebook.png" alt="img"></a></div>
                    <div class="main-menu_social"><a href="##"><img src="assets/img/instagram.png" alt="img"></a></div>
                    <div class="main-menu_social"><a href="##"><img src="assets/img/linkedin.png" alt="img"></a></div>
                </div>
            </div>
            
            <div class="main-programs">
                <h3 class="main-teachers_title" id="anchor_program">Програма курсу: що ви вивчите</h3>
                <div class="programs-grid_wrapper">
                    <div class="programs-grid_item">
                        <div class="programs-item_lesson--number">01</div>
                        <div class="programs-item_lesson--text">Заняття</div>
                    </div>     
                    <div class="programs-grid_item">
                        <div class="programs-item_chapter">Глава шоста: Струни</div>
                    </div>
                    <div class="programs-grid_item">
                        <div class="programs-item_text">У цьому класі ми дізнаємося, з чого ми зупинилися в попередньому класі, починаючи з глави 6 підручника і розглядаючи рядки і переходячи до структур даних. Другий тиждень цього уроку присвячена установці Python, якщо ви дійсно хочете запускати додатки на своєму комп'ютері або ноутбуці. Якщо ви вирішите не встановлювати Python, ви можете просто перейти на третій тиждень і отримати перевагу.</div>
                    </div>
                    <div class="programs-grid_item">
                        <div class="programs-item_hours"><a href="##">4 години на завершення</a> </div>
                    </div>  
                    <div class="programs-grid_item">
                        <div class="programs-item_video"><a href="##">7 відео ( всього 57 хв.), 7 матеріалів для самостійного вивчення, 2 тести</a></div>
                    </div>
                    <div class="programs-grid_item">
                        <a class="programs-item_btn btn-watch" href="##"><span class="btn-watch_inner">переглянути все</span></a>
                    </div>  
                    <div class="programs-grid_item hidden_item ">
                        <div class="gray-separator"></div>
                        <div class="programs-item_video">5 відео</div>
                        <table class="hidden-menu">
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">3 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">8 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">4 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">3 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">3 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                        </table>
                        <div class="gray-separator"></div>
                        <div class="programs-item_book">2 матеріалів для самостійного вивчення</div>
                        <table class="hidden-menu">
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">10 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">10 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                        </table>
                        <div class="gray-separator"></div>
                    </div>      
                </div>
            
                <div class="programs-grid_wrapper">
                    <div class="programs-grid_item">
                        <div class="programs-item_lesson--number">02</div>
                        <div class="programs-item_lesson--text">Заняття</div>
                    </div>     
                    <div class="programs-grid_item">
                        <div class="programs-item_chapter">Модуль: Установка і використання Python</div>
                    </div>
                    <div class="programs-grid_item">
                        <div class="programs-item_text">У цьому модулі ви все налаштуєте так, щоб ви могли писати програми на Python. Ми не вимагаємо установки Python для цього класу. Ви можете писати і тестувати програми на Python в браузері, використовуючи "Python Code Playground" в цьому уроці. Будь ласка, прочитайте матеріал "Використання Python в цьому класі" для деталей.</div>
                    </div>
                    <div class="programs-grid_item">
                        <div class="programs-item_hours"><a href="##">3 години на завершення</a></div>
                    </div>  
                    <div class="programs-grid_item">
                        <div class="programs-item_video"><a href="##">5 відео (всього 23 хв.), 2 матеріалів для самостійного вивчення, 2 тести</a></div>
                    </div>
                    <div class="programs-grid_item">
                        <a class="programs-item_btn btn-watch active" href="##"><span class="btn-watch_inner">Згорнути</span></a>
                    </div>
                    <div class="programs-grid_item hidden_item show">
                        <div class="gray-separator"></div>
                        <div class="programs-item_video">5 відео</div>
                        <table class="hidden-menu">
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">3 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">8 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">4 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">3 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">3 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                        </table>
                        <div class="gray-separator"></div>
                        <div class="programs-item_book">2 матеріалів для самостійного вивчення</div>
                        <table class="hidden-menu">
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">10 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">10 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                        </table>
                        <div class="gray-separator"></div>
                    </div>  
                </div>
            
                <div class="programs-grid_wrapper">
                    <div class="programs-grid_item">
                        <div class="programs-item_lesson--number">03</div>
                        <div class="programs-item_lesson--text">Заняття</div>
                    </div>     
                    <div class="programs-grid_item">
                        <div class="programs-item_chapter">Глава шоста: Струни</div>
                    </div>
                    <div class="programs-grid_item">
                        <div class="programs-item_text">У цьому класі ми дізнаємося, з чого ми зупинилися в попередньому класі, починаючи з глави 6 підручника і розглядаючи рядки і переходячи до структур даних. Другий тиждень цього уроку присвячена установці Python, якщо ви дійсно хочете запускати додатки на своєму комп'ютері або ноутбуці. Якщо ви вирішите не встановлювати Python, ви можете просто перейти на третій тиждень і отримати перевагу.</div>
                    </div>
                    <div class="programs-grid_item">
                        <div class="programs-item_hours"><a href="##">4 години на завершення</a></div>
                    </div>  
                    <div class="programs-grid_item">
                        <div class="programs-item_video"><a href="##">7 відео ( всього 57 хв.), 7 матеріалів для самостійного вивчення, 2 тести</a></div>
                    </div>
                    <div class="programs-grid_item">
                        <a class="programs-item_btn btn-watch" href="##"><span class="btn-watch_inner">переглянути все</span></a>
                    </div>
                    <div class="programs-grid_item hidden_item ">
                        <div class="gray-separator"></div>
                        <div class="programs-item_video">5 відео</div>
                        <table class="hidden-menu">
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">3 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">8 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">4 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">3 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">3 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                        </table>
                        <div class="gray-separator"></div>
                        <div class="programs-item_book">2 матеріалів для самостійного вивчення</div>
                        <table class="hidden-menu">
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">10 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">10 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                        </table>
                        <div class="gray-separator"></div>
                    </div>       
                </div>
            
                <div class="programs-grid_wrapper">
                    <div class="programs-grid_item">
                        <div class="programs-item_lesson--number">04</div>
                        <div class="programs-item_lesson--text">Заняття</div>
                    </div>     
                    <div class="programs-grid_item">
                        <div class="programs-item_chapter">Глава шоста: Струни</div>
                    </div>
                    <div class="programs-grid_item">
                        <div class="programs-item_text">У цьому класі ми дізнаємося, з чого ми зупинилися в попередньому класі, починаючи з глави 6 підручника і розглядаючи рядки і переходячи до структур даних. Другий тиждень цього уроку присвячена установці Python, якщо ви дійсно хочете запускати додатки на своєму комп'ютері або ноутбуці. Якщо ви вирішите не встановлювати Python, ви можете просто перейти на третій тиждень і отримати перевагу.</div>
                    </div>
                    <div class="programs-grid_item">
                        <div class="programs-item_hours"><a href="##">4 години на завершення</a></div>
                    </div>  
                    <div class="programs-grid_item">
                        <div class="programs-item_video"><a href="##">7 відео ( всього 57 хв.), 7 матеріалів для самостійного вивчення, 2 тести</a></div>
                    </div>
                    <div class="programs-grid_item">
                        <a class="programs-item_btn btn-watch" href="##"><span class="btn-watch_inner">переглянути все</span></a>
                    </div>
                    <div class="programs-grid_item hidden_item ">
                        <div class="gray-separator"></div>
                        <div class="programs-item_video">5 відео</div>
                        <table class="hidden-menu">
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">3 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">8 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">4 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">3 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">3 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                        </table>
                        <div class="gray-separator"></div>
                        <div class="programs-item_book">2 матеріалів для самостійного вивчення</div>
                        <table class="hidden-menu">
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">10 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                            <tr class="hidden-menu_string">
                                <td class="hidden-menu_column">10 хв.</td>
                                <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                            </tr>
                        </table>
                        <div class="gray-separator"></div>
                    </div>  
                </div>
            
                <a class="btn-watch--more" href="##"><span>Переглянути більше</span></a>
                </div>



        </div>
    </section>
   

<footer class="footer">
    <div class="container">
<div class="footer-wrapper">
    <ul class="footer-inner">
        <li>
            <a href="##">Про ресурс</a>            
        </li>
        <li>
            <a href="##">Тематичні напрями</a>            
        </li>
        <li>
            <a href="##">Кабінет</a>            
        </li>
        <li>
            <a href="##">Викладач</a>            
        </li>
        <li>
            <a href="##">Вхід</a>            
        </li>
    </ul>
    <ul class="footer-inner">
        <li>
            <a href="##">Серйозна та організована злочинності</a>            
        </li>
        <li>
            <a href="##">Кібер-злочинність</a>            
        </li>
        <li>
            <a href="##">Боротьба з тероризмом</a>            
        </li>
        <li>
            <a href="##">Основні права</a>            
        </li>
        <li>
            <a href="##">Співпраця між правоохоронними органами, обмін інформацією та сумісність</a>            
        </li>
        <li>
            <a href="##">Лідерство та інші навички</a>            
        </li>
    </ul>
    <ul class="footer-inner">
        <li>
            <a href="##">Вища освіта та дослідження</a>            
        </li>
        <li>
            <a href="##">Громадський порядок та профілактика</a>            
        </li>
        <li>
            <a href="##">Правоохоронні технології, криміналістика і конкретні області</a>            
        </li>
        <li>
            <a href="##">Союзні місії  (СSDP)</a>            
        </li>
        <li>
            <a href="##">Програма обміну СEPOL</a>            
        </li>
        <li>
            <a href="##">Віртуальний навчальний центр з прав інтелектуальної власності</a>            
        </li>
    </ul>
    <ul class="footer-inner">
        <li>
            <a class="footer-phone"  href="##">Завжди на зв'язку <br> <span>(098) 123 45 67</span></a>            
        </li>
        <li>
            <a class="footer-mail" href="##">Напишіть нам <br> <span>mail@gmail.com</span></a>        
        </li>
      
    </ul>
</div>
</div>
</footer>




    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>