<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-purple-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-xl border-r border-gray-200 p-6 flex flex-col">
        <h2 class="text-2xl font-bold text-gray-800 mb-8">Admin Panel</h2>

        <nav class="flex flex-col gap-3">
            <a href="/students/dashboard" class="px-4 py-2 rounded-lg hover:bg-blue-100 transition font-medium text-gray-700">
                📊 Dashboard
            </a>
            <a href="/" class="px-4 py-2 rounded-lg hover:bg-blue-100 transition font-medium text-gray-700">
                👤 Accounts
            </a>
            <a href="/students/settings" class="px-4 py-2 rounded-lg hover:bg-blue-100 transition font-medium text-gray-700">
                ⚙️ Settings
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="container mt-3 ">
	<form action="<?=site_url('author');?>" method="get" class="col-sm-4 float-end d-flex">
		<?php
		$q = '';
		if(isset($_GET['q'])) {
			$q = $_GET['q'];
		}
		?>
        <input class="form-control me-2" name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
        <button type="submit" class="btn btn-primary" type="button">Search</button>
	</form>
	<h2>Students Lists</h2>
    <div class="flex gap-3 mb-4">
        <a href="/students/create" class="bg-green-600 text-white px-5 py-2 rounded-lg shadow hover:bg-green-700 transition">
            + Add New Student
        </a>
        <a href="/students/delete_all"
            onclick="return confirm('Are you sure you want to delete ALL records?')"
            class="bg-red-700 text-white px-5 py-2 rounded-lg shadow hover:bg-red-800 transition">
            Delete All
        </a>
    </div>
	<table class="table table-striped">
		<thead>
		<tr>
            <th>No.</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Email</th>
            <th>Actions</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$i = 1 + ($current_page - 1) * $records_per_page;
		foreach(html_escape($all) as $students): ?>
		<tr>
			<td><?=$i++;?></td>
			<td><?=$students['first_name'];?></td>
			<td><?=$students['last_name'];?></td>
			<td><?=$students['email'];?></td>
            <td>
                <a href="<?=site_url('students/edit/'.$students['id']);?>" class="btn btn-sm btn-primary">Edit</a>
                <a href="<?=site_url('students/delete/'.$students['id']);?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
            </td>
		</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php
	echo $page;?>
	</div>
</body>
</html>
