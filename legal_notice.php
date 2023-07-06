<?php
require 'includes/_database.php';
// require 'includes/_functions.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="legal.css" />
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <main class="container">
        <p class="legal-subttl"> Mentions légales : </p>
        <h2>Association Polyglossia </h2>
        <p> Siège social : [adresse du siège social de l'association] <br>
            Email : [adresse e-mail de contact de l'association] <br>
            Numéro de téléphone : [numéro de téléphone de l'association] <br>
            SIRET : [numéro SIRET de l'association] <br>
            Responsable de la publication : [nom du responsable de l'association] <br>
            Directeur de la publication : [nom du directeur de l'association] <br> </p>

        <p class="legal-subttl"> Hébergement du site : </p>

        <p> Le site de l'association Polyglossia est
            hébergé par [nom de l'hébergeur], dont le siège social est
            situé à [adresse de l'hébergeur]. </p>

        <p class="legal-subttl">Propriété intellectuelle :</p>

        <p>Tous les contenus présents sur le site de l'association
            Polyglossia, tels que les textes, les images,
            les logos, les vidéos, sont la propriété exclusive
            de l'association ou font l'objet d'une autorisation
            d'utilisation. Toute reproduction, représentation,
            modification, distribution ou exploitation de ces
            contenus est strictement interdite sans l'autorisation
            préalable et écrite de l'association Polyglossia. </p>

        <p class="legal-subttl">Protection des données personnelles :</p>

        <p>L'association Polyglossia s'engage à protéger les
            données personnelles des utilisateurs de son site
            conformément aux réglementations en vigueur. Les
            données collectées sont utilisées dans le cadre de
            la fourniture des cours de langues en ligne et ne
            sont pas communiquées à des tiers. Les utilisateurs
            disposent d'un droit d'accès, de rectification et de
            suppression de leurs données personnelles en
            contactant l'association à l'adresse
            [adresse e-mail de contact de l'association].</p>

        <p class="legal-subttl">Limitation de responsabilité :</p>

        <p>L'association Polyglossia ne saurait être tenue
            responsable de tout dommage direct ou indirect
            résultant de l'utilisation du site ou des cours de
            langues en ligne. L'association ne garantit pas
            l'exactitude, la fiabilité ou l'exhaustivité des
            informations présentes sur le site.</p>

        <p class="legal-subttl">Modification des mentions légales :</p>

        <p>L'association Polyglossia se réserve le droit de
            modifier les présentes mentions légales à tout moment.
            Les utilisateurs sont invités à consulter régulièrement
            cette page pour prendre connaissance des éventuelles
            modifications.</p>

        <p>Nous vous rappelons que les mentions légales sont
            indispensables pour informer les utilisateurs de vos
            services en ligne sur les aspects juridiques de votre
            association. Cependant, il est recommandé de consulter
            un professionnel du droit pour obtenir des conseils
            personnalisés en fonction de votre situation spécifique.</p>
    </main>
    <script src="script.js"></script>
</body>

</html>