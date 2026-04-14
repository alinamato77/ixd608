<?php
$filename = "../admin/data/users.json";
$file     = file_get_contents($filename);
$users    = json_decode($file);
$id   = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$user = isset($users[$id]) ? $users[$id] : null;
if (!$user) { echo "<p>User not found.</p>"; return; }
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
				<td><?php echo htmlspecialchars($user->name); ?></td>
			</tr>
			<tr>
				<th>Type</th>
				<td><?php echo htmlspecialchars($user->type); ?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?php echo htmlspecialchars($user->email); ?></td>
			</tr>
			<tr>
				<th>Phone</th>
				<td><?php echo htmlspecialchars($user->phone); ?></td>
			</tr>
		</tbody>
	</table>
	<div style="margin-top: 1.5rem;">
		<a href="/admin/index.php?p=user-edit&id=<?php echo $id; ?>" class="btn primary">Edit</a>

	</div>
</div>
