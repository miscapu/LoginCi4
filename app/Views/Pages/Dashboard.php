<?php
$this->extend( 'Layouts/main' );

$this->section( 'stylesheets' );
?>

    <link rel="stylesheet" href="<?= base_url( 'assets/css/bootstrap.min.css' )?>">

<?php
$this->endSection();


$this->section( 'content' );
?>

    <h1 class="modal-title my-lg-5 text-center"><?= isset( $title ) ? esc( $title ) : ""; ?></h1>



<?php
$this->endSection();


$this->section( 'scripts' );
?>

    <script src="<?= base_url( 'assets/js/bootstrap.bundle.js' )?>"></script>

<?php
$this->endSection();


