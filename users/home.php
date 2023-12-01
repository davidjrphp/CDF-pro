<?php include('connection.php') ?>
<style>
  .animation-container {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-70%, -70%);
    animation: slideIn 6s ease infinite alternate;
  }

  .animated-text {
    font-size: 20em;
    font-weight: bold;
    color: #333;
    opacity: 0.1;
  }

  @keyframes slideIn {
    from {
      transform: translateX(-585px);
    }

    to {
      transform: translateX(50px);
    }
  }

  .small-box,
  .welcome {
    background: #7f9fd3;
    border-radius: 222px;
    text-align: center;
    padding: 30px;
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

  .grants,
  .loans,
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
      <h3> Welcome <?php echo $_SESSION['login_fullname']; ?>!</h3>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 col-sm-6 col-md-4">
    <div class="small-box small-box-light shadow-sm border">
      <div class="inner">
        <h3><?php //echo $conn->query("SELECT * FROM department_list ")->num_rows; 
            ?></h3>
        <p>Total Grants</p>
      </div>
      <div class="icon">
        <i class="bi bi-cash-coin grants"></i>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-4">
    <div class="small-box box-light shadow-sm border">
      <div class="inner">
        <h3><?php //echo $conn->query("SELECT * FROM job_description")->num_rows; 
            ?></h3>
        <p>Total CDF Loans</p>
      </div>
      <div class="icon">
        <i class="bi bi-cash-stack loans"></i>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-4">
    <div class="small-box box-light shadow-sm border">
      <div class="inner">
        <h3><?php //echo $conn->query("SELECT * FROM users")->num_rows; 
            ?></h3>
        <p>My Loan Status</p>
      </div>
      <div class="icon">
        <i class="bi bi-credit-card-2-front status"></i>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-4">
    <div class="small-box box-light shadow-sm border">
      <div class="inner">
        <h3><?php //echo $conn->query("SELECT * FROM employee_list")->num_rows; 
            ?></h3>
        <p>Pending Loan</p>
      </div>
      <div class="icon">
        <i class="bi bi-hourglass-split pending"></i>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-4">
    <div class="small-box box-light shadow-sm border">
      <div class="inner">
        <h3><?php //echo $conn->query("SELECT * FROM supervisor_list")->num_rows; 
            ?></h3>
        <p>Approved Loan/Grant</p>
      </div>
      <div class="icon">
        <i class="bi bi-check-circle approved"></i>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-4">
    <div class="small-box box-light shadow-sm border">
      <div class="inner">
        <h3><?php //echo $conn->query("SELECT * FROM work_plan")->num_rows; 
            ?></h3>
        <p>Rejected Loan/Grant</p>
      </div>
      <div class="icon">
        <i class="bi bi-x-circle rejected"></i>
      </div>
    </div>
  </div>
</div>