const slidesContainer = document.getElementById("slides-container");
const slide = document.querySelector(".classes-box");
const prevButton = document.getElementById("slide-arrow-prev");
const nextButton = document.getElementById("slide-arrow-next");

let slideWidth = slide.clientWidth + 4;
let intervalId = setInterval(moveToNextSlide, 2000);

/**
 * Move to the next slide in a scrolling container.
 */
function moveToNextSlide() {
    // Calculate the maximum scroll position
    const maxScrollLeft =
        slidesContainer.scrollWidth - slidesContainer.clientWidth;
    // Calculate the scroll position for the next slide
    const nextScrollLeft = slidesContainer.scrollLeft + slideWidth;
    // If reaching the last slide, then scroll back to the first slide
    if (nextScrollLeft > maxScrollLeft) {
        slidesContainer.scrollTo({ left: 0, behavior: "smooth" });
    } else {
        slidesContainer.scrollTo({ left: nextScrollLeft, behavior: "smooth" });
    }
}

/**
 * Move to the previous slide in a scrolling container.
 */
function moveToPrevSlide() {
    // Calculate the scroll position for the previous slide
    const prevScrollLeft = slidesContainer.scrollLeft - slideWidth;
    // If at the first slide, then scroll to the last slide
    if (prevScrollLeft < 0) {
        slidesContainer.scrollTo({
            left: slidesContainer.scrollWidth,
            behavior: "smooth",
        });
    } else {
        slidesContainer.scrollTo({ left: prevScrollLeft, behavior: "smooth" });
    }
}

/**
 * Resets the interval timer for automatic slide transitions.
 * Clears the current interval and sets a new one with the moveToNextSlide function every 4000 milliseconds.
 */
function resetInterval() {
    clearInterval(intervalId); // Clear the current interval
    intervalId = setInterval(moveToNextSlide, 4000); // Set a new interval with moveToNextSlide every 4 seconds
}
// Click on the right arrow
nextButton.addEventListener("click", () => {
    moveToNextSlide(); // Move to the next slide
});
// Click on the left arrow
prevButton.addEventListener("click", () => {
    moveToPrevSlide(); // Move to the previous slide
});
// Scroll event on the slides container
slidesContainer.addEventListener("scroll", resetInterval); // Reset interval if there's a scroll interaction

// Get current date
document.getElementById("date-txt").textContent =
    new Date().toLocaleDateString();
/**
 * Updates the displayed clock with the current hour, minute, and second.
 */
function updateClock() {
    // Get current hour, minutes and seconds
    let formattedTime = new Date().toLocaleString([], {
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit",
    });
    // Update the content of the element with the specified ID
    document.getElementById("date-txt-sub").textContent = formattedTime;
}
// update the clock
updateClock();
// refresh the clock every second
setInterval(updateClock, 1000);
