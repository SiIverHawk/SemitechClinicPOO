<?php

/**
 * Configuración de la base de datos
 */

//configuración de mysql
define('SERVER_NAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'cmgh0694');
define('DB_NAME', 'dev_semitech2');

//configuración de rutas web
define('SERVER', 'http://localhost:8000');
define('DASHBOARD', SERVER . '/dashboard');
define('VIEW_USERS', SERVER . '/users');
define('CREATE_USERS', SERVER . '/users/create-users');
define('POST_CREATE_USERS', SERVER . '/users/post-create-users');
define('LOGOUT', SERVER . '/logout');

//recursos
define('CSS', SERVER . '/resources/css/');
define('JS', SERVER . '/resources/js/');
define('IMG', SERVER . '/resources/img/');