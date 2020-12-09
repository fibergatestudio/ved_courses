
// toggle blocks what will you learn block
const btns = document.querySelectorAll('.programs-wwl-item_btn');


//IE poliphyl start
if (!("previousElementSibling" in document.documentElement)) {
    Object.defineProperty(Element.prototype, "nextElementSibling", {
        get: function () {
            var e = this.previousSibling;
            while (e && 1 !== e.nodeType)
                e = e.previousSibling;
            return e;
        }
    });
}
//end

btns.forEach(btn => {
    btn.addEventListener('click', function (e) {
        e.preventDefault();
        const parentNode = this.parentNode.parentNode;
        const prevParentNode = this.parentNode.parentNode.parentNode.previousElementSibling;
        const nextParentNode = this.parentNode.parentNode.nextElementSibling;

        if (parentNode.className == 'toggle-block active' && nextParentNode.className == 'toggle-block hidden_item') {
            parentNode.classList.remove('active');
            parentNode.classList.add('hidden_item');

            nextParentNode.classList.remove('hidden_item');
            nextParentNode.classList.add('active');
        }

        if (parentNode.parentNode.className == 'toggle-block active' && prevParentNode.className == 'toggle-block hidden_item') {
            parentNode.parentNode.classList.remove('active');
            parentNode.parentNode.classList.add('hidden_item');

            prevParentNode.classList.remove('hidden_item');
            prevParentNode.classList.add('active');
        }


    })
})

// toggle blocks what will you learn block end section


//student`s success page start

const hideBtns = document.querySelectorAll('.ss__hide-btn-style')

hideBtns.forEach(btn => {
    btn.addEventListener('click', function (e) {
        e.preventDefault();

        const parent = this.parentNode;
        const thirdParentElem = parent.nextElementSibling.nextElementSibling;

        thirdParentElem.classList.toggle('hide');

        if (this.classList.contains('active')) {
            this.classList.toggle('active');
            this.innerText = 'Переглянути все';
        } else {
            this.classList.toggle('active');
            this.innerText = 'Згорнути все';
        }
    })
})


//student`s success page end

// protocol page start
const modalOpenBtn = document.querySelector('#modalWindowOpen');
const protocolForm = document.querySelector('#protocolForm');
const contentWrapper = document.querySelector('.content-wrapper');
const closeForm = document.querySelector('#backToContent');
const scrollToTopButton = document.querySelector('.to-top-button');
let position;
let timer;

modalOpenBtn.addEventListener('click', function () {
    protocolForm.style.display = 'flex';
    contentWrapper.style.display = 'none';
});

closeForm.addEventListener('click', function () {
    protocolForm.style.display = 'none';
    contentWrapper.style.display = 'block';
});


//toggle to top btn
function showToTopButton() {
    position = window.pageYOffset || document.documentElement.scrollTop;

    if (position > 1200) {
        scrollToTopButton.classList.add('showBlock');
    } else {
        scrollToTopButton.classList.remove('showBlock');
    }
}

// scrolling to top
function backToTop() {
    if (position > 0) {
        window.scrollTo(0, position);
        position -= 200;
        timer = setTimeout(backToTop, 5)
    } else {
        clearTimeout(timer);
        window.scrollTo(0, 0)
    }
}

window.addEventListener('scroll', showToTopButton);
scrollToTopButton.addEventListener('click', backToTop);


//toggle blocks
const toggleBlocks = document.querySelectorAll('.toggle-content');

toggleBlocks.forEach(block => {
    block.addEventListener('click', function (e) {
        e.preventDefault();
        this.nextElementSibling.classList.toggle('p__hide');
        this.childNodes[1].classList.toggle('p__rotate');
    })
})


// protocol page end

autosize($('textarea'));