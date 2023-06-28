<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Stylesheets -->
    <?php $this->renderSection( 'stylesheets' ); ?>

    <title><?=  isset( $title ) ? esc( $title ) : "Document"; ?></title>
</head>
<body>
<!-- NavBar Start -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= site_url( '/' );?>">Home</a>
                </li>
                <li class="nav-item">
                    <?= session()->get( 'isLoggedIn' ) ? '' : '<a class="nav-link" href="'.site_url( 'register' ).'">Register</a>';?>
                </li>
<!--                <li class="nav-item dropdown">-->
<!--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">-->
<!--                        Dropdown-->
<!--                    </a>-->
<!--                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--                        <li><a class="dropdown-item" href="#">Action</a></li>-->
<!--                        <li><a class="dropdown-item" href="#">Another action</a></li>-->
<!--                        <li><hr class="dropdown-divider"></li>-->
<!--                        <li><a class="dropdown-item" href="#">Something else here</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>-->
<!--                </li>-->
            </ul>
<!--            <form class="d-flex">-->
<!--                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
<!--                <button class="btn btn-outline-success" type="submit">Search</button>-->
<!--            </form>-->
            <?= session()->get( 'isLoggedIn' ) ? '<a class="nav-link" href="'.site_url( 'logout' ).'">logout</a>' : "";?>

        </div>
    </div>
</nav>
<!-- NavBar End -->


<!-- Grid HTML -->

<div class="container">
    <div class="row">
        <div class="col">

        </div>
        <div class="col">
            <?php $this->renderSection( 'content' ); ?>
        </div>
        <div class="col">

        </div>
    </div>
</div>

<!-- Grid HTML End -->


<!--- Scripts -->
<?php $this->renderSection( 'scripts' ); ?>


</body>
</html>