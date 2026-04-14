<?php
$filename = "../admin/data/users.json";
$file     = file_get_contents($filename);
$users    = json_decode($file);
?>

<div class="card soft" style="margin-bottom: 1.5rem;">
	<div class="card head">
		<h3>User List</h3>
		<a href="javascript:history.back()" class="btn outline">&larr; Back</a>
	</div>
	<nav class="navigation">
		<ul>
		<?php
		for ($i = 0; $i < count($users); $i++) {
			$name = htmlspecialchars($users[$i]->name);
			echo "<li>
				<a href='/admin/index.php?p=user-detail&id=$i'>{$name}</a>
			</li>";
		}
		?>
		</ul>
	</nav>
</div>
