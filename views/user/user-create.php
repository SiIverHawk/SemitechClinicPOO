<?php
include_once 'app/connection.php';

$title = 'Crear usuario';

include_once 'views/layouts/header.php';
include_once 'views/layouts/topbar-sidebar.php';
?>
<div class="core-content-wrapperr">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <form action="" id="user-form">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="user-name">Nombre(s)</label>
                <input type="text" class="form-control" id="user-name" placeholder="Jhon Thomas" autofocus>
              </div>
              <div class="form-group col-md-6">
                <label for="user-lastname">Apellido(s)</label>
                <input type="text" class="form-control" id="user-lastname" placeholder="Doe Jhonson">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="user-email">Correo electrónico</label>
                <input type="email" class="form-control" id="user-email" placeholder="johndoe@example.com">
              </div>
              <div class="form-group col-md-6">
                <label for="user-password">Contraseña</label>
                <input type="password" class="form-control" id="user-password" placeholder="Contraseña">
              </div>
            </div>
          </form>
          <div class="form-group row">
            <div class="col-md-12">
              <button class="btn btn-info" name="user-save" id="user-save" data-save=""><i class="fas fa-save"></i> Registrar usuario</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include_once 'views/layouts/closing.php';
?>