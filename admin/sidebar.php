  <style>
    .sidenav {
      background: #7f9fd3;
    }

    .myParagraph,
    .settings,
    .icons,
    .comments,
    .grants {
      color: white
    }

    .logo {
      color: #0a224b;
      font-weight: bold;
    }
  </style>
  <aside class="main-sidebar sidebar-light sidenav ">
    <div class="dropdown">
      <a href="./" class="brand-link">

        <div class="system-logo logo">
          <h2 class="logo"><i class='bx bxl-jquery'></i>CDF-Staff</h2>
        </div>
      </a>
    </div><br><br>
    <div class="sidebar pb-4 mb-4">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-tachometer-alt icons"></i>
              <p class="myParagraph">
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_supervisor">
              <i class="bi bi-cash-coin grants"></i>
              <p class="myParagraph">
                Loan/Grants
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=pending_applications" class="nav-link nav-pending_loans tree-item">
                  <i class="fas fa-angle-right nav-icon icons"></i>
                  <p class="myParagraph">Pending Loans/Grants</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=approved" class="nav-link nav-approved tree-item">
                  <i class="fas fa-angle-right nav-icon icons"></i>
                  <p class="myParagraph">Approved Loans/Grants</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="./index.php?page=cleared" class="nav-link nav-cleared tree-item">
                  <i class="fas fa-angle-right nav-icon icons"></i>
                  <p class="myParagraph">Cleared</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-staff">
              <i class="nav-icon fas fa-user-friends icons"></i>
              <p class="myParagraph">
                Our Staff
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_staff" class="nav-link nav-new_staff tree-item">
                  <i class="fas fa-angle-right nav-icon icons"></i>
                  <p class="myParagraph">Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=staff_list" class="nav-link nav-supervisor_list tree-item">
                  <i class="fas fa-angle-right nav-icon icons"></i>
                  <p class="myParagraph">List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-staff">
              <i class="nav-icon fas fa-user-secret icons"></i>
              <p class="myParagraph">
                Admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_admin" class="nav-link nav-new_admin tree-item">
                  <i class="fas fa-angle-right nav-icon icons"></i>
                  <p class="myParagraph">Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=admin_list" class="nav-link nav-admin_list tree-item">
                  <i class="fas fa-angle-right nav-icon icons"></i>
                  <p class="myParagraph">List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="./index.php?page=reports" class="nav-link nav-reports">
              <i class="bi bi-chat-right-dots"></i>
              <p class="myParagraph">Reports</p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="./index.php?page=system_settings" class="nav-link nav-loan_extension">
              <i class="fa fa-cog settings"></i>
              <p class="myParagraph">System Settings</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <script>
    $(document).ready(function() {
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
      var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      if (s != '')
        page = page + '_' + s;
      if ($('.nav-link.nav-' + page).length > 0) {
        $('.nav-link.nav-' + page).addClass('active')
        if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
          $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
          $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
          $('.nav-link.nav-' + page).parent().addClass('menu-open')
        }

      }
    })
  </script>