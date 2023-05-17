const slidesContainer = document.getElementById("slides-container");
const slide = document.querySelector(".classes-box");
const prevButton = document.getElementById("slide-arrow-prev");
const nextButton = document.getElementById("slide-arrow-next");

nextButton.addEventListener("click", () => {
    let slideWidth = slide.clientWidth + 3;
    slidesContainer.scrollLeft += slideWidth;
});

prevButton.addEventListener("click", () => {
    let slideWidth = slide.clientWidth + 3;
    slidesContainer.scrollLeft -= slideWidth;
});
