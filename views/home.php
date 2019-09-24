<?php
  include_once('app/connection.php');
  include_once('app/config.php');
  include_once('app/http/Database/UsersDatabase/UserRepository.php');
  $title = 'Dashboard';
  include_once('views/layouts/header.php');
  include_once('views/layouts/topbar-sidebar.php');
?>

<?php
  Connection::closeConnection();
  include_once('views/layouts/closing.php');
?>