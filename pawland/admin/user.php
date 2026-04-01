<?php
$filename = "../admin/data/users.json";
$file     = file_get_contents($filename);
$users    = json_decode($file);
$id       = isset($_GET['id']) ? $_GET['id'] : 0;
$user     = $users[$id];
?>

<div class="card soft">
	<div class="card head">
		<h3>User Detail</h3>
		<a href="/admin/index.php?p=user-list" class="btn outline">&larr; Back</a>
	</div>
	<table class="table lined">
		<tbody>
			<tr>
				<th>Name</th>
				<td><?php echo $user->name; ?></td>
			</tr>
			<tr>
				<th>Type</th>
				<td><?php echo $user->type; ?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?php echo $user->email; ?></td>
			</tr>
			<tr>
				<th>Phone</th>
				<td><?php echo $user->phone; ?></td>
			</tr>
		</tbody>
	</table>
	<div style="margin-top: 1.5rem;">
		<a href="/admin/index.php?p=user-edit&id=<?php echo $id; ?>" class="btn primary">Edit</a>

	</div>
</div>
