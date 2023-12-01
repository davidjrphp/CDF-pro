<?php include 'connection.php' ?>
<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <div class="card-tools">
                <a class="btn btn-block btn-sm btn-default btn-light bg-success border-primary new_employee" href="./index.php?page=new_staff"><i class="fa fa-plus"></i> Add New Staff</a>
            </div>

        </div>
        <div class="card-body">
            <table class="table table-sm table-hover table-bordered" id="list">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Constituency</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $constituency = $conn->query("SELECT * FROM constituencies ");
                    $design_arr[0] = "Unset";
                    while ($row = $constituency->fetch_assoc()) {
                        $design_arr[$row['id']] = $row['constituency'];
                    }

                    if ($_SESSION['login_type'] == 1) {
                        $qry = $conn->query("SELECT *, CONCAT(lastname, ', ', firstname, ' ', middlename) AS name FROM admin_list ORDER BY CONCAT(lastname, ', ', firstname, ' ', middlename) ASC");
                    }

                    while ($row = $qry->fetch_assoc()) :
                    ?>
                        <tr>
                            <th class="text-center"><?php echo $i++ ?></th>
                            <td><b><?php echo ucwords($row['name']) ?></b></td>
                            <td><b><?php echo $row['email'] ?></b></td>
                            <td><b><?php echo $row['sex'] ?></b></td>
                            <td><b><?php echo $row['dob'] ?></b></td>
                            <td><b><?php echo isset($design_arr[$row['constituency_id']]) ? $design_arr[$row['constituency_id']] : 'Unknown Constituency' ?></b></td>

                            <td class="text-center">
                                <button type="button" class="btn btn-default btn-sm btn-light bg-success border-info wave-effect text-info dropdown-toggle myButton" data-toggle="dropdown" aria-expanded="true">
                                    Action
                                </button>
                                <div class="dropdown-menu" style="">
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="./index.php?page=edit_staff&id=<?php echo $row['id'] ?>">Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item delete_employee" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
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
        $.ajax({
            url: 'server_side/update_cop.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.id) {
                    $('#cop_id').val(data.id);
                }
            }
        });

        $('.delete_employee').click(function() {
            _conf("Deleting this Employee will remove Every information associated with this employee and the operation is irreversible. Do you wish to Continue?", "delete_employee", [$(this).attr('data-id')]);
        });
    });

    function delete_employee($id) {
        start_load();
        $.ajax({
            url: 'ajax.php?action=delete_employee',
            method: 'POST',
            data: {
                id: $id
            },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Successfully deleted", 'success');
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                } else if (resp == 0) {
                    alert_toast("Error deleting employee and related data", 'error');
                    end_load();
                }
            },
            error: function() {
                alert_toast("An error occurred while deleting employee", 'error');
                end_load();
            }
        });
    }
</script>