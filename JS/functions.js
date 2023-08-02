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

function confirmLogout() {
    if (confirm("Are you sure you want to log out?")) {
        window.location.href = "logout.php"; // Redirect to the logout page if confirmed
        return true;
    } else {
        return false;
    }
}
