<?php
ob_start();
date_default_timezone_set("Asia/Manila");

$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();
if ($action == 'login') {
	$login = $crud->login();
	if ($login)
		echo $login;
}
if ($action == 'logout') {
	$logout = $crud->logout();
	if ($logout)
		echo $logout;
}


if ($action == 'save_admin') {
	$save = $crud->save_admin();
	if ($save)
		echo $save;
}
if ($action == 'update_admin') {
	$save = $crud->update_admin();
	if ($save)
		echo $save;
}

if ($action == 'save_staff') {
	$save = $crud->save_staff();
	if ($save)
		echo $save;
}
if ($action == 'save_system') {
	$save = $crud->save_system();
	if ($save)
		echo $save;
}
ob_end_flush();
