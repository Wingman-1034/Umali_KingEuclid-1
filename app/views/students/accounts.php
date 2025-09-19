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
    <div class="flex-1 p-10">
        <form action="<?=site_url('/');?>" method="get" class="flex justify-end mb-6 gap-2">
            <?php
            $q = '';
            if(isset($_GET['q'])) {
                $q = $_GET['q'];
            }
            ?>
            <input class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Search</button>
        </form>
        <h2 class="text-xl font-semibold mb-4">Author Lists</h2>
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full bg-white">
                <thead>
                <tr class="bg-blue-100 text-gray-700">
                    <th class="py-2 px-4 text-left">ID</th>
                    <th class="py-2 px-4 text-left">Lastname</th>
                    <th class="py-2 px-4 text-left">Firstname</th>
                    <th class="py-2 px-4 text-left">Email</th>
                    <th class="py-2 px-4 text-left">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach(html_escape($all) as $author): ?>
                <tr class="border-b hover:bg-blue-50">
                    <td class="py-2 px-4"><?=$author['id'];?></td>
                    <td class="py-2 px-4"><?=$author['last_name'];?></td>
                    <td class="py-2 px-4"><?=$author['first_name'];?></td>
                    <td class="py-2 px-4"><?=$author['email'];?></td>
                    <td class="py-2 px-4">
                        <a href="<?=site_url('/students/edit/'.$author['id']);?>" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 transition text-sm">Edit</a>
                        <a href="<?=site_url('/students/delete/'.$author['id']);?>" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition text-sm" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <?php echo $page;?>
        </div>
    </div>

</body>
</html>
