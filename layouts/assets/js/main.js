(function () {
    let burgerButton = document.querySelector('.menu_burger');
    let burgerButtonClone = document.querySelector('.menu_burger-clone');
    let burgerMenu = document.querySelector('.menu_title-wrapper');

    burgerButton.addEventListener('click', burgerClass);
    burgerButtonClone.addEventListener('click', burgerClass);

    function burgerClass() {
        burgerButton.classList.toggle('active');
        burgerButtonClone.classList.toggle('active');
        burgerMenu.classList.toggle('active');
    };
})();

(function () {

    var accTop = document.querySelectorAll('.main-menu_inner');
    var i;

    for (i = 0; i < accTop.length; i++) {
        accTop[i].addEventListener('click', func);
    };

    function func() {
        accTop.forEach(function (i) {
            if (i.classList.contains('active')) { i.classList.remove('active'); }
        });
        this.classList.add('active');

    };

})();


(function () {

    var acc = document.querySelectorAll('.programs-item_btn');
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener('click', func);
    };

    function func() {

        this.classList.toggle('active');

        if (this.classList.contains('active')) {
            this.firstChild.innerHTML = 'Згорнути'
        }
        else {
            this.firstChild.innerHTML = 'Переглянути все'
        };

        this.parentNode.nextElementSibling.classList.toggle('show');
    };

})();

(function () {

    var accBottom = document.querySelectorAll('.main-faq_panel');
    var i;

    for (i = 0; i < accBottom.length; i++) {
        accBottom[i].addEventListener('click', func);
    };

    function func() {

        this.classList.toggle('active');
        this.nextElementSibling.classList.toggle('show');
    };

})();

(function () {

    var form = document.querySelector('.profile-item_text');
    var fakeForm = document.querySelector('.profile-grid_fakeform');

    if (form !== null) { fakeForm.addEventListener('click', func) };


    function func() {
        form.classList.toggle('active');
        fakeForm.classList.toggle('active');
    };

})();

(function () {
    var courseBTNs = document.querySelectorAll('.courseEdit-item_button');
    var i;


    if (courseBTNs !== null) {
        for (i = 0; i < courseBTNs.length; i++) {
            courseBTNs[i].addEventListener('click', func)
        }
    }

    function func() {
        this.nextElementSibling.classList.toggle('show');
    };

})();

(function () {
    let testBTNs = document.querySelectorAll('.newTest-top');
    let i

    if (testBTNs !== null) {
        for (i = 0; i < testBTNs.length; i++) {
            testBTNs[i].addEventListener('click', func)
        }
    }

    function func() {
        this.parentNode.classList.toggle('active');
        this.classList.toggle('active');
        this.nextElementSibling.classList.toggle('show');
    };
})();


(function () {
    let proxyBTN = document.querySelector('.multipleChoice-top');
    let proxyBlocks = document.querySelectorAll('.multipleChoice-wrapper');
    let i

    if (proxyBTN !== null) {
        proxyBTN.addEventListener('click', func);
    }

    function func() {
        this.parentNode.classList.toggle('active');
        this.classList.toggle('active');
        this.nextElementSibling.classList.toggle('show');
        if (proxyBlocks !== null) {
            for (i = 0; i < proxyBlocks.length; i++) {
                proxyBlocks[i].classList.toggle('show');
            }
        }
    };

})();

(function () {
    let questionsBTN = document.querySelectorAll('.questionType-js');
    let hiddenBlocks = document.querySelectorAll('.questionType-inner_right');
    let i

    if (questionsBTN !== null) {
        for (i = 0; i < questionsBTN.length; i++) {
            questionsBTN[i].addEventListener('click', func)
        }
    }

    function func() {
        questionsBTN.forEach(function (i) {
            if (i.classList.contains('active')) {
                i.classList.toggle('active');
            }
        });
        hiddenBlocks.forEach(function (i) {
            if (i.classList.contains('show')) {
                i.classList.toggle('show');
            }
        });
        this.classList.toggle('active');
        this.nextElementSibling.classList.toggle('show');
    };

})();

// slick-slider///////////////////////////////////
$(document).ready(function () {
    $('.partners-slider-inner').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        infinite: true,
    });
});


//sidebar-burger////////////////////////////////////

(function () {
    let sidebarBurgerButton = document.querySelector('.sidebar-top_burger-btn');
    let sidebarBurgerMenu = document.querySelector('.sidebar_title-wrapper');
    let sideBarBurgerBlock = document.querySelector('.sidebar');

    let sidebarMobileButton = document.querySelector('.sidebar-top_mobile-btn');

    if (sidebarBurgerButton !== null) {
        sidebarBurgerButton.addEventListener('click', sidebarBurgerClass);
    };
    if (sidebarMobileButton !== null) {
        sidebarMobileButton.addEventListener('click', sidebarBurgerClass);
    };

    function sidebarBurgerClass() {
        sideBarBurgerBlock.classList.toggle('active');
        sidebarBurgerMenu.classList.toggle('active');
    };
})();

