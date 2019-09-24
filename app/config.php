<?php

/**
 * Configuración de la base de datos
 */

//configuración de mysql
define('SERVER_NAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'dev_semitech');

//configuración de rutas web
define('SERVER', 'http://localhost:8000');
define('DASHBOARD', SERVER . '/dashboard');
define('LOGOUT', SERVER . '/logout');

//recursos
define('CSS', SERVER . '/resources/css/');
define('JS', SERVER . '/resources/js/');
define('IMG', SERVER . '/resources/img/');