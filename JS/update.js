function toggleUpdateForm() {
    const validationBtn = document.querySelector(".update-btn");
    const userInfoInputs = document.querySelectorAll(
        '#userInfoForm input[type="text"], #userInfoForm input[type="email"]'
    );

    validationBtn.classList.toggle("hidden");

    userInfoInputs.forEach((input) => {
        input.disabled = !input.disabled;
    });
}

document.addEventListener("DOMContentLoaded", function () {
    const editInfoBtn = document.querySelector(".js-btn-update");
    editInfoBtn.addEventListener("click", toggleUpdateForm);
});
