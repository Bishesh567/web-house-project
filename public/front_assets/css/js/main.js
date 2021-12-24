// NAVBAR ANIMATION
function scrollValue() {
  var navhead = document.getElementById('navhead');
  var scroll = window.scrollY;
  if (scroll < 200) {
      navhead.classList.remove('BgColour');
  } else {
      navhead.classList.add('BgColour');
  }
}

window.addEventListener('scroll', scrollValue);

// BANNER VIDEO POPUP CODE

$(document).ready(function() {
  var url = $("#videoStop").attr('src');
  $("#exampleModal").on('hide.bs.modal', function() {
    $("#videoStop").attr('src', '');
  });
  $("#exampleModal").on('show.bs.modal', function() {
    $("#videoStop").attr('src', url);
  });
});



// ABOUT US SECTION BUTTON CODE SHOW AND HIDE TEXT
$(document).ready(function(){
$('#readMore').click(function(){
  if($(this).html() == 'Learn More'){
    $('#dots').hide();
    $('#more').show();
    $(this).html('Learn Less');
  }else{
    $('#dots').show();
    $('#more').hide();
    $(this).html('Learn More');
  }
});
});

//  OUR FILM VIEW ALL AND LESS BUTTON CODE
$(document).ready(function(){
$('#viewAll').click(function(){
if($(this).html() == 'View All'){
  $('#next').hide();
  $('#all').show();
  $(this).html('View Less');
}else{
  $('#next').show();
  $('#all').hide();
  $(this).html('View All');
}
});
});

// VENOBOX VIDEO SLIDER AND POPUP CODE
  $(document).ready(function(){
  $('.venobox').venobox({
    closoColor:'#f4f4f4',
    spinColor:'##17191D',
    closeBackground:'#17191D',
    overlayColor:'rbga(23,25,29,0.8)'
  });

});


// CONTACT US FORM SHOW AND HIDE CODE
$(document).ready(function(){
$('#sendMessage').click(function(){
  if($(this).html() == 'Send Message'){
    $('#form').hide();
    $('#show').show();
    $(this).html('Cancel');
  }else{
    $('#form').show();
    $('#show').hide();
    $(this).html('Send Message');
  }
});
});

// TESTIMONIAL CODE
const myCarousel = document.getElementById('myCarousel')
myCarousel.addEventListener('slid.bs.carousel', function () {
  const activeItem = this.querySelector(".active");
  document.querySelector(".testi-img img").src = activeItem.getAttribute("data-img");
  document.querySelector(".testi-img .circle").style.backgroundColor = activeItem.getAttribute("data-color");
})