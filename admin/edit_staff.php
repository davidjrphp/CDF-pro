<?php
include 'connection.php';
$qry = $conn->query("SELECT * FROM employee_list where id = " . $_GET['id'])->fetch_array();
foreach ($qry as $k => $v) {
    $$k = $v;
}
include 'new_staff.php';