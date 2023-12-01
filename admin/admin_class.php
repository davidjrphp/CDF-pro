<?php
session_start();
ini_set('display_errors', 1);
class Action
{
	private $db;

	public function __construct()
	{
		ob_start();
		include 'connection.php';

		$this->db = $conn;
	}
	function __destruct()
	{
		$this->db->close();
		ob_end_flush();
	}

	function login()
	{
		extract($_POST);
		$type = array("employee_list", "admin_list");
		$qry = $this->db->query("SELECT *,concat(firstname,' ',lastname) as name FROM {$type[$login]} where email = '" . $email . "' and password = '" . md5($password) . "'  ");
		if ($qry->num_rows > 0) {
			foreach ($qry->fetch_array() as $key => $value) {
				if ($key != 'password' && !is_numeric($key))
					$_SESSION['login_' . $key] = $value;
			}
			$_SESSION['login_type'] = $login;
			return 1;
		} else {
			return 2;
		}
	}
	function logout()
	{
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}
	function save_admin()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'cpass', 'password')) && !is_numeric($k)) {
				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}
		if (!empty($password)) {
			$data .= ", password=md5('$password') ";
		}
		$check = $this->db->query("SELECT * FROM admin_list where email ='$email' " . (!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if ($check > 0) {
			return 2;
			exit;
		}
		if (isset($_FILES['img']) && $_FILES['img']['tmp_name'] != '') {
			$fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'], '../assets/uploads/' . $fname);
			$data .= ", avatar = '$fname' ";
		}
		if (empty($id)) {
			if (!isset($_FILES['img']) || (isset($_FILES['img']) && $_FILES['img']['tmp_name'] == '')) {
				$data .= ", avatar = 'no-image-available.png' ";
			}
			$save = $this->db->query("INSERT INTO admin_list set $data");
		} else {
			$save = $this->db->query("UPDATE admin_list set $data where id = $id");
		}

		if ($save) {
			return 1;
		}
	}

	function update_admin()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'cpass', 'table', 'password')) && !is_numeric($k)) {

				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}
		$type = array("employee_list", "admin_list");
		$check = $this->db->query("SELECT * FROM {$type[$_SESSION['login_type']]} where email ='$email' " . (!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if ($check > 0) {
			return 2;
			exit;
		}
		if (isset($_FILES['img']) && $_FILES['img']['tmp_name'] != '') {
			$fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'], '../assets/uploads/' . $fname);
			$data .= ", avatar = '$fname' ";
		}
		if (!empty($password))
			$data .= " ,password=md5('$password') ";
		if (empty($id)) {
			if (!isset($_FILES['img']) || (isset($_FILES['img']) && $_FILES['img']['tmp_name'] == '')) {
				$data .= ", avatar = 'no-image-available.png' ";
			}
			$save = $this->db->query("INSERT INTO {$type[$_SESSION['login_type']]} set $data");
		} else {
			$save = $this->db->query("UPDATE {$type[$_SESSION['login_type']]} set $data where id = $id");
		}

		if ($save) {
			foreach ($_POST as $key => $value) {
				if ($key != 'password' && !is_numeric($key))
					$_SESSION['login_' . $key] = $value;
			}
			if (isset($_FILES['img']) && !empty($_FILES['img']['tmp_name']))
				$_SESSION['login_avatar'] = $fname;
			return 1;
		}
	}
	function delete_admin()
	{
		extract($_POST);
	}

	function save_system_settings()
	{
		extract($_POST);
		$data = '';
		foreach ($_POST as $k => $v) {
			if (!is_numeric($k)) {
				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}
		if ($_FILES['cover']['tmp_name'] != '') {
			$fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['cover']['name'];
			$move = move_uploaded_file($_FILES['cover']['tmp_name'], '../assets/uploads/' . $fname);
			$data .= ", cover_img = '$fname' ";
		}
		$chk = $this->db->query("SELECT * FROM system_settings");
		if ($chk->num_rows > 0) {
			$save = $this->db->query("UPDATE system_settings set $data where id =" . $chk->fetch_array()['id']);
		} else {
			$save = $this->db->query("INSERT INTO system_settings set $data");
		}
		if ($save) {
			foreach ($_POST as $k => $v) {
				if (!is_numeric($k)) {
					$_SESSION['system'][$k] = $v;
				}
			}
			if ($_FILES['cover']['tmp_name'] != '') {
				$_SESSION['system']['cover_img'] = $fname;
			}
			return 1;
		}
	}
	function save_image()
	{
		extract($_FILES['file']);
		if (!empty($tmp_name)) {
			$fname = strtotime(date("Y-m-d H:i")) . "_" . (str_replace(" ", "-", $name));
			$move = move_uploaded_file($tmp_name, '../assets/uploads/' . $fname);
			$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https' : 'http';
			$hostName = $_SERVER['HTTP_HOST'];
			$path = explode('/', $_SERVER['PHP_SELF']);
			$currentPath = '/' . $path[1];
			if ($move) {
				return $protocol . '://' . $hostName . $currentPath . '/assets/uploads/' . $fname;
			}
		}
	}

	function save_staff()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'cpass', 'password')) && !is_numeric($k)) {
				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}
		if (!empty($password)) {
			$data .= ", password=md5('$password') ";
		}
		$check = $this->db->query("SELECT * FROM employee_list where email ='$email' " . (!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if ($check > 0) {
			return 2;
			exit;
		}
		if (isset($_FILES['img']) && $_FILES['img']['tmp_name'] != '') {
			$fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'], '../assets/uploads/' . $fname);
			$data .= ", avatar = '$fname' ";
		}
		if (empty($id)) {
			if (!isset($_FILES['img']) || (isset($_FILES['img']) && $_FILES['img']['tmp_name'] == '')) {
				$data .= ", avatar = 'no-image-available.png' ";
			}
			$save = $this->db->query("INSERT INTO employee_list set $data");
		} else {
			$save = $this->db->query("UPDATE employee_list set $data where id = $id");
		}

		if ($save) {
			return 1;
		}
	}

	function save_system()
	{
		extract($_POST);

		// Validate and sanitize the input data
		$name = $this->db->real_escape_string($name);
		$short_name = $this->db->real_escape_string($short_name);
		$about = $this->db->real_escape_string($content['about']);

		// Check if the system settings already exist
		$check = $this->db->query("SELECT * FROM system_settings")->num_rows;
		if ($check > 0) {
			// Update the existing system settings
			$update = $this->db->query("UPDATE system_settings SET name='$name', short_form='$short_name', about='$about'");
			if (!$update) {
				return 2; // Error in updating system settings
			}
		} else {
			// Insert new system settings
			$insert = $this->db->query("INSERT INTO system_settings (name, short_form, about) VALUES ('$name', '$short_name', '$about')");
			if (!$insert) {
				return 2; // Error in inserting system settings
			}
		}

		// Handle the file uploads for system logo and web cover
		if (isset($_FILES['img'])) {
			$avatar = $_FILES['img']['name'];
			$tmp_name = $_FILES['img']['tmp_name'];
			if (!empty($avatar)) {
				$fname = strtotime(date('y-m-d H:i')) . '_' . $avatar;
				$move = move_uploaded_file($tmp_name, '../assets/uploads/' . $fname);
				if (!$move) {
					return 3; // Error in uploading file
				}
				// Update the system settings with the new file name
				$update = $this->db->query("UPDATE system_settings SET cover_img='$fname'");
				if (!$update) {
					return 2; // Error in updating system settings
				}
			}
		}

		return 1; // Success
	}
}
