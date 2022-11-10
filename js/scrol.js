
var markOne = $('#m1');
var markTwo = $('#m2');
var markThree = $('#m3');
var markFour = $('#m4');
var markFive = $('#m5');

var scrolled;
$(function() {
  $(window).scroll(function() {
    scrolled = $(window).scrollTop();
    var scrollMarkOne = $('#intro').offset().top;
    var scrollMarkTwo = $('#about').offset().top;
    var scrollMarkThree = $('#news').offset().top;
    var scrollMarkFour = $('#cases').offset().top;
    var scrollMarkFive = $('#contacts').offset().top;

    if (scrolled >= scrollMarkOne && scrolled < (scrollMarkTwo)) {
      $('.header__link').removeClass('active');
      markOne.addClass('active');
    } else if (scrolled >= scrollMarkTwo && scrolled < (scrollMarkThree)) {
      $('.header__link').removeClass('active');
      markTwo.addClass('active');
    } else if (scrolled >= scrollMarkThree && scrolled < (scrollMarkFour)) {
      $('.header__link').removeClass('active');
      markThree.addClass('active');
    } else if (scrolled >= scrollMarkFour && scrolled < (scrollMarkFive)) {
      $('.header__link').removeClass('active');
      markFour.addClass('active');
    } else if (scrolled >= scrollMarkFive) {
        $('.header__link').removeClass('active');
        markFive.addClass('active');
    }
    

  });
});