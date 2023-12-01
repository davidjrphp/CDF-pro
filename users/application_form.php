<?php
include 'connection.php';

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

<div class="card card-profile" style="">
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
                <form action="" id="application">
                    <div id="msg" class="form-group"></div>
                    <div class="row">
                        <div class="col-md-6 border-right">
                            <div class="form-group">
                                <label for="">Name of Club/Org/Corp.</label>
                                <select name="user_id" id="user_id" class="form-control form-control-sm" disabled required="required">
                                    <option value=""></option>
                                    <?php
                                    if (isset($_SESSION['login_fullname']) && isset($_SESSION['login_id'])) {

                                        $user_id = $_SESSION['login_id'];
                                        $user_name = $_SESSION['login_fullname'];
                                        echo '<option value="' . $user_id . '" selected>' . $user_name . '</option>';
                                    }
                                    ?>
                                </select>
                                <input type="hidden" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label">District</label>
                                <select name="district_id" id="district_id" class="form-control form-control-sm select2">
                                    <option value=""></option>
                                    <?php
                                    $districts = $conn->query("SELECT * FROM districts order by district_name asc");
                                    while ($row = $districts->fetch_assoc()) :
                                    ?>
                                        <option value="<?php echo $row['id'] ?>" <?php echo isset($district_id) && $district_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['district_name'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label">Constituency</label>
                                <select name="constituency_id" id="constituency_id" class="form-control form-control-sm select2">
                                    <option value=""></option>
                                    <?php
                                    $constituencies = $conn->query("SELECT * FROM constituencies order by constituency asc");
                                    while ($row = $constituencies->fetch_assoc()) :
                                    ?>
                                        <option value="<?php echo $row['id'] ?>" <?php echo isset($constituency_id) && $constituency_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['constituency'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <p>Seed money to Cooperatives, Clubs and Organised Groups to support Community Savings Groups (e.g. Village Banking and Chilimba)</p>
                                <label for="application_type">Grant Type:</label>
                                <select class="form-control form-control-sm select2" name="app_type" id="app_type">
                                    <option value="<?php echo isset($app_type) ? $app_type : 'Grant' ?>">Grant</option>
                                    <option value="<?php echo isset($app_type) ? $app_type : 'Loan' ?>">Loan</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Grant Amount (ZMW)</label>
                                <input class="form-control form-control-sm" id="amount" name="amount" type="number" required value="<?php echo isset($amount) ? $amount : '' ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Name of Ward</label>
                                <input class="form-control form-control-sm" id="ward" name="ward" type="text" required value="<?php echo isset($ward) ? $ward : '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label">Name of Zone</label>
                                <input class="form-control form-control-sm" id="zone" name="zone" type="text" required value="<?php echo isset($zone) ? $zone : '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label">Business Physical Address</label>
                                <input class="form-control form-control-sm" id="phy_address" name="phy_address" type="text" required value="<?php echo isset($phy_address) ? $phy_address : '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label">Date when Club/Organised Group/Enterprise/Cooperative was registered with relevant authorities</label>
                                <input type="date" name="club_reg_date" id="club_reg_date" class="form-control form-control-sm"" required value=" <?php echo isset($club_reg_date) ? $club_reg_date : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for=" "><strong>Does the Club/Organised Group/Enterprise/Cooperative have any experience in a project of similar nature?</strong></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="decision" id="agree-radio" value="Yes" required onclick="toggleTextarea()" <?php echo isset($yes) && $yes === 'Yes' ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="agree-radio">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="decision" id="disagree-radio" value="No" required <?php echo isset($no) && $no === 'No' ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="disagree-radio">
                                        No
                                    </label>
                                </div>
                                <label for="feedback" id="feedback-label" style="display: none;"><strong>If yes, Explain :</strong></label>
                                <textarea class="form-control" id="feedback" name="feedback" rows="5" style="display: none;">
                                <?php echo isset($feedback) ? $feedback : '' ?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-12 text-right justify-content-center d-flex">
                        <button class="btn btn-light bg-success mr-2">Save</button>
                        <button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=employee_list'">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function toggleTextarea() {
            var decisionYes = document.getElementById('agree-radio');
            var feedbackTextarea = document.getElementById('feedback');
            var feedbackLabel = document.getElementById('feedback-label');

            if (decisionYes.checked) {
                feedbackTextarea.style.display = 'block';
                feedbackLabel.style.display = 'block';
            } else {
                feedbackTextarea.style.display = 'none';
                feedbackLabel.style.display = 'none';
            }
        }

        $('#application').submit(function(e) {
            e.preventDefault()
            start_load()
            $.ajax({
                url: '../back-end/save_application.php',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function(resp) {
                    if (resp == 1) {
                        alert_toast('Application Successfully Submitted.', "success");
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

    <div class="card">
        <div class="card-header" id="heading2">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                    <h5>SECTION B: Project Identification</h5>
                </button>
            </h5>
        </div>
        <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
            <div class="card-body">
                <form action="" id="project-identity">
                    <input type="hidden" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
                    <div class="form-group">
                        <label for="mainProblems">5. What are the main problems in your community?</label>
                        <textarea class="form-control" name="problems" id="mainProblems" rows="4" placeholder="Explain..."> <?php echo isset($problems) ? $problems : '' ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="projectAddress">6. What problem is the project going to address?</label>
                        <textarea class="form-control" name="prob_address" id="projectAddress" rows="4" placeholder="Explain..."> <?php echo isset($prob_address) ? $prob_address : '' ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="projectIdentification">7. How did the group identify the project? (Attach Minutes where applicable)</label>
                        <textarea class="form-control" name="proj_identity" id="projectIdentification" rows="4" placeholder="Explain..."> <?php echo isset($proj_idenetity) ? $proj_identity : '' ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="projectBenefit">8. How will the project benefit the community?</label>
                        <textarea class="form-control" name="proj_benefit" id="projectBenefit" rows="4" placeholder="Explain..."> <?php echo isset($proj_benefit) ? $proj_benefit : '' ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="directJobs">9. How many direct jobs will be created?</label>
                        <input type="text" class="form-control" name="direct_jobs" id="directJobs" value=" <?php echo isset($direct_jobs) ? $direct_jobs : '' ?>" placeholder="Enter number...">
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
    <script>
        $('#project-identity').submit(function(e) {
            e.preventDefault()
            start_load()
            $.ajax({
                url: '../back-end/save_project_identity.php',
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

    <div class="card">
        <div class="card-header" id="heading3">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    <h5>SECTION C: Financial Assessment</h5>
                </button>
            </h5>
        </div>
        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
            <div class="card-body">
                <form action="" id="financial-assessment">
                    <input type="hidden" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>10. Have you taken any loan from any organisation in the last 3 years?</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="decision" value="Yes" <?php echo isset($yes) && $yes === 'Yes' ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="decision" value="No" <?php echo isset($no) && $no === 'Yes' ? 'checked' : ''; ?>>
                                    <label class="form-check-label">No</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>11. If yes, from which organisation and how much was the loan?</label>
                                <textarea class="form-control" name="feedback" rows="3" placeholder="a."><?php echo isset($feedback) ? $feedback : ''; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>12. If yes to 10, what is the status of the loan taken?</label>
                                <textarea class="form-control" name="comment" rows="3" placeholder="Explain..."><?php echo isset($comment) ? $comment : ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>13. Provide Bank account or mobile money wallet registered for your Club/Group/Enterprise/Cooperative:</label>
                                <br>
                                <label for="" class="control-label">BANK NAME:</label>
                                <select name="bank_id" id="bank_id" class="form-control form-control-sm select2" placeholder="BANK NAME">
                                    <option value=""></option>
                                    <?php
                                    $banks = $conn->query("SELECT * FROM banks order by bank_name asc");
                                    while ($row = $banks->fetch_assoc()) :
                                    ?>
                                        <option value="<?php echo $row['id'] ?>" <?php echo isset($bank_id) && $bank_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['bank_name'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <input type="text" class="form-control mt-2" name="branch" value="<?php echo isset($branch) ? $branch : ''; ?>" placeholder="BRANCH">
                                <input type="number" class="form-control mt-2" name="branch_code" value="<?php echo isset($branch_code) ? $branch_code : ''; ?>" placeholder="SORT/BRANCH CODE">
                                <input type="number" class="form-control mt-2" name="swift_code" value="<?php echo isset($swift_code) ? $swift_code : ''; ?>" placeholder="SWIFT CODE">
                                <input type="number" class="form-control mt-2" name="acc_number" value="<?php echo isset($acc_number) ? $acc_number : ''; ?>" placeholder="ACCOUNT NUMBER">
                                <input type="number" class="form-control mt-2" name="tpin_number" value="<?php echo isset($tpin_number) ? $tpin_number : ''; ?>" placeholder="T-PIN">
                                <input type="text" class="form-control mt-2" name="mm_wallet" value="<?php echo isset($mm_wallet) ? $mm_wallet : ''; ?>" placeholder="MOBILE MONEY WALLET NAME AND NUMBER">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>14. Has your Club/Group/Enterprise/Cooperative received any training in any of the following?</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="any_training[]" value="Entrepreneurship/Business Skills" <?php echo isset($any_training) ? $any_training : ''; ?>>
                                    <label class="form-check-label">Entrepreneurship/Business Skills</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="any_training[]" value="Technical and Vocational Skills" <?php echo isset($any_training) ? $any_training : ''; ?>>
                                    <label class="form-check-label">Technical and Vocational Skills</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="any_training[]" value="Savings" <?php echo isset($any_training) ? $any_training : ''; ?>>
                                    <label class="form-check-label">Savings</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="any_training[]" value="Functional Literacy" <?php echo isset($any_training) ? $any_training : ''; ?>>
                                    <label class="form-check-label">Functional Literacy</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="any_training[]" value="Financial literacy" <?php echo isset($any_training) ? $any_training : ''; ?>>
                                    <label class="form-check-label">Financial literacy</label>
                                </div>
                                <label class="mt-2">If trained, how many members?</label>
                                <input type="number" name="total_members" class="form-control" value="<?php echo isset($total_members) ? $total_members : ''; ?>" placeholder="Enter number...">
                            </div>

                            <div class="form-group">
                                <label>15. If yes, from which organization and how long was the training?</label>
                                <textarea class="form-control" name="org_name" rows="3" placeholder="Explain..."><?php echo isset($org_name) ? $org_name : ''; ?></textarea>
                            </div>
                            <label class="mt-2">Training Duration</label>
                            <input type="text" name="training_duration" class="form-control" value="<?php echo isset($training_duration) ? $training_duration : ''; ?>" placeholder="Enter number...">
                        </div>
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
    <script>
        $('#financial-assessment').submit(function(e) {
            e.preventDefault()
            start_load()
            $.ajax({
                url: '../back-end/save_financial.php',
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
    <div class="card">
        <div class="card-header" id="heading4">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                    <h5>DECLARATION</h5>
                </button>
            </h5>
        </div>
        <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
            <div class="card-body">
                <form action="" id="declaration">
                    <input type="hidden" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
                    <h4>17. DECLARATION</h4>
                    <p>We the undersigned, on <input type="date" name="start_date" class="form-control-inline" value="<?php echo isset($start_date) ? $start_date : ''; ?>"> this <input type="text" name="day" class="form-control-inline" value="<?php echo isset($day) ? $day : ''; ?>"> day of <input type="month" name="month_year" class="form-control-inline" value="<?php echo isset($month_year) ? $month_year : ''; ?>"> declare that the information given herein is the correct state of affairs to the best of my knowledge. We will take full responsibility in the event of abuse, mismanagement, defrauding of the funds provided under this empowerment fund:</p>

                    <p>Note: In the case where you have multiple members, the signatory to the application must be limited up to 5 members.</p>

                    <h4>18. Contact Person(s)</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstAppName">First Applicant Name</label>
                                <input type="text" class="form-control" name="app_name" id="firstAppName" value="<?php echo isset($app_name) ? $app_name : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="firstAppAddress">First Applicant Physical Address</label>
                                <textarea class="form-control" name="phy_address" id="firstAppAddress" value="<?php echo isset($phy_address) ? $phy_address : ''; ?>"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="firstAppPhone">First Applicant Phone</label>
                                <input type="tel" class="form-control" name="phone" id="firstAppPhone" value="<?php echo isset($phone) ? $phone : ''; ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstAppNRC">First Applicant NRC</label>
                                <input type="text" class="form-control" name="app_nrc" id="firstAppNRC" value="<?php echo isset($app_nrc) ? $app_nrc : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="firstAppSignature">First Applicant Signature</label>
                                <input type="text" class="form-control" name="sign" id="firstAppSignature" value="<?php echo isset($sign) ? $sign : ''; ?>">
                            </div>
                        </div>
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
    <script>
        $('#declaration').submit(function(e) {
            e.preventDefault()
            start_load()
            $.ajax({
                url: '../back-end/save_declaration.php',
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