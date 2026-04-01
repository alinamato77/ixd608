<?php
$filename = "../admin/data/users.json";
$file     = file_get_contents($filename);
$users    = json_decode($file);
$id       = isset($_GET['id']) ? $_GET['id'] : 0;
$user     = $users[$id];
?>

<form method="post" action="/admin/index.php?p=user-edit&id=<?php echo $id; ?>">
	<div class="card soft">
		<div class="card head">
			<h3>Edit User</h3>
			<a href="/admin/index.php?p=user-detail&id=<?php echo $id; ?>" class="btn outline">&larr; Back</a>
		</div>
		<table class="table lined" style="width: 100%;">
			<tbody>
				<tr>
					<th>Name</th>
					<td><input class="input" type="text" name="name" value="<?php echo $user->name; ?>" placeholder="Full name"></td>
				</tr>
				<tr>
					<th>Type</th>
					<td>
						<select class="input" name="type">
							<option value="autoship" <?php echo $user->type === 'autoship' ? 'selected' : ''; ?>>Autoship</option>
							<option value="one-time" <?php echo $user->type === 'one-time' ? 'selected' : ''; ?>>One-time</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Email</th>
					<td><input class="input" type="email" name="email" value="<?php echo $user->email; ?>" placeholder="you@example.com"></td>
				</tr>
				<tr>
					<th>Phone</th>
					<td><input class="input" type="tel" name="phone" value="<?php echo $user->phone; ?>" placeholder="+1 (555) 000-0000"></td>
				</tr>
			</tbody>
		</table>
		<div class="form actions" style="margin-top: 1.5rem;">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<button class="btn primary" name="save" value="1">Save</button>
		</div>
	</div>
</form>
