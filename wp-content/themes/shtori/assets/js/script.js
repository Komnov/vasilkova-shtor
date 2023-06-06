$(document).ready(function() {
// Sliders
slider($(".gallery-home"), ".gallery-home-carousel", 3);
slider($(".slider-about"), ".gallery-home-first", 1);
slider($(".slider-shtori"), ".gallery-shtori-first", 1);
slider($(".gallery-rul-shtori"), null, 2, null, null, null, null, null, null, true, true, 2, false);
slider($(".slider-procces"), ".gallery-procces", 2);
var i_slide = 0;
while (i_slide <= 7) {
  slider($(".types-"+i_slide), ".types-wrap-"+i_slide, 1);
  i_slide++;
}
var i_slide_k = 0;
while (i_slide_k <= 4) {
  slider($(".kinds-"+i_slide_k), ".kinds-wrap-"+i_slide_k, 1);
  i_slide_k++;
}
// Owl
function slider(x, w, y, a, b, s, t, p, d, nav, dot, sb, rw) {
if(a == null && y != 1){var a = [1,2];}else{var a = [y,y]}
if(b == null){var b = true;}
if(s == null){var s = 1500;}
if(t == null){var t = 6500;}
if(p == null){var p = 0;}
if(d == null){var d = true;}
if(nav == null){var nav = false;}
if(dot == null){var dot = false;}
if(sb == null){var sb = 1;}
if(rw == null){var rw = true;}
x.owlCarousel({
items : y,
startPosition: p,
slideBy: sb,
center: true,
loop: false,
autoplay: true,
autoplayHoverPause: b,
autoplayTimeout: t,
autoplaySpeed: s,
dots: dot,
nav: nav,
navText: "",
mouseDrag: false,
touchDrag: d,
margin: 30,
lazyLoad: true,
rewind: rw,
center: false,
responsive : {
  // breakpoint from 0 up
  0 : {
    items : a[0],
    slideBy: a[0],
    autoHeight: true,
    margin: 5
  },
  // breakpoint from 768 up
  768 : {
    items : a[1]
  },
  // breakpoint from 991 up
  991 : {
    items : y
  }
}
// animateIn: true
});
if (w != null) {
// Custom Navigation Events
$(w + " .nav-next").click(function(){
x.trigger('next.owl.carousel');
});
$(w + " .nav-prev").click(function(){
x.trigger('prev.owl.carousel');});
}
};

// scrollbarWidth
function scrollbarWidth() {var block = $('<div>').css({'height':'50px','width':'50px'}), indicator = $('<div>').css({'height':'200px'});$('body').append(block.append(indicator));    var w1 = $('div', block).innerWidth();block.css('overflow-y', 'scroll');var w2 = $('div', block).innerWidth();$(block).remove();return (w1 - w2);}var scrollbar = scrollbarWidth()+"px";
// Modal
modal(".btn-main:not(input, .marquiz)");
function modal(x) {
  $(x).click(function(e) {
      e.preventDefault();
      $("html").css({"overflow-y" : "hidden", "margin-right" : scrollbar});
      $("#form").addClass("md-active");
      setTimeout(function () {
          $("#form").addClass("md-animation");
        }, 1);
      $(".md-shadow").addClass("shadow-active");
      setTimeout(function () {
          $(".md-shadow").addClass("shadow-animation");
        }, 1);
      $("#form .md-close").click(function() {
          $("html").removeAttr("style");
          $("#form").removeClass("md-animation");
          $(".md-shadow").removeClass("shadow-animation");
          setTimeout(function () {
              $("#form").removeClass("md-active");
            }, 450);
          setTimeout(function () {
              $(".md-shadow").removeClass("shadow-active");
            }, 550);
        });
    });
}

// Lazy Load
document.addEventListener("DOMContentLoaded", function() {
  var lazyloadImages = document.querySelectorAll("img.lazy");    
  var lazyloadThrottleTimeout;
  
  function lazyload () {
  if(lazyloadThrottleTimeout) {
    clearTimeout(lazyloadThrottleTimeout);
  }
      
  lazyloadThrottleTimeout = setTimeout(function() {
  var scrollTop = window.pageYOffset;
    lazyloadImages.forEach(function(img) {
          if(img.offsetTop < (window.innerHeight + scrollTop)) {
                img.src = img.dataset.src;
                img.classList.remove('lazy');
              }
        });
    if(lazyloadImages.length == 0) { 
        document.removeEventListener("scroll", lazyload);
        window.removeEventListener("resize", lazyload);
        window.removeEventListener("orientationChange", lazyload);
      }
  }, 20);
  }
  document.addEventListener("scroll", lazyload);
  window.addEventListener("resize", lazyload);
  window.addEventListener("orientationChange", lazyload);
});
// Ajax Form
$("form").on("submit", function(event){
  event.preventDefault();
  var obj = $(this).serialize();
  sendAjaxForm(obj);
});
function sendAjaxForm(form) {
$.ajax({
  url: "/wp-content/themes/shtori/ajax_form.php",
  type: "POST",
  dataType: "html",
  data: form,
  success: function(response) {
    $('#result_form').html(response);
    // scrollbarWidth
    $("#response").addClass("md-active");
    setTimeout(function () {
      $("#response").addClass("md-animation");
    }, 1);
    $(".md-shadow").addClass("shadow-active");
    setTimeout(function () {
      $(".md-shadow").addClass("shadow-animation");
    }, 1);
    $("#response .md-close").click(function() {
      $("#response").removeClass("md-animation");
      setTimeout(function () {
        $("#response").removeClass("md-active");
      }, 450);
      if (!$("#form").hasClass("md-active")) {
        $(".md-shadow").removeClass("shadow-animation");
        setTimeout(function () {
          $(".md-shadow").removeClass("shadow-active");
        }, 550);
      }
    });
  },
  error: function(response) {
    $('#result_form').html("Ваше сообщение не отправлено");
  }
});}
// Links Float
$("a[href^='#']").click(function(){
var target = $(this).attr("href");
  $("html, body").animate({scrollTop: $(target).offset().top+"px"});
  return false;
});
// Menu adaptive
var width = $(window).width();
if (width < 991) {
  $(".menu-head > ul > li.menu-item-has-children > a").click(function (e) {
    e.preventDefault();
    if ($(".menu-head > ul > li.menu-item-has-children a").hasClass("dropdown")) {
        $(".menu-head > ul > li.menu-item-has-children a").removeClass("dropdown");
      } else{
        $(this).addClass("dropdown");
      }
  });
  $(".menu-toggle").click(function (e) {
    $(".menu-head > ul").animate({height: "toggle"}, 300);
  });
}
});

document.addEventListener("DOMContentLoaded", function() {
  Marquiz.init({
    id: '5cd8837f1424b10044b077b8',
    autoOpen: false,
    autoOpenFreq: 'once',
    openOnExit: false 
  });
});