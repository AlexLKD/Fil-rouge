<?php

function confirmLogout()
{
    if (confirm("Are you sure you want to log out?")) {
        window . location . href = "logout.php"; // Redirect to the logout page if confirmed
    }
}
