const slidesContainer = document.getElementById("slides-container");
const slide = document.querySelector(".classes-box");
const prevButton = document.getElementById("slide-arrow-prev");
const nextButton = document.getElementById("slide-arrow-next");

let slideWidth = slide.clientWidth + 3;
let intervalId;

// Move to the next slide
function moveToNextSlide() {
    slidesContainer.scrollLeft += slideWidth;
}
// Reset the interval timer
function resetInterval() {
    clearInterval(intervalId);
    intervalId = setInterval(moveToNextSlide, 5000);
}
// Reset interval on click on one of the arrows
nextButton.addEventListener("click", () => {
    slidesContainer.scrollLeft += slideWidth;
    resetInterval();
});
prevButton.addEventListener("click", () => {
    slidesContainer.scrollLeft -= slideWidth;
    resetInterval();
});
// Reset interval if scroll on boxes
slidesContainer.addEventListener("scroll", resetInterval);
// Start the interval interval
intervalId = setInterval(moveToNextSlide, 2000);
