<?php
  include_once('app/connection.php');
  include_once('app/http/Database/UsersDatabase/UserRepository.php');
  $title = 'Ver usuarios';

  Connection::openConnection();

  $users = UserRepository::allUsers(Connection::getConnection());

  include_once('views/layouts/header.php');
  include_once('views/layouts/topbar-sidebar.php');
?>
<div class="container">
<div class="row">
  <div class="col-sm-12 col-md-12">
  <?php
  if (!empty($users)) 
  {
?>
  <table class="table table-bordered" id="user-table">
    <thead class="thead-primary">
      <th>Id</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Correo</th>
    </thead>
    <tbody>
  <?php
    foreach ($users as $user) 
    {
  ?>
      <tr>
        <td>
          <?php echo $user->getId(); ?>
        </td>
        <td>
          <?php echo $user->getName(); ?>
        </td>
        <td>
          <?php echo $user->getLastname(); ?>
        </td>
        <td>
          <?php echo $user->getEmail(); ?>
        </td>
      </tr>
  <?php
    }
  ?>
    </tbody>
  </table>
<?php
  }
?>
  </div>
</div>
</div>
<?php
  Connection::closeConnection();
  include_once('views/layouts/closing.php');
?>