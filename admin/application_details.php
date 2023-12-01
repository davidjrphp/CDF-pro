<?php
include 'connection.php';

if (isset($_GET['user_id']) && isset($_SESSION['login_id'])) {
    $user_id = $_GET['user_id'];
    $staff_id = $_SESSION['login_id'];

    $qry = $conn->query("
        SELECT 
            a.id,
            u.fullname,
            d.district_name,
            c.constituency,
            a.app_type,
            a.user_id,
            a.district_id,
            a.constituency_id,
            a.ward,
            a.zone,
            a.amount,
            a.phy_address,
            a.club_reg_date,
            a.decision,
            a.feedback
        
        FROM applications a
        JOIN districts d ON a.district_id = d.id
        JOIN constituencies c ON a.constituency_id = c.id
        JOIN users u ON a.user_id = u.id
        WHERE a.user_id = {$_GET['user_id']}
    ");

    if ($qry === false) {
        die("Error executing query: " . $conn->error);
    }

    $result = $qry->fetch_assoc();

    if ($result) {
        foreach ($result as $k => $v) {
            $$k = $v;
        }
    } else {
        die("No data found for user with ID {$_GET['user_id']}");
    }
}
?>

<style>
    .card-profile {
        position: relative;
        background-position: center;
        height: auto;
        display: flex;
        border-radius: 10px;
    }
</style>

<div class="card card-profile">
    <div class="card-body">
        <div class="container-fluid text-center">
            <div id="msg"></div>
            <div class="form-group d-flex justify-content-center">
                <img src="../assets/img/zambia.png " alt="" id="cimg" class="img-fluid  " style="width: 150px; height: 150px;">
            </div>
            <h4 class="title-name title-font " style="color: #000; font-weight: bold; font-size: 2rem;"> CONSTITUENCY DEVELOPMENT FUND (CDF)</h4>
            <p class="information title-font " style="font-size: 20px; color: #000;"> Instructions: This application form should be completed by the applicant and sent together with supporting documents to the Chairperson, Ward Development Committee.
                <br>
                <span><b>Disclaimer: <i>Completion of the form does not guarantee the award of the Grant</i></b></span>
            </p>
        </div>
    </div>
</div>

<div id="accordion">
    <!-- State 1 -->
    <div class="card">
        <div class="card-header" id="heading1">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    <h5>SECTION A: General Deatils <i>(to be filled by applicant)</i></h5>
                </button>
            </h5>
        </div>

        <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <dl>
                            <dt><b class="border-bottom border-primary">Name of club/Org.</b></dt>
                            <dd><?php echo ucwords($fullname) ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">District</b></dt>
                            <dd><?php echo ucwords($district_name) ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Constituency</b></dt>
                            <dd><?php echo ucwords($constituency) ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Name of Ward</b></dt>
                            <dd><?php echo ucwords($ward) ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Name of Zone</b></dt>
                            <dd><?php echo ucwords($zone) ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Grant Type</b></dt>
                            <dd><?php echo ucwords($app_type) ?></dd>
                        </dl>

                    </div>
                    <div class="col-md-6">
                        <dl>
                            <dt><b class="border-bottom border-primary">Grant Amount</b></dt>
                            <dd><?php echo ucwords($amount) ?></dd>
                        </dl>

                        <dl>
                            <dt><b class="border-bottom border-primary"></b>Business Physical Address</dt>
                            <dd><?php echo ucwords($phy_address) ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Date of Club/Org. Registration</b></dt>
                            <dd><?php echo date("m d,Y", strtotime($club_reg_date)) ?></dd>
                        </dl>

                        <dl>
                            <dt><b class="border-bottom border-primary">Experience in a project of similar nature</b></dt>
                            <dd><?php echo ucwords($decision) ?></dd>
                        </dl>

                        <dl>
                            <dt><b class="border-bottom border-primary">Explanation/Comment</b></dt>
                            <dd><?php echo ucwords($feedback) ?></dd>
                        </dl>
                        <dl>

                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="heading2">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                    <h5>SECTION B: Project Identification</h5>
                </button>
            </h5>
        </div>
        <?php
        if (isset($_GET['user_id'])) {
            $user_id = $_GET['user_id'];

            $qry = $conn->query("
            SELECT 
                p.id,
                p.problems,
                p.prob_address,
                p.proj_identity,
                p.proj_benefit,
                p.direct_jobs
            FROM project_identity p
            JOIN applications a ON p.user_id = a.user_id
            WHERE a.user_id = {$_GET['user_id']}
        ");

            if ($qry === false) {
                die("Error executing query: " . $conn->error);
            }

            if ($qry->num_rows > 0) {
                $result = $qry->fetch_assoc();
                foreach ($result as $k => $v) {
                    $$k = $v;
                }
            } else {
                die("No data found for user with ID {$_GET['user_id']}");
            }
        }

        ?>

        <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <dl>
                            <dt><b class="border-bottom border-primary">Main Problems in the Community.</b></dt>
                            <dd><?php echo isset($problems) ? ucwords($problems) : 'Not available'; ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Problems the Project will Address</b></dt>
                            <dd><?php echo isset($prob_address) ? ucwords($prob_address) : 'Not available'; ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Directed Jobs to be created</b></dt>
                            <dd><?php echo isset($direct_jobs) ? ucwords($direct_jobs) : 'Not available'; ?></dd>
                        </dl>
                    </div>
                    <div class="col-md-6">
                        <dl>
                            <dt><b class="border-bottom border-primary">Project Identity by the Group</b></dt>
                            <dd><?php echo isset($proj_identity) ? ucwords($proj_identity) : 'Not available'; ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Community Benefit from the Project</b></dt>
                            <dd><?php echo isset($proj_benefit) ? ucwords($proj_benefit) : 'Not available'; ?></dd>
                        </dl>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="card">
        <div class="card-header" id="heading3">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    <h5>SECTION C: Financial Assessment</h5>
                </button>
            </h5>
        </div>

        <?php
        if (isset($_GET['user_id'])) {
            $user_id = $_GET['user_id'];

            $qry = $conn->query("
            SELECT 
                b.id,
                b.decision,
                b.feedback,
                b.comment,
                b.branch,
                b.branch_code,
                b.swift_code,
                b.acc_number,
                b.tpin_number,
                b.mm_wallet,
                b.any_training,
                b.total_members,
                b.org_name,
                b.training_duration
            FROM bank_details b
            JOIN applications a ON b.user_id = b.user_id
            WHERE a.user_id = {$_GET['user_id']}
        ");

            if ($qry === false) {
                die("Error executing query: " . $conn->error);
            }

            if ($qry->num_rows > 0) {
                $result = $qry->fetch_assoc();
                foreach ($result as $k => $v) {
                    $$k = $v;
                }
            } else {
                die("No data found for user with ID {$_GET['user_id']}");
            }
        }

        ?>
        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <dl>
                            <dt><b class="border-bottom border-primary"></b>Have you taken any loan from any orgainzation in the last 3 years</dt>
                            <dd><?php echo isset($decision) ? ucwords($decision) : 'Not available'; ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">If yes, from which organizatio?n and how much was the loan</b></dt>
                            <dd><?php echo isset($feedback) ? ucwords($feedback) : 'Not available'; ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">What is the status of the loan taken?</b></dt>
                            <dd><?php echo isset($comment) ? ucwords($comment) : 'Not available'; ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Bank Name</b></dt>
                            <dd><?php echo isset($bank_name) ? ucwords($bank_name) : 'Not available'; ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Branch</b></dt>
                            <dd><?php echo isset($branch) ? ucwords($branch) : 'Not available'; ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Bank Account Number</b></dt>
                            <dd><?php echo isset($acc_number) ? ucwords($acc_number) : 'Not available'; ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">What is the status of the loan taken?</b></dt>
                            <dd><?php echo isset($swift_code) ? ucwords($swift_code) : 'Not available'; ?></dd>
                        </dl>
                    </div>
                    <div class="col-md-6">
                        <dl>
                            <dt><b class="border-bottom border-primary">T-PIN</b></dt>
                            <dd><?php echo isset($tpin_number) ? ucwords($tpin_number) : 'Not available'; ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Mobile Money Wallet Name and Registered Number</b></dt>
                            <dd><?php echo isset($mm_wallet) ? ucwords($mm_wallet) : 'Not available'; ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Type of training received</b></dt>
                            <dd><?php echo isset($any_training) ? ucwords($any_training) : 'Not available'; ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Trained Members</b></dt>
                            <dd><?php echo isset($total_members) ? ucwords($total_members) : 'Not available'; ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">From which organization?</b></dt>
                            <dd><?php echo isset($org_name) ? ucwords($org_name) : 'Not available'; ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Training Duration</b></dt>
                            <dd><?php echo isset($training_duration) ? ucwords($training_duration) : 'Not available'; ?></dd>
                        </dl>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- State 4 -->
    <div class="card">
        <div class="card-header" id="heading4">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                    <h5>DECLARATION</h5>
                </button>
            </h5>
        </div>
        <?php
        if (isset($_GET['user_id'])) {
            $user_id = $_GET['user_id'];

            $qry = $conn->query("
            SELECT 
                d.id,
                d.app_name,
                d.phy_address,
                d.phone,
                d.app_nrc,
                d.start_date,
                d.day,
                d.month_year,
                d.sign
            FROM declaration d
            JOIN applications a ON d.user_id = a.user_id
            WHERE a.user_id = {$_GET['user_id']}
        ");

            if ($qry === false) {
                die("Error executing query: " . $conn->error);
            }

            if ($qry->num_rows > 0) {
                $result = $qry->fetch_assoc();
                foreach ($result as $k => $v) {
                    $$k = $v;
                }
            } else {
                die("No data found for user with ID {$_GET['user_id']}");
            }
        }


        ?>
        <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
            <div class="card-body">

                <div class="row">
                    <h4>17. DECLARATION</h4>
                    <p>We the undersigned, on <b><u><?php echo isset($start_date) ? ucwords($start_date) : 'Not available'; ?></u></b> this <b><u><?php echo isset($day) ? ucwords($day) : 'Not available'; ?></u></b> day of <b><u><?php echo isset($month_year) ? ucwords($month_year) : 'Not available'; ?></u></b> declare that the information given herein is the correct state of affairs to the best of my knowledge. We will take full responsibility in the event of abuse, mismanagement, defrauding of the funds provided under this empowerment fund:</p>

                    <p>Note: In the case where you have multiple members, the signatory to the application must be limited up to 5 members.</p>
                    <div class="col-md-6">

                        <dl>
                            <dt><b class="border-bottom border-primary"></b>Name of Applicant</dt>
                            <dd><?php echo isset($app_name) ? ucwords($app_name) : 'Not available'; ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Applicant Physical Address</b></dt>
                            <dd><?php echo isset($phy_address) ? ucwords($phy_address) : 'Not available'; ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Applicant's Mobile Phone</b></dt>
                            <dd><?php echo isset($phone) ? ucwords($phone) : 'Not available'; ?></dd>
                        </dl>
                    </div> <br><br>
                    <div class="col-md-6">
                        <dl>
                            <dt><b class="border-bottom border-primary">Applicant's NRC</b></dt>
                            <dd><?php echo isset($app_nrc) ? ucwords($app_nrc) : 'Not available'; ?></dd>
                        </dl>
                        <dl>
                            <dt><b class="border-bottom border-primary">Applicant's Signature</b></dt>
                            <dd><?php echo isset($sign) ? ucwords($sign) : 'Not available'; ?></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- State 4 -->
    <?php if ($_SESSION['login_type'] == 0) : ?>
        <div class="card">
            <div class="card-header" id="heading5">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                        <h5>SECTION D: RECOMMENDATION BY THE WARD DEVELOPMENT COMMITTEE</h5>
                    </button>
                </h5>
            </div>

            <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
                <div class="card-body">
                    <form action="" id="ward_committee">
                        <input type="hidden" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
                        <input type="hidden" name="staff_id" value="<?php echo isset($staff_id) ? $staff_id : ''; ?>">
                        <div class="form-group">
                            <label for="decision">Recommendation:</label>

                            <select class="form-control" id="decision" name="decision_2" required>
                                <option value="<?php echo isset($decision_2) ? $decision_2 : 'Recommended' ?>">Recommended</option>
                                <option value="<?php echo isset($decision_2) ? $decision_2 : 'Not Recommended' ?>">Not Recommended</option>
                                <option value="<?php echo isset($decision_2) ? $decision_2 : 'Deferred' ?>">Deferred</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="reasons">Reasons:</label>
                            <textarea class="form-control" id="reasons" name="reasons" rows="5" required> <?php echo isset($reasons) ? $reasons : '' ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="chairpersonName">Name (Chairperson):</label>
                            <input type="text" class="form-control" id="chairpersonName" name="chair_name" value=" <?php echo isset($chair_name) ? $chair_name : '' ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="sign">Sign:</label>
                            <input type="text" class="form-control" id="sign_1" name="sign_1" value=" <?php echo isset($sign_1) ? $sign_1 : '' ?>" required>
                        </div>
                        <hr>
                        <div class="col-lg-12 text-right justify-content-center d-flex">
                            <button class="btn btn-light bg-success mr-2">Save</button>
                            <button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page='">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <script>
        $('#ward_committee').submit(function(e) {
            e.preventDefault()
            start_load()
            $.ajax({
                url: '../back-end/save_ward.php',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function(resp) {
                    if (resp == 1) {
                        alert_toast('Successfully Submitted.', "success");
                        setTimeout(function() {
                            location.reload()
                        }, 750)
                    } else if (resp == 0) {
                        $('#msg').html("<div class='alert alert-danger'>You cannot Apply because your Loan is Either Pending or Not Cleared</div>");
                        end_load()
                    } else if (resp == 2) {
                        $('#msg').html("<div class='alert alert-danger'>Sorry you cannot apply due to a pending Loan</div>");
                        end_load()
                    }

                }
            })
        });
    </script>

    <!-- State 4 -->
    <?php if ($_SESSION['login_type'] == 1) : ?>
        <div class="card">
            <div class="card-header" id="heading5">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                        <h5>SECTION E: DECISION BY THE CONSTITUENCY DEVELOPMENT FUND COMMITTEE</h5>
                    </button>
                </h5>
            </div>

            <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
                <div class="card-body">
                    <form action="" id="decision">
                        <input type="hidden" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
                        <input type="hidden" name="staff_id" value="<?php echo isset($staff_id) ? $staff_id : ''; ?>">
                        <div class="form-group">
                            <label for="decision">Decision:</label>

                            <select class="form-control" id="recommendation" name="decision_1" required>
                                <option value="<?php echo isset($decision_1) ? $decision_1 : 'Approved' ?>">Approved</option>
                                <option value="<?php echo isset($decisio_1) ? $decision_1 : 'Not Approved' ?>">Not Approved</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="reasons">Reasons:</label>
                            <textarea class="form-control" id="reasons" name="reasons_1" rows="5" required> <?php echo isset($reasons_1) ? $reasons_1 : '' ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="chairpersonName">Name (Chairperson):</label>
                            <input type="text" class="form-control" id="chairpersonName" name="chair_name" value=" <?php echo isset($chair_name) ? $chair_name : '' ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="sign">Sign:</label>
                            <input type="text" class="form-control" id="sign_2" name="sign_2" value=" <?php echo isset($sign_2) ? $sign_2 : '' ?>" required>
                        </div>
                        <hr>
                        <div class="col-lg-12 text-right justify-content-center d-flex">
                            <button class="btn btn-light bg-success mr-2">Save</button>
                            <button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page='">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <script>
        $('#decision').submit(function(e) {
            e.preventDefault()
            start_load()
            $.ajax({
                url: '../back-end/save_committee.php',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function(resp) {
                    if (resp == 1) {
                        alert_toast('Successfully Submitted.', "success");
                        setTimeout(function() {
                            location.reload()
                        }, 750)
                    } else if (resp == 0) {
                        $('#msg').html("<div class='alert alert-danger'>You cannot Apply because your Loan is Either Pending or Not Cleared</div>");
                        end_load()
                    } else if (resp == 2) {
                        $('#msg').html("<div class='alert alert-danger'>Sorry you cannot apply due to a pending Loan</div>");
                        end_load()
                    }

                }
            })
        });
    </script>

</div>