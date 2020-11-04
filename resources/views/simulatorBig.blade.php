@extends('layouts.front.front_child')

@section('title')
    Симулятор ресурс
@endsection

@section('header')

@endsection

@section('content')

<body>

       <section class="direction">
        <div class="direction-separator">
            <div class="direction-separator_badge"><span>Про ресурс</span></div>
        </div>
        <div class="container">

            <ul class="breadcrumbs_list">
                <li class = "breadcrumbs_item">
                        <a href="##" class="breadcrumbs_link">Головна сторінка</a>
                </li>
                <li class = "breadcrumbs_item">
                        <a href="##" class="breadcrumbs_link breadcrumbs_active">Про ресурс</a>
                </li>                                
            </ul>

            <div class="simulatorBig-article_wrapper">
                <div style="font-size:18px" style="font-size:16px" class="simulatorBig-article_inner">
                    <picture style="float: right" class="simulatorBig-article_image">
                        <source srcset="img/soldier-big.jpg" media="(max-width: 648px)">
                        <img src="img/soldier-big.jpg" alt="image">
                    </picture>
                    <p style="margin-bottom: 1em;" class="simulatorBig-article_ident">Lorem Ipsum has been the industry's standard standard dummy text ever since the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                    </p>
                    <p style="margin-bottom: 1em;" class="simulatorBig-article_ident">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printerLorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                    </p>
                    <p style="margin-bottom: 1em;" class="simulatorBig-article_ident">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printerLorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                    </p>
                    <p style="margin-bottom: 1em;" class="simulatorBig-article_ident">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                    </p>
                    <p style="margin-bottom: 1em;" class="simulatorBig-article_ident">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printerLorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                    </p>
                    <p style="margin-bottom: 1em;" class="simulatorBig-article_ident">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printerLorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                    </p>
                
                </div>

            </div>

           
        </div>
    </section>
   
@include('layouts.front.includes.partners')
<!-- End Partners Section -->
@endsection