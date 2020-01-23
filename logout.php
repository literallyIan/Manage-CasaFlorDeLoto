<?php
/**
 * Created by Ian.
 * Date: 09/01/20
 * Time: 23:28
 */

session_start();

$_SESSION = array();

session_destroy();

header("Location: index.php");