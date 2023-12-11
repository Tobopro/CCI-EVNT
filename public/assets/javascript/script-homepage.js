// Add class to header nav after scroll

window.addEventListener('scroll', function() {

   let scrollPosition = window.scrollY;
   const header = document.querySelector("header nav");
   var targetPosition = 100;

   if (scrollPosition > targetPosition) {
        header.classList.add('scrolled');
   } else {
        header.classList.remove('scrolled');
    }
})