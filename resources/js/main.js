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

    if (form !== null )
    {
        fakeForm.addEventListener('click', func);
        form.addEventListener('focusout', func2);
    };

    function func() {
         form.classList.toggle('active');
         fakeForm.classList.toggle('active');
    };

    function func2() {
        if (form.getElementsByTagName('textarea').value !== null) {
            form.classList.toggle('active');
            fakeForm.classList.toggle('active');
        }
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


