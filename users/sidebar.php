  <style>
    .sidenav {
      background: #7f9fd3;
    }

    .myParagraph,
    .icons {
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
          <h2 class="logo"><i class='bx bxl-jquery'></i>CDF-Beneiciary</h2>
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
            <a href="#" class="nav-link nav-cdf_loan">
              <i class="bi bi-cash-coin grants"></i>
              <p class="myParagraph">
                CDF Loan/Grant
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=application_form" class="nav-link nav-application_form">
                  <i class="fas fa-angle-right nav-icon icons"></i>
                  <p class="myParagraph">Loan Application</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=" class="nav-link nav-grant_form">
                  <i class="fas fa-angle-right nav-icon icons"></i>
                  <p class="myParagraph">Grant Application</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=my_loans" class="nav-link nav-my_cdf_loans tree-item">
                  <i class="fas fa-angle-right nav-icon icons"></i>
                  <p class="myParagraph">All loans/Grants</p>
                </a>
              </li>
            </ul>
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