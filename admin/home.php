<?php include('connection.php') ?>
<style>
  .small-box,
  .welcome {
    background: #7f9fd3;
    border-radius: 222px;
    text-align: center;
    padding: 20px;
    box-shadow: 10px 10px 5px #c2d4f1;
    align-items: center;
  }

  .welcome {
    background: #7f9fd3;
    border-radius: 222px;
    text-align: center;
    padding: 2px;
    box-shadow: 10px 10px 5px #c2d4f1;
    align-items: center;
  }

  .staff,
  .clients,
  .status,
  .approved,
  .pending,
  .rejected {
    color: #eee;
    padding: 2px;
  }
</style>
<div class="animation-container">
  <div class="animated-text"></div>
</div>

<!-- Info boxes -->
<div class="col-12">
  <div class="card box-light welcome">
    <div class="card-body">
      <h3> Welcome <?php echo $_SESSION['login_firstname'] . "  " . $_SESSION['login_lastname']; ?>!</h3>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 col-sm-6 col-md-4">
    <div class="small-box small-box-light shadow-sm border">
      <div class="inner">
        <p>Our Staff</p>
        <h3><?php echo $conn->query("SELECT * FROM employee_list ")->num_rows;
            ?></h3>
      </div>
      <div class="icon">
        <i class="fa fa-user-friends staff"></i>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-4">
    <div class="small-box box-light shadow-sm border">
      <div class="inner">
        <p>Our Clients</p>
        <h3><?php echo $conn->query("SELECT * FROM users")->num_rows;
            ?></h3>
      </div>
      <div class="icon">
        <i class="fa fa-users clients"></i>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-4">
    <div class="small-box box-light shadow-sm border">
      <div class="inner">
        <p>Pending Loans/Grants</p>
        <h3><?php echo $conn->query("SELECT * FROM applications WHERE loan_status = 0")->num_rows;
            ?></h3>
      </div>
      <div class="icon">
        <i class="bi bi-credit-card-2-front status"></i>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-4">
    <div class="small-box box-light shadow-sm border">
      <div class="inner">
        <p>Cleared Loans/Grants</p>
        <h3><?php echo $conn->query("SELECT * FROM applications WHERE loan_status = 1")->num_rows;
            ?></h3>
      </div>
      <div class="icon">
        <i class="bi bi-hourglass-split pending"></i>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-4">
    <div class="small-box box-light shadow-sm border">
      <div class="inner">
        <p>Approved Loan/Grant</p>
        <h3><?php echo $conn->query("SELECT * FROM cdf_committee WHERE decision_1 = 'Approved'")->num_rows;
            ?></h3>
      </div>
      <div class="icon">
        <i class="bi bi-check-circle approved"></i>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-4">
    <div class="small-box box-light shadow-sm border">
      <div class="inner">
        <p>Rejected Loan/Grant</p>
        <h3><?php echo $conn->query("SELECT * FROM cdf_committee WHERE decision_1 = 'Not Approved'")->num_rows;
            ?></h3>
      </div>
      <div class="icon">
        <i class="bi bi-x-circle rejected"></i>
      </div>
    </div>
  </div>
</div>