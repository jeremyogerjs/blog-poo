<?php ob_start(); ?>

<p>Authentification</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php');