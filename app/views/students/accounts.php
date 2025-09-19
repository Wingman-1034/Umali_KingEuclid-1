<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students List</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
	<form action="<?=site_url('/');?>" method="get" class="col-sm-4 float-end d-flex">
		<?php
		$q = '';
		if(isset($_GET['q'])) {
			$q = $_GET['q'];
		}
		?>
        <input class="form-control me-2" name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
        <button type="submit" class="btn btn-primary" type="button">Search</button>
	</form>
	<h2>Author Lists</h2>
	<table class="table table-striped">
		<thead>
		<tr>
			<th>ID</th>
            <th>Lastname</th>
			<th>Firstname</th>			
			<th>Email</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach(html_escape($all) as $author): ?>
		<tr>
            <td><?=$author['id'];?></td>
            <td><?=$author['last_name'];?></td>
			<td><?=$author['first_name'];?></td>			
			<td><?=$author['email'];?></td>
		</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php
	echo $page;?>
	</div>

</body>
</html>
