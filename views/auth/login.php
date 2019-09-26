<?php

include_once('app/config.php');
include_once('app/connection.php');
include_once('app/http/Database/UsersDatabase/UserRepository.php');
include_once('app/http/Validators/UserValidator/LoginValidator.php');
include_once('app/session.php');
$title = 'Autenticación';

if (Session::isSession()) 
{
  Redirect::redirectTo(DASHBOARD);
}


if (isset($_POST['btn-login'])) 
{
  Connection::openConnection();
  
  $validateLogin = new LoginValidator($_POST['login-email'], $_POST['login-password'], Connection::getConnection());

  if ($validateLogin->getError() === '' && !is_null($validateLogin->getUser())) 
  {
    Session::login(
      $validateLogin->getUser()->getId(),
      $validateLogin->getUser()->getName(),
      $validateLogin->getUser()->getLastName()
    );

    Redirect::redirectTo(DASHBOARD);
  }

  Connection::closeConnection();
}

include_once 'views/layouts/header.php';
?>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#">Semitech Solutions</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
          </ul>
          <!-- Right Side Of Navbar -->
        </div>
      </div>
    </nav>
    <main class="py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">Autenticación</div>
              <div class="card-body">
                <form method="POST" action="<?php echo SERVER; ?>">
                  <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                    <div class="col-md-6">
                      <input id="login-email" type="email" class="form-control" name="login-email" required autocomplete="email" autofocus value="<?php (null !== $_POST['btn-login'] && null !== $_POST['login-email'] && !empty($_POST['login-email'])) ? print($_POST['login-email']) : print('') ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                    <div class="col-md-6">
                      <input id="login-password" type="password" class="form-control" name="login-password" required autocomplete="current-password">
                    </div>
                  </div>
                  <?php
                    if (isset($_POST['btn-login'])) 
                    {
                      $validateLogin->showError();
                    }
                  ?>
                  <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                      <button type="submit" class="btn btn-primary" name="btn-login">
                        Autenticarse
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>
<?php
  Connection::closeConnection();
?>
</html>