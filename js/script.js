$(document).ready(function(){
  $('.header__burger').click(function(event){
      $('.header__burger,.header__nav').toggleClass('active');
      $('body').toggleClass('lock');
  });
});
   
   $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      headerHeight = $('.header').height() + 70;  
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - headerHeight
        }, 800, function() {
          target.focus();
        });
        return false;
      }
     }
   });

   function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
  }
}

document.querySelector("#zayavka").onclick = function(){
  alert("Авторизуйтесь");
}

function confirmDelete() {
  if (confirm("Вы подтверждаете удаление?")) {
     return true;
  } else {
      return false;
  }
}

$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();

$('#btn_submit').click(function(){
  // собираем данные с формы
  var user_name    = $('#user_name').val();
   var user_phone   = $('#Phone').val();
  var uslugi    = $('#Select').val();
  // отправляем данные
  $.ajax({
      url: "../vendor/zayavka.php", // куда отправляем
      type: "post", // метод передачи
      dataType: "json", // тип передачи данных
      data: { // что отправляем
          "user_name":    user_name,
          "Phone":   user_phone,
          "Select":   uslugi,
      },
      // после получения ответа сервера
      success: function(data){
          $('.messages').html(data.result); // выводим ответ сервера
      }
  });
});