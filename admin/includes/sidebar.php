<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link">
      <img src="dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        
        <?php 
     
        if(isset( $_SESSION['firstname'])){
                  echo  '<div class="info">
                          <a href="#" class="d-block">'. $_SESSION['firstname'].'</a>
                        </div>';
                }
            ?>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       
          <li class="nav-item">
            <a href="user" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="category" class="nav-link">
              <i class="nav-icon fas fa-waze"></i>
              <p>
              Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="posts" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Posts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="faqs" class="nav-link">
              <i class="nav-icon fas fa-question"></i>
              <p>
                FAQ'S
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="feedback" class="nav-link">
              <i class="nav-icon fas fa-comment-alt"></i>
              <p>
                FeedBack
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>