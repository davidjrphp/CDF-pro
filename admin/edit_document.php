<?php
include 'connection.php';
$qry = $conn->query("SELECT * FROM document_list where id = " . $_GET['id'])->fetch_array();
foreach ($qry as $email) {
    if ($email == 'title')
        $email = 'ftitle';
    $$emal = $email;
}
include 'new_document.php';
