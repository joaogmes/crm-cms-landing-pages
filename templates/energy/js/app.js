// INFINITI BAR
var $tickerWrapper = $(".tickerwrapper");
var $list = $tickerWrapper.find("ul.list");
var $clonedList = $list.clone();
var listWidth = 10;

$list.find("li").each(function (i) {
    listWidth += $(this, i).outerWidth(true);
});

var endPos = $tickerWrapper.width() - listWidth;

$list.add($clonedList).css({
    "width": listWidth + "px"
});

$clonedList.addClass("cloned").appendTo($tickerWrapper);

//TimelineMax
var infinite = new TimelineMax({ repeat: -1, paused: true });
var time = 40;

infinite
    .fromTo($list, time, { rotation: 0.01, x: 0 }, { force3D: true, x: -listWidth, ease: Linear.easeNone }, 0)
    .fromTo($clonedList, time, { rotation: 0.01, x: listWidth }, { force3D: true, x: 0, ease: Linear.easeNone }, 0)
    .set($list, { force3D: true, rotation: 0.01, x: listWidth })
    .to($clonedList, time, { force3D: true, rotation: 0.01, x: -listWidth, ease: Linear.easeNone }, time)
    .to($list, time, { force3D: true, rotation: 0.01, x: 0, ease: Linear.easeNone }, time)
    .progress(1).progress(0)
    .play();

//Pause/Play    
$tickerWrapper.on("mouseenter", function () {
    infinite.pause();
}).on("mouseleave", function () {
    infinite.play();
});
// INFINITI BAR

// ACCORDION
let accordionButtons = document.getElementsByClassName('accordion-item__button');


for (let i = 0; i < accordionButtons.length; i++) {
    accordionButtons[i].addEventListener('click', function () {
        this.classList.toggle('active');
        let accordionContent = this.nextElementSibling;

        if (accordionContent.style.maxHeight) {
            accordionContent.style.maxHeight = null;
        }
        else {
            accordionContent.style.maxHeight = accordionContent.scrollHeight + "px";
        }
    });
}
// ACCORDION


jQuery(document).ready(function ($) {

    // FUNCAO PARA ATIVAR O STICKY EFFECT DO FORM
    setTimeout(function () {

        var tela = window.innerWidth;

        if (tela >= 3841) {

            $(window).scroll(function () {
                var sticky = $('#formulario'),
                    scroll = $(window).scrollTop();

                if (scroll >= 10) sticky.addClass('fixed');
                else sticky.removeClass('fixed');
            });

        } else if (tela >= 2561 && tela <= 3840) {

            $(window).scroll(function () {
                var sticky = $('#formulario'),
                    scroll = $(window).scrollTop();

                if (scroll >= 10) sticky.addClass('fixed');
                else sticky.removeClass('fixed');
            });

        } else if (tela >= 1921 && tela <= 2560) {

            $(window).scroll(function () {
                var sticky = $('#formulario'),
                    scroll = $(window).scrollTop();

                if (scroll >= 10) sticky.addClass('fixed');
                else sticky.removeClass('fixed');
            });

        } else if (tela >= 1441 && tela <= 1919) {

            $(window).scroll(function () {
                var sticky = $('#formulario'),
                    scroll = $(window).scrollTop();

                if (scroll >= 10) sticky.addClass('fixed');
                else sticky.removeClass('fixed');
            });

        } else if (tela >= 1367 && tela <= 1440) {

            $(window).scroll(function () {
                var sticky = $('#formulario'),
                    scroll = $(window).scrollTop();

                if (scroll >= 05) sticky.addClass('fixed');
                else sticky.removeClass('fixed');
            });

        } else if (tela >= 1281 && tela <= 1366) {

            $(window).scroll(function () {
                var sticky = $('#formulario'),
                    scroll = $(window).scrollTop();

                if (scroll >= 10) sticky.addClass('fixed');
                else sticky.removeClass('fixed');
            });

        } else if (tela >= 1025 && tela <= 1280) {

            $(window).scroll(function () {
                var sticky = $('#formulario'),
                    scroll = $(window).scrollTop();

                if (scroll >= 10) sticky.addClass('fixed');
                else sticky.removeClass('fixed');
            });

        } else if (tela >= 1000 && tela <= 1024) {

            $(window).scroll(function () {
                var sticky = $('#formulario'),
                    scroll = $(window).scrollTop();

                if (scroll >= 05) sticky.addClass('fixed');
                else sticky.removeClass('fixed');
            });

        } else if (tela <= 999) {


        } else {

            $(window).scroll(function () {
                var sticky = $('#formulario'),
                    scroll = $(window).scrollTop();

                if (scroll >= 10) sticky.addClass('fixed');
                else sticky.removeClass('fixed');
            });

        }

    }, 1000);

    $('.galeria-parceiros').slick({
        dots: true,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
            breakpoint: 1023,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });



});

lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true,
    'disableScrolling': true
});

(function () {

    var youtube = document.querySelectorAll(".youtube");

    for (var i = 0; i < youtube.length; i++) {

        //var source = "https://img.youtube.com/vi/" + youtube[i].dataset.embed + "/sddefault.jpg";
        var source = "img/tumb-video.jpg";

        var image = new Image();
        image.src = source;
        image.addEventListener("load", function () {
            youtube[i].appendChild(image);
        }(i));

        youtube[i].addEventListener("click", function () {

            var iframe = document.createElement("iframe");

            iframe.setAttribute("frameborder", "0");
            iframe.setAttribute("allowfullscreen", "");
            iframe.setAttribute("src", "https://www.youtube.com/embed/" + this.dataset.embed + "?rel=0&showinfo=0&autoplay=1");

            this.innerHTML = "";
            this.appendChild(iframe);
        });
    };

})();

jQuery(document).ready(function($) {
    new dgCidadesEstados({

      cidade:document.getElementById('cidade'),

      estado:document.getElementById('estado'),

      estadoVal:'Selecione um estado',

      cidadeVal:'Selecione uma cidade'

    });
});