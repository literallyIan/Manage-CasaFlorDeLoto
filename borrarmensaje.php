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

$query = "DELETE FROM contacto WHERE id='" . $_GET["id"] . "';";

if ($link->query($query) === TRUE){
    header("location: mensajes.php?MensajeBorradoExitosamente");
} else {
    header("location: mensajes.php?ErrorAlBorrarMensaje");
}
