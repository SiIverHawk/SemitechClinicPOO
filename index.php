<?php
/**
 * Archivo enrutador
 */
include_once('app/session.php');
include_once('app/redirect.php');
include_once('app/config.php');

$urlComponents = parse_url($_SERVER['REQUEST_URI']);

$route = $urlComponents['path'];

$routeParts = explode('/', $route);
$routeParts = array_filter($routeParts);
$routeParts = array_slice($routeParts, 0);

$chosenRoute = 'views/errors/404.php';

if(empty($routeParts))
{
  $chosenRoute = 'views/auth/login.php';
}
else if(count($routeParts) == 1)
  {
    if (Session::isSession()) 
    {
      switch ($routeParts[0]) 
      {
        case 'dashboard':
        $chosenRoute = 'views/home.php';
        break;
        case 'users':
        $chosenRoute = 'views/user/user-index.php';
        break;
        break;
        case 'logout':
        $chosenRoute = 'views/auth/logout.php';
        break;
      }
    }
    else
    {
      Redirect::redirectTo(SERVER);
    }
  }
else if(count($routeParts) == 2)
{
  if (Session::isSession()) 
  {
    if ($routeParts[0] == 'users') 
    {
      switch ($routeParts[1]) 
      {
        case 'create':
        $chosenRoute = 'views/user/user-create.php';
        break;
      }
    }
  }
  else
  {
    Redirect::redirectTo(SERVER);
  }
}



include_once($chosenRoute);