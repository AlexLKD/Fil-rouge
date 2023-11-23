/**
 * Toggle the visibility of the update button and enable/disable text and email inputs.
 */
function toggleUpdateForm() {
    // Select the update button
    const validationBtn = document.querySelector(".update-btn");
    // Select all inputs in the userInfoForm
    const userInfoInputs = document.querySelectorAll(
        '#userInfoForm input[type="text"], #userInfoForm input[type="email"]'
    );
    // Toggle the "hidden" class on the update button
    validationBtn.classList.toggle("hidden");
    // Toggle the "disabled" attribute on each text and email input
    userInfoInputs.forEach((input) => {
        input.disabled = !input.disabled;
    });
}

document.addEventListener("DOMContentLoaded", function () {
    // Select the editInfoBtn with the class "js-btn-update"
    const editInfoBtn = document.querySelector(".js-btn-update");
    // Add an event listener to the editInfoBtn, triggering the toggleUpdateForm function on click
    editInfoBtn.addEventListener("click", toggleUpdateForm);
});

/**
 * Display a confirmation dialog and redirect to the logout page if confirmed.
 * @returns {boolean} - Returns true if the user confirms, false if they cancel.
 */
function confirmLogout() {
    // Display a dialog with the message "Are you sure you want to log out?"
    if (confirm("Are you sure you want to log out?")) {
        // redirect to the logout.php page if confirmed
        window.location.href = "logout.php";
        return true;
    } else {
        // If they click "cancel," cancel the logout action
        return false;
    }
}
