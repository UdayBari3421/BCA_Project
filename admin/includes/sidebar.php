<?php
    $page = substr ($_SERVER['SCRIPT_NAME'],strpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
          <img src="../assets/dist/img/Logo1.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="../assets/dist/img/admin.jpeg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="index.php" class="d-block">ADMIN DASHBOARD</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  
                  <li class="nav-item">
                      <a href="index.php" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>

                  <li class="nav-item has-treeview menu-open active">
                      <a href="#" class="nav-link active">
                          <i class="nav-icon fas fa-book"></i>
                          <p>Collections
                            <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="category.php" class="nav-link <?= $page == "category.php"?'active':''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="products.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Products</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-header">Settings</li>
                  
                  <li class="nav-item">
                      <a href="registered.php" class="nav-link">
                          <i class="nav-icon fa fa-users"></i>
                          <p>Registered User</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="user-role.php" class="nav-link">
                          <i class="nav-icon fa fa-cog"></i>
                          <p>Role for User</p>
                      </a>
                  </li>

              </ul>
              </li>
              </ul>
          </nav><!-- /.sidebar-menu -->
      </div><!-- /.sidebar -->
  </aside>