<?php
  include_once('app/session.php');
  include_once('app/config.php');

  Connection::openConnection();
?>
<body>
  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3>Semitech Clinic</h3>
      </div>

      <ul class="list-unstyled components">
        <?php 
          if(Session::isSession())
          {
        ?>
            <p class="text-center"><i class="fas fa-user"></i> <?php echo $_SESSION['userName'] . ' ' . $_SESSION['userLastName'] ?></p>
        <?php
          } 
        ?>
        <li>
          <a href="<?php echo DASHBOARD ?>">Dashboard</a>
        </li>
        <li>
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-center"><i class="fas fa-user"></i> Users</a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
            <li>
              <a href="<?php echo VIEW_USERS ?>"><i class="fas fa-users"></i> View users</a>
            </li>
            <li>
              <a href="<?php echo CREATE_USERS ?>"><i class="fas fa-user-plus"></i> Add users</a>
            </li>
            <li>
              <a href="#">Module stuff 3</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Module secretary</a>
          <ul class="collapse list-unstyled" id="homeSubmenu2">
            <li>
              <a href="#">Module secretary 1</a>
            </li>
            <li>
              <a href="#">Module secretary 2</a>
            </li>
            <li>
              <a href="#">Module secretary 3</a>
            </li>
            <li>
              <a href="#">Module secretary 4</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Module laboratorist</a>
          <ul class="collapse list-unstyled" id="homeSubmenu2">
            <li>
              <a href="#">Module laboratorist 1</a>
            </li>
            <li>
              <a href="#">Module laboratorist 2</a>
            </li>
            <li>
              <a href="#">Module laboratorist 3</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Module medic</a>
          <ul class="collapse list-unstyled" id="homeSubmenu2">
            <li>
              <a href="#">Module medic 1</a>
            </li>
            <li>
              <a href="#">Module medic 2</a>
            </li>
            <li>
              <a href="#">Module medic 3</a>
            </li>
          </ul>
        </li>
        <div class="sidebar-header">
        </div>
        <li>
          <a href="#">About</a>
        </li>
        <li>
          <a href="#">Contact</a>
        </li>
      </ul>
    </nav>
    <!-- Page Content  -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>Esconder menú</span>
          </button>
          <a id="navbarDropdown" class="nav-link dropdown-toggle navbar-settings" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						<i class="fas fa-user-cog"></i> <span class="caret"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo LOGOUT ?>">Cerrar Sesión</a>
					</div>
        </div>
      </nav>