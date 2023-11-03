<?php

// function confirmLogout()
// {
//     if (confirm("Are you sure you want to log out?")) {
//         window . location . href = "logout.php"; // Redirect to the logout page if confirmed
//     }
// }

function displayLanguages()
{
    global $dbCo;
    $query = $dbCo->prepare("SELECT country, name, description FROM languages");
    $query->execute();
    $languages = $query->fetchAll();
    foreach ($languages as $language) {
        echo '<div class="languages-box">';
        $languageLink = 'language.php?country=' . urlencode($language['country']);
        echo '<a href="' . $languageLink . '">';
        echo '<img class="classes-img" src="flags/' . $language['country'] . '.png" alt="' . $language['country'] . '" />';
        echo '<h3>' . $language['name'] . '</h3>';
        echo '<p class="classes-box-txt">' . $language['description'] . '</p>';
        echo '</a>';
        echo '</div>';
    }
}
