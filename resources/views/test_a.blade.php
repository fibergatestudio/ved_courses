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
                  <a class="string-menu_btn" href="strings.html"><span>Як це працює</span></a>
              </div>
              <div class="string-menu_inner">
                <a class="string-menu_btn" href="video-collection.html"><span>Відеолекція</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn" href="protocol.html"><span>Протокол </span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn active" href="test_a.html"><span>Тест</span></a>
            </div>

            <a class="control_btn-prev" href="protocol.html"><span></span></a>
            <a class="control_btn-next disable" href="##"><span></span></a>

          </div>
        </div>
        </section>

          <section class="test_a">
              <div class="container">
          <div class="test_a-title test_a-title_doc">Довга назва тесту</div>
          <div class="test_a-title_bottom">Оберіть одну, або декілька відповідей на задані питання.</div>
             <div class="test_a separator"></div>
            
        <div class="test_a-question">1. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an </div>
        <div class="test_a-answer">
            <div class="answer-wrapper">
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_1-1" value="1" name="question_1" checked>
                    <label class="answer-radio_label" for="answer_1-1">а). Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_1-2" value="2" name="question_1">
                    <label class="answer-radio_label" for="answer_1-2">б). Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_1-3" value="3" name="question_1">
                    <label class="answer-radio_label" for="answer_1-3">в). Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_1-4" value="4" name="question_1">
                    <label class="answer-radio_label" for="answer_1-4">г). Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>    
            </div>
        </div>

        <div class="test_a-question">2. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an </div>
        <div class="test_a-answer">
            <div class="answer-wrapper">
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_2-1" value="1" name="question_2" checked>
                    <label class="answer-radio_label" for="answer_2-1">а). Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_2-2" value="2" name="question_2">
                    <label class="answer-radio_label" for="answer_2-2">б). Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_2-3" value="3" name="question_2">
                    <label class="answer-radio_label" for="answer_2-3">в). Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_2-4" value="4" name="question_2">
                    <label class="answer-radio_label" for="answer_2-4">г). Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>  
            </div>
        </div>
  
        <div class="test_a-question">3. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an </div>
        <div class="test_a-answer">
            <div class="answer-wrapper">
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_3-1" value="1" name="question_3" checked>
                    <label class="answer-radio_label" for="answer_3-1">а). Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_3-2" value="2" name="question_3">
                    <label class="answer-radio_label" for="answer_3-2">б). Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_3-3" value="3" name="question_3">
                    <label class="answer-radio_label" for="answer_3-3">в). Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_3-4" value="4" name="question_3">
                    <label class="answer-radio_label" for="answer_3-4">г). Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>  
            </div>
        </div>

        <div class="test_a-question">4. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an </div>
        <div class="test_a-answer">
            <div class="answer-wrapper">
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_4-1" value="1" name="question_4" checked>
                    <label class="answer-radio_label" for="answer_4-1">а). Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_4-2" value="2" name="question_4">
                    <label class="answer-radio_label" for="answer_4-2">б). Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_4-3" value="3" name="question_4">
                    <label class="answer-radio_label" for="answer_4-3">в). Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_4-4" value="4" name="question_4">
                    <label class="answer-radio_label" for="answer_4-4">г). Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>  
            </div>
        </div>

        <div class="test_a-question">5. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an </div>
        <div class="test_a-answer">
            <div class="answer-wrapper">
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_5-1" value="1" name="question_5" checked>
                    <label class="answer-radio_label" for="answer_5-1">5.1. Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_5-2" value="2" name="question_5">
                    <label class="answer-radio_label" for="answer_5-2">5.2. Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_5-3" value="3" name="question_5">
                    <label class="answer-radio_label" for="answer_5-3">5.3. Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_5-4" value="4" name="question_5">
                    <label class="answer-radio_label" for="answer_5-4">5.4. Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>  
            </div>
        </div>

        <div class="test_a-question">6. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an </div>
        <div class="test_a-answer">
            <div class="answer-wrapper">
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_6-1" value="1" name="question_6" checked>
                    <label class="answer-radio_label" for="answer_6-1">6.1. Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_6-2" value="2" name="question_6">
                    <label class="answer-radio_label" for="answer_6-2">6.2. Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_6-3" value="3" name="question_6">
                    <label class="answer-radio_label" for="answer_6-3">6.3. Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_6-4" value="4" name="question_6">
                    <label class="answer-radio_label" for="answer_6-4">6.4. Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>  
            </div>
        </div>

        <div class="test_a-question">7. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an </div>
        <div class="test_a-answer">
            <div class="answer-wrapper">
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_7-1" value="1" name="question_7" checked>
                    <label class="answer-radio_label" for="answer_7-1">7.1. Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_7-2" value="2" name="question_7">
                    <label class="answer-radio_label" for="answer_7-2">7.2. Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_7-3" value="3" name="question_7">
                    <label class="answer-radio_label" for="answer_7-3">7.3. Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_7-4" value="4" name="question_7">
                    <label class="answer-radio_label" for="answer_7-4">7.4. Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>  
            </div>
        </div>

        <div class="test_a-question">8. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an </div>
        <div class="test_a-answer">
            <div class="answer-wrapper">
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_8-1" value="1" name="question_8" checked>
                    <label class="answer-radio_label" for="answer_8-1">8.1. Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_8-2" value="2" name="question_8">
                    <label class="answer-radio_label" for="answer_8-2">8.2. Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_8-3" value="3" name="question_8">
                    <label class="answer-radio_label" for="answer_8-3">8.3. Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_8-4" value="4" name="question_8">
                    <label class="answer-radio_label" for="answer_8-4">8.4. Lorem Ipsum has been the industry's standard dummy text ever</label>                    
                </div>  
            </div>
        </div>

        <a class="answer-btn btn-watch--more" href="##"><span>Надіслати тест </span></a>


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