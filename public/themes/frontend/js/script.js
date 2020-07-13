$(document).ready(function () {

  $(window).on('load', function() {
      $("#preloader").delay(1000).fadeOut();
      $("#preloader-wrapper").delay(1000).fadeOut("fast");
  });
  

  $('.sticky-left, .sticky-right')
    .theiaStickySidebar({
        additionalMarginTop: 0
  }); 

  // start kanvertatsiyani hisoblash jarayoni 
  var valOne = 0;
  var sum=1;

  $('#myselect_one').change(function(){
        var valOne  = $("#val1").val()*1;
        var top_one =select($('#myselect_one').val());
        var top_two =select($('#myselect_two').val());
        var valTwo=valOne*top_one/top_two;
        var n=(Math.round(valTwo*1000)/1000);
        $('#val2').val(n);
  });

  $('#myselect_two').change(function(){
        var valOne  = $("#val1").val()*1;
        var top_one =select($('#myselect_one').val());
        var top_two =select($('#myselect_two').val());
        var valTwo=valOne*top_one/top_two;
        var n=(Math.round(valTwo*1000)/1000);
        $('#val2').val(n);

  });

function select(top_one){
    var btc = $('#btc').data('rate');
    var eth = $('#eth').data('rate');
    var zec = $('#zec').data('rate');
    var ltc = $('#ltc').data('rate');

    switch(top_one){
    case "BTC": sum=parseFloat(btc); break;
    case "ETH": sum=parseFloat(eth); break; 
    case "ZEC": sum=parseFloat(zec); break; 
    case "LTC": sum=parseFloat(ltc); break;
    default: "bu yuq";
  }
  return sum;

}

  $("#val1").keyup(function(){
         var valOne  = $("#val1").val()*1;
        var top_one =select($('#myselect_one').val());
        var top_two =select($('#myselect_two').val());
        var valTwo=valOne*top_one/top_two;
        var n=(Math.round(valTwo*1000)/1000);
        $('#val2').val(n);
    });
// end kanvertatsiyani hisoblash jarayoni 



    $('.popular-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
              }
            },
            {
              breakpoint: 576,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false
              }
            },
          
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
      });
    
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('#top').fadeIn();

        } else {
            $('#top').fadeOut();
        }
    });
    $('#top').on('click', function () {
        $('html , body').animate({
            scrollTop: 0

        }, 1000)
    });

    // $('.main .carousel .carousel-indicators li').on('click', function(){
    //      $('.main .carousel .carousel-indicators li').removeClass('active');
    //      $('.main .carousel .carousel-inner .carousel-item').removeClass('active');
    //   $(this).toggleClass('active');
    // });

$('.main .carousel .carousel-indicators li').removeClass('active');
 $('.main .carousel .carousel-indicators li:nth-child(1)').addClass('active');
  $('.main .carousel .carousel-inner .carousel-item').removeClass('active');
          $('.main .carousel .carousel-inner .carousel-item:nth-child(1)').addClass('active');

    $('.main .carousel .carousel-indicators li:nth-child(1)').on('click', function () {
       $('.main .carousel .carousel-indicators li').removeClass('active');
        $(this).addClass('active');
         $('.main .carousel .carousel-inner .carousel-item').removeClass('active');
          $('.main .carousel .carousel-inner .carousel-item:nth-child(1)').addClass('active');
    });

  
   $('.main .carousel .carousel-indicators li:nth-child(2)').on('click', function () {
       $('.main .carousel .carousel-indicators li').removeClass('active');
        $(this).addClass('active');
         $('.main .carousel .carousel-inner .carousel-item').removeClass('active');
          $('.main .carousel .carousel-inner .carousel-item:nth-child(2)').addClass('active');
    });


      $('.main .carousel .carousel-indicators li:nth-child(3)').on('click', function () {
       $('.main .carousel .carousel-indicators li').removeClass('active');
        $(this).addClass('active');
         $('.main .carousel .carousel-inner .carousel-item').removeClass('active');
          $('.main .carousel .carousel-inner .carousel-item:nth-child(3)').addClass('active');
    });

});

