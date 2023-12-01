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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $employee_constituency_id = $_SESSION['login_constituency_id'];

                    $query = "SELECT 
            a.id,
            u.fullname,
            d.district_name,
            c.constituency,
            a.app_type,
            a.constituency_id,
            e.constituency_id,
            a.user_id
          FROM applications a
          JOIN districts d ON a.district_id = d.id
          JOIN constituencies c ON a.constituency_id = c.id
          JOIN users u ON a.user_id = u.id
          JOIN employee_list e ON a.constituency_id = e.constituency_id
          WHERE a.constituency_id = $employee_constituency_id";

                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td class='text-center'>$count</td>
                                    <td>{$row['fullname']}</td>
                                    <td>{$row['district_name']}</td>
                                    <td>{$row['constituency']}</td>
                                    <td>{$row['app_type']}</td>
                                    <td class='text-center'>
                                        <button type='button' class='btn btn-default btn-sm btn-light bg-success border-info wave-effect text-info dropdown-toggle action' data-toggle='dropdown' aria-expanded='true'>
                                            Action
                                        </button>
                                        <div class='dropdown-menu' style=''>
                                        <a class='dropdown-item application_details' href='./index.php?page=application_details&user_id={$row['user_id']}'>Application Details</a>";

                            echo "</div>
                            
                                    </td>
                                  </tr>";
                            $count++;
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
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
        $('#list').dataTable()

    });
</script>