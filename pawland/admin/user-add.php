<div class="card soft">
	<div class="card head">
		<h3>Add New User</h3>
		<a href="javascript:history.back()" class="btn outline">&larr; Back</a>
	</div>
	<form method="post" action="/admin/index.php">
		<table class="table lined" style="width: 100%;">
			<tbody>
				<tr>
					<th>Name</th>
					<td><input class="input" type="text" name="name" placeholder="Full name"></td>
				</tr>
				<tr>
					<th>Type</th>
					<td>
						<select class="input" name="type">
							<option value="autoship">Autoship</option>
							<option value="one-time">One-time</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Email</th>
					<td><input class="input" type="email" name="email" placeholder="you@example.com"></td>
				</tr>
				<tr>
					<th>Phone</th>
					<td><input class="input" type="tel" name="phone" placeholder="+1 (555) 000-0000"></td>
				</tr>
			</tbody>
		</table>
		<div class="form actions" style="margin-top: 1.5rem;">
			<button class="btn primary" name="add" value="1">Save</button>
		</div>
	</form>
</div>
