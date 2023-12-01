<?php
ob_start();
date_default_timezone_set("Asia/Manila");

$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if ($action == 'upload_file') {
	$save = $crud->upload_file();
	if ($save)
		echo $save;
	// var_dump($_FILES);
}
if ($action == 'remove_file') {
	$delete = $crud->remove_file();
	if ($delete)
		echo $delete;
}

if ($action == 'save_upload') {
	$save = $crud->save_upload();
	if ($save)
		echo $save;
}
if ($action == 'delete_file') {
	$delete = $crud->delete_file();
	if ($delete)
		echo $delete;
}

if ($action == 'update_user') {
	$save = $crud->update_user();
	if ($save)
		echo $save;
}
ob_end_flush();
