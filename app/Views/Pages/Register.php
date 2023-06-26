<?php
$this->extend( 'Layouts/main' );

$this->section( 'stylesheets' );
?>

    <link rel="stylesheet" href="<?= base_url( 'assets/css/bootstrap.min.css' )?>">

<?php
$this->endSection();


$this->section( 'content' );

use \Config\Services;
$validation =   Services::validation();
?>

    <h1 class="modal-title my-lg-5 text-center"><?= isset( $title ) ? esc( $title ) : ""; ?></h1>

    <!--- Form HTML -->

    <form method="post">
        <div class="mb-3">
            <label for="nameFrm" class="form-label">User Name</label>
            <input type="text" name="nameFrm" class="form-control" id="nameFrm" value="<?= set_value( 'nameFrm' )?>">
            <?= $validation->hasError( 'nameFrm' ) ? "<div class='alert alert-danger' role='alert'>".$validation->getError( 'nameFrm' )."</div>" : ""; ?>
        </div>
        <div class="mb-3">
            <label for="emailFrm" class="form-label">Email address</label>
            <input type="email" name="emailFrm" class="form-control" id="emailFrm" value="<?= set_value( 'emailFrm' )?>">
            <?= $validation->hasError( 'emailFrm' ) ? "<div class='alert alert-danger' role='alert'>".$validation->getError( 'emailFrm' )."</div>" : ""; ?>
        </div>
        <div class="mb-3">
            <label for="pwdFrm" class="form-label">Password</label>
            <input type="password" name="pwdFrm" class="form-control" id="pwdFrm">
            <?= $validation->hasError( 'pwdFrm' ) ? "<div class='alert alert-danger' role='alert'>".$validation->getError( 'pwdFrm' )."</div>" : ""; ?>
        </div>

        <div class="mb-3">
            <label for="cfPwdFrm" class="form-label">Confirm Password</label>
            <input type="password" name="cfPwdFrm" class="form-control" id="cfPwdFrm">
            <?= $validation->hasError( 'cfPwdFrm' ) ? "<div class='alert alert-danger' role='alert'>".$validation->getError( 'cfPwdFrm' )."</div>" : ""; ?>
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


