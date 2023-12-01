<?php include 'connection.php' ?>
<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table table-sm table-hover table-bordered" id="list">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Name of Club/Organization</th>
                        <th>District</th>
                        <th>Constituency</th>
                        <th>Grant Type</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <?php if ($_SESSION['login_type'] == 1) : ?>
                            <th>Action</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $employee_constituency_id = $_SESSION['login_constituency_id'];

                    $query = "
SELECT 
    a.id,
    u.fullname,
    d.district_name,
    c.constituency,
    a.app_type,
    a.amount,
    a.constituency_id,
    e.constituency_id,
    a.user_id,
    cc.decision_1
FROM applications a
JOIN districts d ON a.district_id = d.id
JOIN constituencies c ON a.constituency_id = c.id
JOIN users u ON a.user_id = u.id
JOIN employee_list e ON a.constituency_id = e.constituency_id
LEFT JOIN cdf_committee cc ON a.user_id = cc.user_id
WHERE a.constituency_id = $employee_constituency_id";

                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {

                            $badge_color = '';
                            switch ($row['decision_1']) {
                                case 'Approved':
                                    $badge_color = 'badge-success';
                                    break;
                                case 'Not Approved':
                                    $badge_color = 'badge-danger';
                                    break;
                                default:
                                    $badge_color = 'badge-secondary';
                            }

                            echo "<tr>
                <td class='text-center'>$count</td>
                <td>{$row['fullname']}</td>
                <td>{$row['district_name']}</td>
                <td>{$row['constituency']}</td>
                <td>{$row['app_type']}</td>
                <td>{$row['amount']}</td>
                <td><span class='badge $badge_color'>{$row['decision_1']}</span></td>";
                            if ($_SESSION['login_type'] == 1) {
                                echo "<td>
                                    <button class='btn btn-success btn-sm clear_loan' data-userid='{$row['user_id']}'>Cleared</button>
                                </td>";
                            }
                            echo "</tr>";
                            $count++;
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No records found</td></tr>";
                    }

                    $conn->close();
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    .new_employee,
    .myButton {
        border-radius: 444px
    }
</style>
<script>
    $(document).ready(function() {
        $('#list').dataTable();

        // Add click event for the "Cleared" button
        $('.clear_loan').click(function() {
            var userId = $(this).data('userid');
            clearLoan(userId);
        });

        function clearLoan(userId) {
            // Send AJAX request to update loan_status to 1 for the specified user
            $.ajax({
                url: '../back-end/update_loan_status.php',
                method: 'POST',
                data: {
                    user_id: userId
                },
                success: function(response) {
                    if (response === 'success') {
                        alert_toast('Status updated successfully');
                        setTimeout(function() {
                            location.reload()
                        }, 1750)
                    } else {
                        alert_toast('Error updating status');
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    });
</script>