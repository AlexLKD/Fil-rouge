<?php
$country = ['uk', 'spain', 'germany', 'japan', 'korea', 'russia'];
$language = ['Anglais', 'Espagnol', 'Allemand', 'Japonais', 'Coréen', 'Russe'];
?>
<?php for ($i = 0; $i < sizeof($country); $i++) { ?>
    <div class="classes-box">
        <a href="#">
            <img class="classes-img" src="flags/<?php echo $country[$i]; ?>.png" alt="<?php echo $country[$i]; ?>" />
            <h3><?php echo $language[$i]; ?></h3>
            <p class="classes-box-txt">
                Lorem ipsum dolor, sit amet consectetur
                adipisicing elit. Officia nam illum odio
                reiciendis necessitatibus!
            </p>
        </a>
    </div>
<?php } ?>
--------------------------------------------------------------------------
<?php
$country = ['uk', 'spain', 'germany', 'japan', 'korea', 'russia'];
$language = ['Anglais', 'Espagnol', 'Allemand', 'Japonais', 'Coréen', 'Russe'];

for ($i = 0; $i < count($country); $i++) {
    echo '<div class="classes-box">';
    echo '<a href="#">';
    echo '<img class="classes-img" src="flags/' . ucfirst($country[$i]) . '.png" alt="' . ucfirst($country[$i]) . '" />';
    echo '<h3>' . $language[$i] . '</h3>';
    echo '<p class="classes-box-txt">';
    echo 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia nam illum odio reiciendis necessitatibus!';
    echo '</p>';
    echo '</a>';
    echo '</div>';
}
?>