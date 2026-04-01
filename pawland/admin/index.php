<?php
$filename = "../admin/data/users.json";
$file     = file_get_contents($filename);
$users    = json_decode($file);

// Add new user
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
	$new        = new stdClass();
	$new->name  = $_POST['name'];
	$new->type  = $_POST['type'];
	$new->email = $_POST['email'];
	$new->phone = $_POST['phone'];
	$users[]    = $new;
	file_put_contents($filename, json_encode($users, JSON_PRETTY_PRINT));
	header('Location: /admin/index.php?p=user-list');
	exit;
}

// Delete selected users
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
	$to_delete = isset($_POST['selected']) ? $_POST['selected'] : [];
	$users     = array_values(array_filter($users, function($u, $i) use ($to_delete) {
		return !in_array($i, $to_delete);
	}, ARRAY_FILTER_USE_BOTH));
	file_put_contents($filename, json_encode($users, JSON_PRETTY_PRINT));
	header('Location: /admin/index.php?p=user-list');
	exit;
}

// Save edited user
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
	$id                = $_POST['id'];
	$users[$id]->name  = $_POST['name'];
	$users[$id]->type  = $_POST['type'];
	$users[$id]->email = $_POST['email'];
	$users[$id]->phone = $_POST['phone'];
	file_put_contents($filename, json_encode($users, JSON_PRETTY_PRINT));
	header('Location: /admin/index.php?p=user-detail&id=' . $id);
	exit;
}

$p = isset($_GET['p']) ? $_GET['p'] : 'admin';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin User Page Pawland</title>
	<?php include "../parts/href.php"; ?>
</head>
<body>

	<?php include "../parts/header.php"; ?>

	<main>
		<div class="container">
			<div style="margin-top: 2rem; margin-bottom: 3rem;">

				<?php include "nav_crumb.php"; ?>

				<?php if ($p === 'user-detail') { include "user.php"; }
				elseif ($p === 'user-edit') { include "user-edit.php"; }
				elseif ($p === 'user-add') { include "user-add.php"; }
				elseif ($p === 'user-list') { include "users.php"; }
				else { include "users.php"; include "user.php"; } ?>

			</div>
		</div>
	</main>

	<?php include "../parts/footer.php"; ?>
</body>
</html>
