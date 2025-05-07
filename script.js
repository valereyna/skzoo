function initProductDetails() {
  var MainImg = document.getElementById("MainImg");
  var smallImgGroup = document.getElementById("smallImgGroup");
  var smallImgs = document.getElementsByClassName("small-img");
  var leftArrow = document.querySelector(".left-arrow");
  var rightArrow = document.querySelector(".right-arrow");

  // Click on small image to change main image
  for (let i = 0; i < smallImgs.length; i++) {
      smallImgs[i].onclick = function() {
          MainImg.src = smallImgs[i].src;
      }
  }

  // Scroll small images container left
  leftArrow.onclick = function() {
      smallImgGroup.scrollBy({ left: -100, behavior: 'smooth' });
  }

  // Scroll small images container right
  rightArrow.onclick = function() {
      smallImgGroup.scrollBy({ left: 100, behavior: 'smooth' });
  }
}

function initSlideshow() {
  let slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
  }

  // Expose plusSlides and currentSlide to global scope if needed
  window.plusSlides = plusSlides;
  window.currentSlide = currentSlide;
}

document.addEventListener("DOMContentLoaded", function() {
  const pageId = document.body.id;

  if (pageId === "productdetails") {
    initProductDetails();
  }

  // Add other page initializations here
  initSlideshow();
});