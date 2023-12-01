<style>
    .new_job_description,
    .action {
        border-radius: 444px;
    }
</style>

<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <div class="card-tools">
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered" id="list">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Full Name</th>
                        <th>Constituency</th>
                        <th>Application Type</th>
                        <th>Mobile</th>
                        <th>Phys. Address</th>
                        <!-- <th>Status</th> -->
                        <th>Date Applied</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connection.php';

                    if (isset($_SESSION['login_id'])) {
                        $user_id = $_SESSION['login_id'];

                        // Fetch comments for the current user
                        $user_query = "SELECT id, fullname FROM users WHERE id = ? ORDER BY date_created DESC";
                        $user_stmt = $conn->prepare($user_query);
                        $user_stmt->bind_param("i", $user_id);
                        $user_stmt->execute();
                        $user_result = $user_stmt->get_result();
                        $user_data = $user_result->fetch_assoc();

                        if ($user_data) {
                            $user_fullname = $user_data['fullname'];

                            $query = "SELECT a.*, c.constituency FROM applications a
                             LEFT JOIN users u ON a.user_id = u.id
                             LEFT JOIN constituencies c ON a.constituency_id = c.id
                             WHERE a.user_id = ?";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("i", $user_id);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                $i = 1;
                                while ($row = $result->fetch_assoc()) {
                                    $fullname = $row['fullname'] ?? $user_fullname;
                                    $constituency = $row['constituency'];
                                    $app_type = $row['app_type'];
                                    $mobile = $row['phone'];
                                    $date_applied = $row['date_created'];
                                    $phy_address = $row['phy_address'];
                                    // $status = $row['loan_status'];
                                    $cop_type = $row['decision'];

                                    echo "<tr>";
                                    echo "<td class='text-center'>" . $i++ . "</td>";
                                    echo "<td>";
                                    echo "<p class='truncate'><b>" . strip_tags($fullname) . "</b></p>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<p class='truncate'><b>" . strip_tags($constituency) . "</b></p>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<p class='truncate'>" . strip_tags($app_type) . "</p>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<p class 'truncate'>" . strip_tags($mobile) . "</p>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<p class='truncate'>" . strip_tags($phy_address) . "</p>";
                                    echo "</td>";
                                    // echo "<td>";
                                    // echo "<p class='truncate'>" . strip_tags($status) . "</p>";
                                    // echo "</td>";
                                    echo "<td>";
                                    echo "<p class='truncate'>" . strip_tags($date_applied) . "</p>";
                                    echo "</td>";
                                    echo "<td class='text-center'>";
                                    echo "<button type='button' class='btn btn-default btn-sm btn-light bg-primary border-info wave-effect text-info dropdown-toggle action' data-toggle='dropdown' aria-expanded='true' data-cop-type='" . $cop_type . "'>Action</button>";
                                    echo "<div class='dropdown-menu' style=''>";
                                    echo "<a class='dropdown-item add_comment' href='javascript:void(0)' data-id='" . $row['id'] . "'><i class='fa fa-plus'></i> Comment</a>";
                                    echo "</div>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8' class='text-center'>No data available</td></tr>";
                            }

                            $stmt->close();
                        } else {
                            echo "User not found.";
                        }

                        $user_stmt->close();
                        $conn->close();
                    } else {
                        echo "User not logged in.";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    table p {
        margin: unset !important;
    }

    table td {
        vertical-align: middle !important;
    }
</style>

<script>
    $(document).ready(function() {
        $('#list').dataTable();

        $('.add_comment').click(function() {
            var Id = $(this).data('id');
            uni_modal("<i class='fa fa-plus'></i> All your comments are Public", "add_comment.php?id=" + Id, 'mid-large');
        });

        $('.loan_extension').click(function() {
            var Id = $(this).data('id');
            uni_modal("<i class='fa fa-plus'></i> Loan Extension", "loan_extension.php?id=" + Id, 'mid-large');
        });
    });
</script>