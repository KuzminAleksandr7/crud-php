<?php
include_once 'config.php';

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $pos = $_POST['pos'];
}



// Create

if (isset($_POST['submit'])) {
	$sql = ("INSERT INTO `users`(`name`, `last_name`, `pos`) VALUES(?,?,?)");
	$query = $pdo->prepare($sql);
	$query->execute([$name, $last_name, $pos]);
	$success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Дані успішно надіслані!</strong> Ви можете закрити це повідомлення.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	
}

// Read

$sql = $pdo->prepare("SELECT * FROM `users`");
$sql->execute();
$result = $sql->fetchAll();

// Update

if (isset($_POST['edit-submit'])) {
    $edit_name = $_POST['edit_name'];
    $edit_last_name = $_POST['edit_last_name'];
    $edit_pos = $_POST['edit_pos'];

    $sqll = "UPDATE users SET name=?, last_name=?, pos=? WHERE id=?";
	$querys = $pdo->prepare($sqll);
	$querys->execute([$edit_name, $edit_last_name, $edit_pos, $_GET['id']]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}

// DELETE
if (isset($_POST['delete_submit'])) {

	$sql = "DELETE FROM users WHERE id=?";
	$query = $pdo->prepare($sql);
	$query->execute([$_GET['id']]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}
