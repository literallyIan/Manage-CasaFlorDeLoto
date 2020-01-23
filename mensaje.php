<?php
/**
 * Created by Ian.
 * Date: 09/01/20
 * Time: 23:28
 */

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

include_once "db.php";

if (empty($_GET["id"])) {
    header("location: welcome.php");
}

if (is_int($_GET["id"])) {
    header("location: welcome.php");
}

$query = "SELECT * FROM contacto WHERE id='" . $_GET["id"] . "';";
$result = $link->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nombre = $row["nombre"] . " " . $row["apellido"];
        $email = $row["email"];
        $need = $row["need"];
        $mensaje = $row["mensaje"];
        $date = $row["time"];
    }
} else {
    header("location: mensajes.php");
}

?>
<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="page-header">
    <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
</div>
<div class="container">
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Razón</th>
            <th>Mensaje</th>
        </tr>

</div>
<p>
    <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
</p>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Casa Flor de Loto | Mensaje</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/extra.css">
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
                <span>
                    <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
        </div>
        <div class="app-header__content">
            <div class="app-header-left">
                <ul class="header-menu nav">
                    <li class="nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            <i class="nav-link-icon fa fa-database"> </i>
                            Base de datos
                        </a>
                    </li>
                    <li class="btn-group nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            <i class="nav-link-icon fa fa-edit"></i>
                            Proyectos
                        </a>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            <i class="nav-link-icon fa fa-cog"></i>
                            Configuración
                        </a>
                    </li>
                </ul>
            </div>
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                       class="p-0 btn">
                                        <i class="fa fa-user fa-lg"></i>
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                         class="dropdown-menu dropdown-menu-right">
                                        <a href="account.php" class="btn-link">
                                            <button type="button" tabindex="0" class="dropdown-item">
                                                <i class="fa fa-user mr-2"></i>Cuenta
                                            </button>
                                        </a>
                                        <h6 tabindex="-1" class="dropdown-header">Ayuda</h6>
                                        <a href="mailto:iangarciag@outlook.com" class="btn-link">
                                            <button type="button" tabindex="0" class="dropdown-item"><i
                                                        class="fa fa-life-ring mr-2"></i> Contactar
                                            </button>
                                        </a>
                                        <div tabindex="-1" class="dropdown-divider"></div>
                                        <a href="logout.php" class="btn-link">
                                            <button type="button" tabindex="0" class="dropdown-item"><i
                                                        class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesión
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    Administrador
                                </div>
                                <div class="widget-subheading">
                                    Casa Flor de Loto
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-main">
        <div class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                        <span>
                            <button type="button"
                                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
            </div>
            <div class="scrollbar-sidebar">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu">
                        <li class="app-sidebar__heading">Menús</li>
                        <li>
                            <a href="welcome.php">
                                <i class="metismenu-icon pe-7s-home"></i>
                                Inicio
                            </a>
                        </li>
                        <li>
                            <a href="mensajes.php" class="mm-active">
                                <i class="metismenu-icon pe-7s-comment"></i>
                                Mensajes
                            </a>
                        </li>
                        <li>
                            <a href="editar.php">
                                <i class="metismenu-icon pe-7s-note"></i>
                                Editar
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div>Mensaje <span class="small">(#<?php print $_GET["id"] ?>)</span>.
                                <div class="page-title-subheading">
                                    <?php printf(date("d-m-Y", strtotime($date)) . " a las " . date("H:i", strtotime($date)) . " hrs."); ?>
                                </div>
                            </div>
                        </div>
                        <div class="page-title-actions">
                            <a href="mensajes.php">
                                <button class="mb-2 mr-2 btn btn-danger">
                                    <i class="fa fa-angle-double-left text-white mr-2"></i>
                                    Regresar
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="tab-pane">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header"><?php printf($nombre) ?></div>
                                    <div class="card-body">
                                        <h5 class="card-title"
                                            style="text-transform: capitalize"><?php printf($need) ?></h5>
                                        <br>
                                        <?php printf($mensaje) ?>
                                        <h5 class="card-title mt-5">E-Mail</h5>
                                        <br>
                                        <?php printf($email) ?>
                                    </div>
                                    <div class="card-footer">
                                        <a href="mailto:<?php printf($email)?>"><button class="btn btn-success pt-1 pb-1 pr-3 pl-3 mr-3"><i class="fa fa-reply mr-2"></i> Contestar</button></a>
                                        <button data-toggle="modal" data-target="#confirmModal" class="btn btn-danger pt-1 pb-1 pr-3 pl-3"><i class="fa fa-trash-alt mr-2"></i> Borrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-wrapper-footer">
                <div class="app-footer">
                    <div class="app-footer__inner">
                        <div class="app-footer-left">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="https://casaflordeloto.com" target="_blank" class="nav-link">
                                        Casa Flor de Loto
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="app-footer-right">
                            <ul class="nav">
                                <li class="nav-item">
                                    Copyright &copy; 2020 Ian García
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/extra.js"></script>
</body>
</html>
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Esta a punto de borrar este mensaje, porfavor confirma esta acción.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link float-left" data-dismiss="modal">Cerrar</button>
                <a href="borrarmensaje.php?id=<?php printf($_GET["id"]) ?>"><button type="button" class="btn btn-primary">Confirmar</button></a>
            </div>
        </div>
    </div>
</div>