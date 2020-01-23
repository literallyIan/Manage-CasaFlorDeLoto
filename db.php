<?php
/**
 * Created by Ian.
 * Date: 09/01/20
 * Time: 23:24
 */


define('DB_SERVER', '92.249.44.105');
define('DB_USERNAME', 'u366697985_casaflor_admin');
define('DB_PASSWORD', 'Database.');
define('DB_NAME', 'u366697985_casaflor');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}