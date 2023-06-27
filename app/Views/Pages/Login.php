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


    <?= session()->get( 'success' ) ? "<div class='alert alert-warning'>".session()->get( 'success' )."</div>" : ""; ?>


    <!--- Form HTML -->

    <form method="post">
        <div class="mb-3">
            <label for="emailFrm" class="form-label">Email address</label>
            <input type="email" name="emailFrm" class="form-control" id="emailFrm" value="<?= set_value( 'emailFrm' )?>">
        </div>
        <div class="mb-3">
            <label for="pwdFrm" class="form-label">Password</label>
            <input type="password" name="pwdFrm" class="form-control" id="pwdFrm">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Form HTML End -->

<?php
$this->endSection();


$this->section( 'scripts' );
?>

    <script src="<?= base_url( 'assets/js/bootstrap.bundle.js' )?>"></script>

<?php
$this->endSection();


