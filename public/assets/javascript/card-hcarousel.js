const slider = document.querySelector('.card-hcarousel .wrapper');
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener('mousedown', e => {
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
});
slider.addEventListener('mouseleave', _ => {
    isDown = false;
    slider.classList.remove('active');
});
slider.addEventListener('mouseup', _ => {
    isDown = false;
    slider.classList.remove('active');
});
slider.addEventListener('mousemove', e => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const SCROLL_SPEED = 1;
    const walk = (x - startX) * SCROLL_SPEED;
    slider.scrollLeft = scrollLeft - walk;
});

$(document).ready(function () {
    if (!$.browser.webkit) {
        $('.wrapper').html('<p>Sorry! Non webkit users. :(</p>');
    }
});



// JS:
// let top = 0;
// const scrollAmount = 25;
// const height = 500;
// const totalHeight = 5000;

// function scrollModalTo(top) {
//     document.getElementById('.modal-dot-carousel').scroll({
//         top,
//         behavior: 'smooth'
//     });
// }

// function scrollUp() {
//     if (top !== 0) {
//         top -= scrollAmount;
//         top = Math.max(0, top);
//         scrollModalTo(top);
//     }
// }

// function scrollDown() {
//     if (top < totalHeight - height) {
//         top += scrollAmount;
//         top = Math.min(top, totalHeight - height);
//         scrollModalTo(top);
//     }
// }

// alert("bjr");