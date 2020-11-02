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
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="{{url('/simulatorBig')}}">Про ресурс</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="{{url('/simulator')}}">Тематичні напрями</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Викладач</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link menu_title-linkStudent" href="##">Ім'я студента</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Панель курсів</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Профіль</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Налаштування</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Вийти</a>
        </li>
        
    </ul>
    <!-- Burger-menu (end)-->

        <!-- student modal-page (begin) -->
        <div class="bootstrap-restylingStudent modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <ul class="student-menu-wrapper">
                    <li class="student-menu-inner">
                        <a class="student-menu-link" href="##">Панель курсів</a>
                    </li>
                    <li class="student-menu-inner">
                        <a class="student-menu-link" href="##">Профіль</a>
                    </li>
                    <li class="student-menu-inner">
                        <a class="student-menu-link" href="##">Налаштування</a>
                    </li>
                    <li class="student-menu-inner">
                        <a class="student-menu-link" href="##">Вийти</a>
                    </li>
                </ul>
              </div>
            </div>
          </div>
      
    
    <!-- student modal-page (end) -->

    <header class="header header-narrowStudent">


        <div class="topWhite-layer topWhite-layer-narrowStudent">
            <div class="container">
                <div class="header-menu header-menu-narrowStudent">
                    <div class="header-menu_inner">
                        <nav class="header-menu_left">
                            <ul>
                                <li><a class="top-btn" href="{{url('/simulatorBig')}}"><span>Про ресурс</span></a></li>
                                <li><a class="top-btn" href="{{url('/simulator')}}"><span>Тематичні напрямки</span></a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-menu_inner">
                        <div class="header-menu_center header-menu_center--narrowStudent">
                            <img class="header-menu_logo" src="assets/img/logo.png" alt="logo">
                        </div>
                    </div>
                    <div class="header-menu_inner">                       
                        <nav class="header-menu_right">
                            <ul>
                                <li><a class="top-btn" href="{{('/teachers')}}"><span>Викладач</span></a></li>                               
                                <li><a class="top-btn top-btn--user" href="##" data-toggle="modal" data-target="#exampleModal"><span class="student--user">Ім'я студента</span></a></li>
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
            <div class="direction-separator_badge"><span>Профіль</span></div>
        </div>
        <div class="container">  
            <div class="profile-grid_wrapper">
                <div class="profile-grid_item">
                    <div class="profile-item_photo">              
                    </div>
                </div>
                <div class="profile-grid_item">
                    <div class="profile-item_name">Іванов Іван Іванович </div>
                    <div class="profile-item_position">студент</div>
                    <div class="profile-item_students">Назва курсу та групи</div>
                    <div class="profile-item_course">email@gmail.com</div>
                </div>
                <div class="profile-grid_item">
                    <div class="profile-grid_fakeform active">
                        <p>+ Додати інформацію про себе</p>
                        <p>Розкажіть іншим користувачам трохи про себе: де ви живете, чим </p>
                        <p>цікавитесь, чому проходите курси, або що сподіваєтеся вивчити.</p>
                    </div>
                    <form class="profile-grid_form">                        
                    <textarea class="profile-item_text" spellcheck="false"></textarea>
                    </form>

                </div>
            </div>
            <a class="btn-watch--more" href="##"><span>Редагувати</span></a>



        </div>
    </section>  


    @include('layouts.frontend.partial.footer')




    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>