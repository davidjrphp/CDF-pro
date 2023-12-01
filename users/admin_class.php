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


	function upload_file()
	{
		extract($_FILES['file']);
		// var_dump($_FILES);
		if ($tmp_name != '') {
			$fname = strtotime(date('y-m-d H:i')) . '_' . $name;
			$move = move_uploaded_file($tmp_name, '../assets/uploads/' . $fname);
		}
		if (isset($move) && $move) {
			return json_encode(array("status" => 1, "fname" => $fname));
		}
	}
	function remove_file()
	{
		extract($_POST);
		if (is_file('assets/uploads/' . $fname))
			unlink('assets/uploads/' . $fname);
		return 1;
	}
	function delete_file()
	{
		extract($_POST);
		$doc = $this->db->query("SELECT * FROM document_list where id= $id")->fetch_array();
		$delete = $this->db->query("DELETE FROM document_list where id = " . $id);
		if ($delete) {
			foreach (json_decode($doc['file_json']) as $email) {
				if (is_file('../assets/uploads/' . $email))
					unlink('../assets/uploads/' . $email);
			}
			return 1;
		}
	}
	function save_upload()
	{
		extract($_POST);
		// var_dump($_FILES);
		$data = " doc_title ='$doc_title' ";
		$data .= ", description ='" . htmlentities(str_replace("'", "&#x2019;", $description)) . "' ";
		$data .= ", user_id ='{$_SESSION['login_id']}' ";
		$data .= ", file_json ='" . json_encode($fname) . "' ";
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO document_list set $data ");
		} else {
			$save = $this->db->query("UPDATE document_list set $data where id = $id");
		}
		if ($save) {
			return 1;
		}
	}

	function update_user()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $email) {
			if (!in_array($email, array('id', 'cpass', 'table', 'password')) && !is_numeric($email)) {

				if (empty($data)) {
					$data .= " $email ";
				} else {
					$data .= ", $email ";
				}
			}
		}
		$type = array("users");
		$check = $this->db->query("SELECT * FROM {$type[$_SESSION['login_id']]} where email ='$email' " . (!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if ($check > 0) {
			return 2;
			exit;
		}
		if (isset($_FILES['img']) && $_FILES['img']['tmp_name'] != '') {
			$fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'], 'assets/uploads/' . $fname);
			$data .= ", avatar = '$fname' ";
		}
		if (!empty($password))
			$data .= " ,password=md5('$password') ";
		if (empty($id)) {
			if (!isset($_FILES['img']) || (isset($_FILES['img']) && $_FILES['img']['tmp_name'] == '')) {
				$data .= ", avatar = 'no-image-available.png' ";
			}
			$save = $this->db->query("INSERT INTO {$type[$_SESSION['login_id']]} set $data");
		} else {
			$save = $this->db->query("UPDATE {$type[$_SESSION['login_id']]} set $data where id = $id");
		}

		if ($save) {
			foreach ($_POST as $email) {
				if ($email != 'password' && !is_numeric($email))
					$_SESSION['login_' . $email] = $email;
			}
			if (isset($_FILES['img']) && !empty($_FILES['img']['tmp_name']))
				$_SESSION['login_avatar'] = $fname;
			return 1;
		}
	}
}
