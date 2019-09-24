<?php

include_once('app/session.php');
include_once('app/redirect.php');
include_once('app/config.php');

Session::logout();
Redirect::redirectTo(SERVER);