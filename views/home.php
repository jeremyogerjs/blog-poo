<?php ob_start(); ?>

<p>Homepage</p>
<?php var_dump($result) ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php');

