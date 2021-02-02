$(document).ready(function() {
  var $images = $(".slideshow-image-wrapper");
  var slideDelay = 10000;
  var currentSlide = 0;
  var lastSlide = 0;
  var count = $images.length;

  console.log("There are " + count + " images in the slideshow.");

  // Show the first image.
  $images.eq(currentSlide).addClass('active');

  setInterval(function() {
    lastSlide = currentSlide;
    currentSlide = currentSlide >= count ? 0 : currentSlide + 1;

    $images.eq(lastSlide).removeClass('active');
    $images.eq(currentSlide).addClass('active');
  }, slideDelay);
});
