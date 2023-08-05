const slidesContainer = document.getElementById("slides-container");
const slide = document.querySelector(".classes-box");
const prevButton = document.getElementById("slide-arrow-prev");
const nextButton = document.getElementById("slide-arrow-next");

let slideWidth = slide.clientWidth + 4;
// let slideWidth = slide.clientWidth;
let intervalId;

// Move to the next slide
function moveToNextSlide() {
    const maxScrollLeft =
        slidesContainer.scrollWidth - slidesContainer.clientWidth + 1;
    const nextScrollLeft = slidesContainer.scrollLeft + slideWidth;

    // Check if reaching the last slide, then go back to the first slide
    if (nextScrollLeft > maxScrollLeft) {
        slidesContainer.scrollTo({ left: 0, behavior: "smooth" });
    } else {
        slidesContainer.scrollTo({ left: nextScrollLeft, behavior: "smooth" });
    }
}
// Move to the previous slide
function moveToPrevSlide() {
    const prevScrollLeft = slidesContainer.scrollLeft - slideWidth;
    // Check if at the first slide, then go to the last slide
    if (prevScrollLeft < 0) {
        slidesContainer.scrollTo({
            left: slidesContainer.scrollWidth,
            behavior: "smooth",
        });
    } else {
        slidesContainer.scrollTo({ left: prevScrollLeft, behavior: "smooth" });
    }
}
// Reset the interval timer
function resetInterval() {
    clearInterval(intervalId);
    intervalId = setInterval(moveToNextSlide, 4000);
}
// Reset interval on click on one of the arrows
nextButton.addEventListener("click", () => {
    moveToNextSlide();
    resetInterval();
});
prevButton.addEventListener("click", () => {
    moveToPrevSlide();
    resetInterval();
});
// Reset interval if scroll on boxes
slidesContainer.addEventListener("scroll", resetInterval);
// Start the interval interval
intervalId = setInterval(moveToNextSlide, 2000);

// Get current date
document.getElementById("date-txt").textContent =
    new Date().toLocaleDateString();
// Get current hour, minute and second
function updateClock() {
    let formattedTime = new Date().toLocaleString([], {
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit",
    });
    document.getElementById("date-txt-sub").textContent = formattedTime;
}

// update the clock
updateClock();

// refresh the clock every second
setInterval(updateClock, 1000);
