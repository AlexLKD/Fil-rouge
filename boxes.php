<?php
$country = ['uk', 'spain', 'germany', 'japan', 'korea', 'russia'];
$language = ['Anglais', 'Espagnol', 'Allemand', 'Japonais', 'Coréen', 'Russe'];
?>
<div class="classes-box">
    <?php for ($i = 0; $i < count($country); $i++) { ?>
        <a href="#">
            <img class="classes-img" src="flags/<?php echo $country[$i]; ?>.png" alt="<?php echo $country[$i]; ?>" />
            <h3><?php echo $language[$i]; ?></h3>
            <p class="classes-box-txt">
                Lorem ipsum dolor, sit amet consectetur
                adipisicing elit. Officia nam illum odio
                reiciendis necessitatibus!
            </p>
        </a>
    <?php } ?>
</div>